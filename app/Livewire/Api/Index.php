<?php

namespace App\Livewire\Api;

use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $users = [];
    public $title = "All Users";
    public int $perpage = 5;


    public function mount()
    {
       $this->resetPage();
    }

    //layout component
    #[Layout('components.homes.layout', ['title' => 'Users Profile'])]

    public function render()
    {
        // setup connection
        $client = new Client();
        $url = "http://rutada.test:8080/api/user";
        $response = $client->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ]);

        // check if the response is successful
        if ($response->getStatusCode() !== 200) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch users data'
            ], $response->getStatusCode());
        }

        // decode the JSON response
        $data = json_decode($response->getBody()->getContents(), true);

        // Log::info('users data', ['data' => $data]);

        // set data user to component property
        $this->users = $data['data'];

        // create collection from user data
        $userCollection = collect($this->users);

        // page property
        $current = $this->getPage() ?? 1;
        $slicedUser = $userCollection->slice(($current - 1) * $this->perpage, $this->perpage)->values();

        // create pagination
        $paginator = new LengthAwarePaginator(
            $slicedUser,
            $userCollection->count(),
            $this->perpage,
            $current,
            [
                'path' => request()->url(),
                'query' => request()->query()
            ]
        );
    
        // return to view

        // Log::info('Pagination data', [
        //     // 'current' => $paginator->currentPage(),
        //     // 'next' => $paginator->nextPageUrl(),
        //     // 'prev' => $paginator->previousPageUrl(),
        //     // 'data' => $paginator->hasPages(),
        //     'dataPage' => $paginator->items()
        // ]);

        return view('livewire.api.index', [
            'pagination' => $paginator
        ]);
    }
}
