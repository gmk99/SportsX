<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Resources\Users as UserResource;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10); // Paginação com 10 registros por página (ajuste conforme necessário)
        return view('pages.user-management', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('pages.user-edit', compact('user', 'roles')); // Updated line
    }

    public function show($id)
    {
        $game = User::findOrFail($id);
        return new UserResource($game);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'sometimes|nullable|string|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->role_id = $request->input('role_id');

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function manageUsers()
    {
        $users = User::all();
        return view('profile', compact('users'));
    }
}
