<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditUser extends Component
{
    //edit page
    public $user;
    
    public function mount(User $user) {
        $this->user = $user;
        $this->fill($user->only([
            'name',
            'email',
            'nik',
            'place_of_birth',
            'date_of_birth',
            'address',
            'job',
            'phone',
            'photo',
            'gender',
            'religion',
            'marital_status',
            'blood_type',
            'username'
        ]));
    }

    //image preview
    use WithFileUploads;

    #[Validate('image|mimes:jpeg,png,jpg,gif,svg|max:1024|nullable')]
    public $photo;

    public function updatePhoto() {
        $this->validateOnly('photo');
    }

    //validation rules
    #[Validate('required|date_format:Y-m-d')]
    public $date_of_birth = '';
    
    #[Validate('required|string|max:255')]
    public $name= '';
    
    public $email= '';
    
    public $nik= '';

    #[Validate('required|string|max:255')]
    public $username ='';
    
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
    
    #[Validate('nullable|string|max:255')]
    public $password= '';

    //update user
    public function updateUser() {
        // Clean the phone input from non-digit characters
        $this->phone = preg_replace('/\D/', '', $this->phone);
        
        //validate all input
        $this->validate($this->rules());

        //store photo
        if($this->photo instanceof \Illuminate\Http\UploadedFile) {
            if(!empty($this->user->photo)) {
                //delete old photo
                Storage::disk('public')->delete($this->user->photo);
            }
            //store new photo
            $this->user->photo = $this->photo->store('profile-photos', 'public');
        }

        //update user properties from Livewire properties
        $this->user->fill([
            'name' => $this->name,
            'email' => $this->email,
            'nik' => $this->nik,
            'place_of_birth' => $this->place_of_birth,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
            'job' => $this->job,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'religion' => $this->religion,
            'marital_status' => $this->marital_status,
            'blood_type' => $this->blood_type,
            'username' => $this->username,
        ]);

        //update password if provided
        if($this->password) {
            $this->user->password = bcrypt($this->password);
        }

        $this->user->save();

        //redirect to all users page
        session()->flash('success', 'User account has been updated!');
        return $this->redirectRoute('users'); 
    }

    public function rules()
    {
        return [
            'date_of_birth' => 'required|date_format:Y-m-d',
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user->id),
            ],
            'nik' => [
                'required',
                'numeric',
                'digits_between:16,16',
                Rule::unique('users', 'nik')->ignore($this->user->id),
            ],
            'username' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'address' => 'required|string|max:450',
            'gender' => 'required',
            'phone' => 'required|numeric|digits_between:10,13',
            'religion' => 'required',
            'marital_status' => 'required',
            'job' => 'required|string|max:255',
            'blood_type' => 'nullable|string|max:3',
            'password' => 'nullable|string|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|nullable',
        ];
    }

    //layout component
    #[Layout('components.homes.layout', ['title' => 'Edit User'])]

    public function render()
    {
        return view('livewire.edit-user');
    }
}
