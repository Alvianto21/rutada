<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function store(Request $request) {
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
    public function update(Request $request, string $id) {
        // find the user
        $user = User::find($id);

        // if user not found, return 404
        if(!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        // if user update email
        if ($user->email !== $request->email) {
            // validate email
            $request->validate([
                'email' => 'required|email:dns|unique:users,email'
            ]);
        }

        // if user update nik
        if ($user->nik !== $request->nik) {
            // validate nik
            $request->validate([
                'nik' => 'required|numeric|digits_between:16,16|unique:users,nik'
            ]);
        }

        // if user update password
        if ($request->has('password')) {
            // validate password
            $request->validate([
                'password' => 'string|min:8|confirmed|nullable'
            ]);
        }

        // validate the request
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'place_of_birth' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:450'],
            'phone' => ['required', 'numeric', 'digits_between:10,13'],
            'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:1024'],
            'job' => 'required|string|max:255',
            'blood_type' => 'nullable|string|max:3',
            'gender' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
        ]);

        // secure the password
        if ($request->has('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        // update user
        $dataUser = User::where('id', $id)->update($data);

        // return response
        if ($dataUser) {
            return response()->json([
                'success' => true,
                'message' => "User updated successfully",
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User update failed'
            ], 500, ['Content-Type' => 'application/json']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        // find the user
        $user = User::find($id);

        // if user not found, return 404
        if(!$user) {
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
