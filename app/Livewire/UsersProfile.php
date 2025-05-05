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

    //for filters
    public $genderFilter = '';
    public $maritalStatusFilter = '';
    public $bloodTypeFilter = '';
    public $religionFilter = '';

    //sort function
    public function sort($colname) {
        $this->colname === $colname;
        $this->sortdir = $this->sortdir == 'asc' ? 'desc' : 'asc';
    }

    //reset search
    public function search() {
        $this->resetPage();
    }

    //reset filters
    public function updating($property, $value) {
        if (in_array($property, ['genderFilter', 'maritalStatusFilter', 'bloodTypeFilter', 'religionFilter'])) {
            $this->resetPage();
        }
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

        // Filter by gender
        if (!empty($this->genderFilter)) {
            $query->where('gender', $this->genderFilter);
        }

        // Filter by marital status
        if (!empty($this->maritalStatusFilter)) {
            $query->where('marital_status', $this->maritalStatusFilter);
        }

        // Filter by blood type
        if (!empty($this->bloodTypeFilter)) {
            $query->where('blood_type', $this->bloodTypeFilter);
        }

        // Filter by religion
        if (!empty($this->religionFilter)) {
            $query->where('religion', $this->religionFilter);
        }

        return view('livewire.users-profile',[
            'users' => $query->orderBy($this->colname, $this->sortdir)->paginate(10)->withQueryString(),
        ]);
    }
}
