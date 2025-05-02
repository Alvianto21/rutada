<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = "";

    public function render()
    {
        return view('livewire.search-users', [
            'users' => User::search($this->search)->paginate(10)->withQueryString(),
        ]);
    }
}
