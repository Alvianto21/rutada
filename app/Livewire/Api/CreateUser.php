<?php

namespace App\Livewire\Api;

use GuzzleHttp\Client;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\UserCreateForm;
use Illuminate\Support\Facades\Log;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    // call form function
    public UserCreateForm $form;

    use WithFileUploads;

    // create user
    public function createUser()
    {
        // Log::info('Data received send to form validation', ['data' => $this->form->toArray()]);
        // validate data

        $plea = $this->form->store();

        // check if validation fails
        // if (!$plea) {
        //     Log::error('Form validation failed, aborting user creation.');
        //     return;
        // }

        // create data array
        $data = [];
        foreach ($plea as $key => $value) {
            $data[] = [
                'name' => $key,
                'contents' => $value
            ];
        }

        // add photo to array data if exists and is an object
        if ($this->form->photo && is_object($this->form->photo)) {
            $photo = $this->form->photo;
            $data[] = [
                'name' => 'photo',
                'contents' => fopen($photo->getRealPath(), 'r'),
                'filename' => $photo->getClientOriginalName(),
                'headers' => [
                    'Content-Type' => $photo->getClientMimeType()
                ]
            ];
        }

        // Log::info('Sending data to API', ['data' => $data]);

        // setup connection
        $client = new Client();
        $url = "http://rutada.test:8080/api/user";
        try {
            $response = $client->post($url, [
                'multipart' => $data,
                'headers' => [
                    'Accept' => 'application/json'
                ]
            ]);

            // return response
            if ($response->getStatusCode() === 201) {
                // return to index page
                session()->flash('success', 'User created successfully');
                $this->redirect('/user');
            } else if ($response->getStatusCode() === 200) {
                // return to index page with warning
                session()->flash('warning', 'User data processed successfully, but may not have been created or already exists.');
                $this->redirect('/user');  
            } else {
                // return back to page with error
                $body = json_decode($response->getBody()->getContents(), true);
                $mess = $body['message'];
                session()->flash('error', $mess);
                return;
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create user: '. $e->getMessage());
            return;
        }
    }

    //layout component
    #[Layout('components.homes.layout', ['title' => 'Create User'])]

    public function render()
    {
        return view('livewire.api.create-user');
    }
}
