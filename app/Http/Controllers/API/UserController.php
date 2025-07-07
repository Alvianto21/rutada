<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use function Livewire\store;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return a list of users
        $users = User::all();
        return response()->json([
            'success' => true,
            'message' => 'Users retrieved successfully',
            'data' => $users
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the request
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns|unique:users,email',
            'username' => 'required|string|max:255',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'nik' => 'required|numeric|digits_between:16,16|unique:users,nik',
            'place_of_birth' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:450'],
            'phone' => ['required', 'numeric', 'digits_between:10,13'],
            'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:1024'],
            'job' => 'required|string|max:255',
            'blood_type' => 'nullable|string|max:3',
            'gender' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'password' => 'required|string|min:8'
        ]);

        // secure the password
        $data['password'] = Hash::make($data['password']);

        // store the photo if exists
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('profile-photos', 'public');
        }

        // create user
        $user = User::create($data);

        // return response
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => "User created successfully",
                'data' => $user
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User creation failed'
            ], 500, ['Content-Type' => 'application/json']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return a sigle user
        $data = User::find($id);

        // return response
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'User retrieved successfully',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // find the user
        Log::info('data request ', ['data' => $request->all(), 'file' => $request->input('photo'), 'phone' => $request->input('phone')]);
        $user = User::find($id);

        // if user not found, return 404
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }
        Log::info('Updating user', ['data' => $user]);

        Log::info('validating request ....');
        // validate the request
        $data = $request->validate([
            'photo.name' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'max:1024',
            'nik' => [
                'required',
                'numeric',
                'digits_between:16,16',
                Rule::unique('users', 'nik')->ignore($user->id)
            ],
            'email' => [
                'required',
                'email:dns',
                Rule::unique('users', 'email')->ignore($user->id)
            ],
            'username' => [
                'required',
                'string',
                'max:158',
                Rule::unique('users', 'username')->ignore($user->id)
            ],
            'date_of_birth' => 'required|date_format:Y-m-d',
            'place_of_birth' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:450'],
            'phone' => ['required', 'numeric', 'digits_between:10,13'],
            'job' => 'required|string|max:255',
            'blood_type' => 'nullable|string|max:3',
            'gender' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'password' => 'string|min:8|confirmed|nullable'
        ]);
        Log::info('Data validated, continue', ['data' => $data]);

        Log::info('storing new photo or secure new password if exists');
        // if user update password, hash it
        if(isset($data['password']) && !empty($request->input('password'))) {
            $data['password'] = Hash::make($data['password']);
            Log::info('Password secured, continue');
        } else {
            // if user not update password, remove it from data
            unset($data['password']);
        }

        // if user update photo, store it and delete old one
        if ($request->hasFile('photo')) {
            // delete old photo if exists
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            // store new photo
            $data['photo'] = $request->file('photo')->store('profile-photos', 'public');
            Log::info('Photo stored, continue');
        }

        // update user
        Log::info('Updateting user and return JSON response');
        $update = $user->update($data);
    
        // return response
        if ($update) {
            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'data' => $update
            ], 200);
        } else {
            return response()->json([
                'sucess' => false,
                'message' => 'User update failed'
            ], 500);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // find the user
        $user = User::find($id);

        // if user not found, return 404
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        // if user has photo, delete it
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        // delete user
        User::destroy($id);

        // return response
        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully',
            'data' => $user
        ], 200);
    }
}
