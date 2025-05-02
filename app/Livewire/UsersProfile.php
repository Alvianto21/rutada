<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersProfile extends Component
{
    //for search
    public $search = "";

    //for default sort
    public $colname= 'id';
    public $sortdir = 'asc';

    //sort function
    public function sort($colname) {
        $this->colname === $colname;
        $this->sortdir = $this->sortdir == 'asc' ? 'desc' : 'asc';
    }

    //reset search
    public function search() {
        $this->resetPage();
    }

    public function render()
    {
        $query = User::query();
        //search users
        if(!empty($this->search)) {
            $query->search($this->search);
        }

        return view('livewire.users-profile',[
            'users' => $query->orderBy($this->colname, $this->sortdir)->paginate(10)->withQueryString(),
        ]);
    }
}
