<?php

namespace App\Livewire\Api;

use App\Livewire\Forms\UserUpdateForm;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\Utils;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    public $user, $userData;

    use WithFileUploads;

    public UserUpdateForm $form;

    public function mount($user)
    {
        // get parameter from route
        $this->user = $user;

        // get user data from API
        $client = new Client([
            'timeout' => 120, // set timeout to 120 seconds
            'connect_timeout' => 60 // set connection timeout to 60 seconds
        ]);
        $url = "http://rutada.test:8080/api/user/{$user}";
        try {
            $response = $client->request('GET', $url, [
                'headers' => [
                    'Accept' => "application/json",
                    'Content-Type' => 'application/json'
                ]
            ]);

            // check if the response is successful
            if ($response->getStatusCode() !== 200) {
                session()->flash('error', 'Failed to fetch user data ' . $response->getStatusCode());
                $this->redirect(Index::class);
            }

            // decode the JSON response
            $data = json_decode($response->getBody()->getContents(), true);

            // set data user to component property
            $this->userData = $data['data'];
            $this->form->userId = $this->userData['id'];

            // set form values for livewire binding
            foreach ($this->userData as $key => $value) {
                if ($key === 'photo') {
                    // skip photo key, we added later
                    continue;
                }
                if (property_exists($this->form, $key)) {
                    $this->form->$key = $value;
                }
            }
            // dd($this->userData);
        } catch (ConnectException $e) {
            session()->flash('error', 'Failed to connect to API: ' . $e->getMessage());
            Log::error('failed to connect to API', [
                'user' => $this->user,
                'error' => $e->getMessage(),
                'url' => $url
            ]);
            $this->redirect(Index::class);
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to fetch user data: ' . $e->getMessage());
            $this->redirect(Index::class);
        }
    }

    // update user data
    public function updateUser()
    {
        // if user not upload photo, set photo to null
        if (empty($this->form->photo)) {
            $this->form->photo = null;
        }
        // validate data
        $edit = $this->form->updateData();
        Log::info('Data to update user', ['data' => $edit]);
        // dd($edit);
        // log::info('photo',['photo' => $this->form->photo]);


        // add photo to array data if exists and is an object and file exists
        if ($this->form->photo && is_object($this->form->photo) && file_exists($this->form->photo->getRealPath())) {
            // create data array
            $dataUser[] = $edit;
            $Data = [];

            foreach ($edit as $key => $value) {
                $Data[] = [
                    'name' => $key,
                    'contents' => $value
                ];
            }
            // $photo = $this->form->photo;

            // add photo to array data
            // $Data[] = $Data[0];
            $Data[] = [
                'name' => 'photo',
                'contents' => Utils::tryFopen($this->form->photo->getRealPath(), 'r'),
                'filename' => $this->form->photo->getClientOriginalName()
            ];

            Log::info('Sending data with file to API', ['data' => $Data]);

            // setup connection
            $user = $this->user;
            $client = new Client([
                'timeout' => 180, // set timeout to 180 seconds
                'connect_timeout' => 60 // set connection timeout to 60 seconds
            ]);
            $url = "http://rutada.test:8080/api/user/{$user}/update";
            try {
                $response = $client->post($url, [
                    'multipart' => $Data,
                    'headers' => [
                        'Accept' => 'application/json',
                    ]
                ]);
                log::info('Response from API', ['response' => $response->getBody()->getContents()]);

                // check if the response is successful
                if ($response->getStatusCode() === 200) {
                    // return to index page
                    session()->flash('success', 'User updated successfully');
                    $this->redirectRoute('user.index');
                } else {
                    // return back to page with error
                    $body = json_decode($response->getBody()->getContents(), true);
                    $mess = $body['message'];
                    session()->flash('error', $mess);
                    return;
                }
            } catch (ConnectionException $e) {
                session()->flash('error', 'Failed to connect to API: ' . $e->getMessage());
                Log::error('failed to connect to API', [
                    'user' => $this->user,
                    'error' => $e->getMessage(),
                    'url' => $url
                ]);
            } catch (\Exception $e) {
                session()->flash('error', 'Failed to update user data: ' . $e->getMessage());
                Log::error('failed to update user data', [
                    'user' => $this->user,
                    'error' => $e->getMessage(),
                    'data' => $Data
                ]);
            }
        } else {
            // create data array
            $data = [];
            foreach ($edit as $key => $value) {
                $data[$key] = $value;
            }

            Log::info('Sending data to API', ['data' => $data]);

            // setup connection
            $user = $this->user;
            $client = new Client([
                'timeout' => 180, // set timeout to 180 seconds
                'connect_timeout' => 60 // set connection timeout to 60 seconds
            ]);
            $url = "http://rutada.test:8080/api/user/{$user}/update";
            try {
                $response = $client->post($url, [
                    'json' => $data,
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json'
                    ]
                ]);

                Log::info('Response from API', ['response' => $response->getBody()->getContents()]);
                // check if the response is successful
                if ($response->getStatusCode() === 200) {
                    // return to index page
                    session()->flash('success', 'User updated successfully');
                    $this->redirectRoute('user.index');
                } else {
                    // return back to page with error
                    $body = json_decode($response->getBody()->getContents(), true);
                    $mess = $body['message'];
                    session()->flash('error', $mess);
                    return;
                }
            } catch (ConnectionException $e) {
                session()->flash('error', 'Failed to connect to API: ' . $e->getMessage());
                Log::error('failed to connect to API', [
                    'user' => $this->user,
                    'error' => $e->getMessage(),
                    'url' => $url
                ]);
            } catch (\Exception $e) {
                session()->flash('error', 'Failed to update user data: ' . $e->getMessage());
                Log::error('failed to update user data', [
                    'user' => $this->user,
                    'error' => $e->getMessage(),
                    'data' => $data
                ]);
            }
        }
    }

    //layout component
    #[Layout('components.homes.layout', ['title' => 'Edit User Profile'])]

    public function render()
    {
        return view('livewire.api.edit-user');
    }
}
