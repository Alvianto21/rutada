<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersProfile extends Component
{
    //for search
    public $search = "";

    //for default sort
    public $colname= 'id';
    public $sortdir = 'asc';

    //query string
    protected $queryString = ['search', 'sortColumn', 'sortDirection'];

    //sort function
    public function sort($colname) {
        $this->colname === $colname;
        $this->sortdir = $this->sortdir == 'asc' ? 'desc' : 'asc';
    }

    //reset search
    public function search() {
        $this->resetPage();
    }

    //pagination
    use WithPagination;

    protected $paginationTheme = 'flowbite';
    
    public function paginationView(){
        return 'vendor.pagination.flowbite';
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
