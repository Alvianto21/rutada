<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Log;

class CreateUser extends Component
{    
    //Validation rules
    use WithFileUploads;
    
    #[Validate('required|date_format:Y-m-d')]
    public $date_of_birth = '';
    
    #[validate('image|mimes:jpeg,png,jpg,gif,svg|max:1024')]
    public $photo= '';
    
    #[Validate('required|string|max:255')]
    public $name= '';
    
    #[Validate('required|email|unique:users,email')]
    public $email= '';
    
    #[Validate('required|numeric|digits_between:16,16|unique:users,nik')]
    public $nik= '';
    
    #[Validate('required|string|max:255')]
    public $place_of_birth= '';
    
    #[Validate('required|string|max:450')]
    public $address= '';
    
    #[Validate('required')]
    public $gender= '';
    
    #[Validate('required|numeric|digits_between:10,13')]
    public $phone= '';
    
    #[Validate('required')]
    public $religion= '';
    
    #[Validate('required')]
    public $marital_status= '';
    
    #[Validate('required|string|max:255')]
    public $job= '';

    #[Validate('nullable|string|max:3')]
    public $blood_type= '';
    
    #[Validate('required|string|max:255')]
    public $password= '';
    public $is_admin = false;
    
    #[Validate('required|string|max:255')]
    public $username ='';
    
    //validation for photo
    public function updatedPhoto()
    {
        $this->validateOnly('photo');
    }
    
    //create user
    public function createUser() {
        // log::info('create user', ['data' => $this->all()]);
        // dd($this->all());
        
        //validate all inputs
        $this->validate();
        
        // log::info('validation passed', ['data' => $this->all()]);
        
        //store photo
        if ($this->photo instanceof \Illuminate\Http\UploadedFile)  {
            $this->photo = $this->photo->store('profile-photos', 'public');
        }
        
        //create user
        User::create($this->all() + [
            'photo' => $this->photo,
            'date_of_birth' => $this->date_of_birth,
            'password' => bcrypt($this->password),
            'is_admin' => $this->is_admin
        ]);
        
        //redirect to users page
        // Log::info('User created successfully', ['user' => $this->all()]);
        session()->flash('success', 'User created successfully!');
        return $this->redirectRoute('users');   
    }
    
    //layout component
    #[Layout('components.homes.layout', ['title' => 'Create User'])]
    
    public function render()
    {
        return view('livewire.create-user');
    }
}
