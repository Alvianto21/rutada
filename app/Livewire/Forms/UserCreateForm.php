<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class UserCreateForm extends Form
{
    ///Validation rules
    use WithFileUploads;

    #[Validate('required|date_format:Y-m-d')]
    public $date_of_birth = '';

    #[validate('image|mimes:jpeg,png,jpg,gif,svg|max:1024|nullable')]
    public $photo;

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|email|unique:users,email')]
    public $email = '';

    #[Validate('required|numeric|digits_between:16,16|unique:users,nik')]
    public $nik = '';

    #[Validate('required|string|max:255')]
    public $place_of_birth = '';

    #[Validate('required|string|max:450')]
    public $address = '';

    #[Validate('required')]
    public $gender = '';

    #[Validate('required|numeric|digits_between:10,13')]
    public $phone = '';

    #[Validate('required')]
    public $religion = '';

    #[Validate('required')]
    public $marital_status = '';

    #[Validate('required|string|max:255')]
    public $job = '';

    #[Validate('nullable|string|max:3')]
    public $blood_type = '';

    #[Validate('required|string|max:255')]
    public $password = '';

    public $is_admin = false;

    #[Validate('required|string|max:255|unique:users,username')]
    public $username = '';

    // validate data
    public function store()
    {
        // Log::info('Data received, validating...', ['data' => $this->toArray()]);

        try {
            // validate all input
            $this->validate();

            // Log::info('Data validated success, return to component', ['data' => $this->toArray()]);

            // return data, except photo
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
                'is_admin' => $this->is_admin,
            ];
        } catch (\Exception $e) {
            // Log::error('validation failed', [
            //     'errors' => $e->getMessage(),
            //     'data' => $this->toArray()
            // ]);
            return null;
        }      
    }
}
