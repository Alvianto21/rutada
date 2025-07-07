<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Form;

class UserUpdateForm extends Form
{
    public $userId;

    //validation rules
    #[validate]
    public $date_of_birth = '';

    public $name = '';
    
    #[Validate]
    public $email = '';

    #[Validate]
    public $nik = '';

    #[Validate]
    public $username = '';

    public $place_of_birth = '';

    public $address = '';

    public $gender = '';

    #[Validate]
    public $phone = '';

    public $religion = '';

    public $marital_status = '';

    public $job = '';

    public $blood_type = '';

    public $password = '';

    #[Validate]
    public $photo = '';

    public $password_confirmation = '';



    use WithFileUploads;

    public function rules()
    {
        return [
            'nik' => [
                'required',
                'numeric',
                'digits_between:16,16',
                Rule::unique('users', 'nik')->ignore($this->userId)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->userId)
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($this->userId)
            ],
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'marital_status' => 'required',
            'blood_type' => 'nullable|string|max:3',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:450',
            'gender' => 'required',
            'phone' => 'required|numeric|digits_between:10,13',
            'religion' => 'required',
            'job' => 'required|string|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|nullable|sometimes',
            'password' => 'nullable|string|max:255|confirmed'
        ];
    }

    public function updateData()
    {
        // capture all form data
        // $data = $this->all();
        // Clean the phone input from non-digit characters
        $this->phone = preg_replace('/\D/', '', $this->phone);
        // dd($data['phone']);
        
        // if user not upload photo, set photo to null
        if (empty($this->photo) || $this->photo === '' || !isset($this->photo) || $this->photo === ['']) {
            $this->photo = null;
        }
        // dd($this->all());

        // validate data
        $this->validate();

        // return to the component
        return [
            'date_of_birth' => $this->date_of_birth,
            'place_of_birth' => $this->place_of_birth,
            'address' => $this->address,
            'gender' => $this->gender,
            'religion' => $this->religion,
            'marital_status' => $this->marital_status,
            'job' => $this->job,
            'blood_type' => $this->blood_type,
            'name' => $this->name,
            'email' => $this->email,
            'nik' => $this->nik,
            'phone' => $this->phone,
            'password' => $this->password,
            'username' => $this->username,
            'password_confirmation' => $this->password_confirmation
        ];
    }
}
