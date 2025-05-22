<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
    
    //show user details
    public $selectedUserUsername = null;

    // mount method to receive initial data
    public function mount($search = '', $genderFilter = '', $maritalStatusFilter = '', $bloodTypeFilter = '', $religionFilter = '', $selectedUserUsername = null)
    {
        $this->search = $search;
        $this->genderFilter = $genderFilter;
        $this->maritalStatusFilter = $maritalStatusFilter;
        $this->bloodTypeFilter = $bloodTypeFilter;
        $this->religionFilter = $religionFilter;
        $this->selectedUserUsername = $selectedUserUsername;
    }

    //show user details
    #[On('showUser')]
    public function loadUser($username)
    {
        $this->selectedUserUsername = $username;
    }

    public function getSelectedUserProperty()
    {
        return $this->selectedUserUsername ? User::where('username', $this->selectedUserUsername)->first() : null;
    }

    //delete user
    public function deleteUser($username) {
        // Log::info('DeleteUser called with username: ' . $username);
        $user = User::where('username', $username)->first(); 

        if($user) {
            // Log::info('User found: ' . $user->id);
            //if user has photo, delete it
            if($user->photo) {
                Log::info('Deleting photo: ' . $user->photo);
                Storage::disk('public')->delete($user->photo);
            }

            //delete user
            $user->delete();
            // Log::info('User deleted: ' . $user->id);
            session()->flash('success', 'User deleted successfully!');
        }
        else {
            // Log::info('User not found for username: ' . $username);
            session()->flash('error', 'User not found!');
        }
    }

    //layout component
    #[Layout('components.homes.layout', ['title' => 'Users Profile'])]

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

        return view('livewire.users-profile', [
            'users' => $query->orderBy($this->colname, $this->sortdir)->paginate(10)->withQueryString(),
            'selectedUser' => $this->selectedUser
        ]);
    }
}
