<?php

namespace App\Livewire\Api;

use GuzzleHttp\Client;
use Livewire\Component;
use Livewire\Attributes\Layout;

class ShowUser extends Component
{
    public $user, $userData;

    public function mount($user) {
        // get parameter from route
        $this->user = $user;
        
        // get user data from API
        $client = new Client();
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
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to fetch user data: '. $e->getMessage());
            $this->redirect(Index::class);
        }
    }

    //layout component
    #[Layout('components.homes.layout', ['title' => 'User Profile Details'])]
    
    public function render()
    {
        return view('livewire.api.show-user');
    }
}
