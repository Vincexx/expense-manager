<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Models\Role;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function list() {
        try {
            $users = User::with('roles')->latest()->get();
            return response()->json([
                'message' => 'Fetch Successful!',
                'data' => $users
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'errors' => 'Users not found!'
            ], 500);
        }
    }

    public function store(StoreRequest $request) {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->name),
            ]);

            $role = Role::findOrFail($request->role_id);
            $user->roles()->attach($role);

            return response()-> json([
                'message' => 'User has been added.'
            ], 201);
        } catch(Exception $e) {
            return response()->json([
                'errors' =>  'There is something wrong with our end. Contact us to fix it.'
            ], 500);
        }
    }

    public function update(UpdateRequest $request, User $user) {
        try {
            $user->update($request->only('name', 'email'));
            return response()->json([
                'message' => 'User has been updated.'
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'errors' =>  'There is something wrong with our end. Contact us to fix it.'
            ], 500);
        }
    }

    public function destroy(User $user) {
        try {
            $user->delete();
            return response()->json([
                'message' => 'User has been deleted.'
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'errors' =>  'There is something wrong with our end. Contact us to fix it.'
            ], 500);
        }
    }
}
