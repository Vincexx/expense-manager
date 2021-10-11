<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Models\Role;
use Exception;

class RoleController extends Controller
{
    public function list() {
        try {
            $roles = Role::latest()->get();
            return response()->json([
                'message' => 'Fetch Successful!',
                'data' => $roles
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'errors' => 'Roles not found!'
            ], 500);
        }
    }

    public function store(StoreRequest $request) {
        try {
            $role = Role::create($request->only('name', 'description'));
            return response()->json([
                'message' => 'Role has been added.'
            ], 201);
        } catch(Exception $e) {
            return response()->json([
                'errors' =>  'There is something wrong with our end. Contact us to fix it.'
            ], 500);
        }
    }

    public function update(UpdateRequest $request, Role $role) {
        try {
            $role->update($request->only('name', 'description'));
            return response()->json([
                'message' => 'Role has been updated.'
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'errors' =>  'There is something wrong with our end. Contact us to fix it.'
            ], 500);
        }
    }

    public function destroy(Role $role) {
        try {
            $role->delete();
            return response()->json([
                'message' => 'Role has been deleted.'
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'errors' =>  'There is something wrong with our end. Contact us to fix it.'
            ], 500);
        }
    }
}
