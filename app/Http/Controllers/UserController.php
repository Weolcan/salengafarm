<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.users.index', compact('users'));
    }

    public function updateRole(User $user, Request $request)
    {
        $request->validate([
            'role' => 'required|in:user,manager',
            'is_client' => 'boolean'
        ]);

        $updateData = ['role' => $request->role];

        if ($request->has('is_client')) {
            $updateData['is_client'] = $request->is_client;
        }

        $user->update($updateData);
        return redirect()->route('users.index')->with('success', 'User role updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    public function edit(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        // Log the incoming request data
        Log::info('User update request:', [
            'user_id' => $user->id,
            'request_data' => $request->all(),
            'has_is_client' => $request->has('is_client'),
        ]);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'contact_number' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'role' => 'required|in:user,manager',
        ]);

        // Handle the is_client checkbox explicitly
        $validated['is_client'] = $request->has('is_client');

        // Log the data we're about to save
        Log::info('About to update user with data:', [
            'user_id' => $user->id,
            'validated_data' => $validated,
        ]);

        $user->update($validated);

        // Log the user after update
        Log::info('User after update:', [
            'user' => $user->toArray()
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
}