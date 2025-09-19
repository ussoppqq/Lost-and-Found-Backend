<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends Controller
{
    // GET /api/users → ambil semua user
    public function index()
    {
        $users = User::with(['company', 'role'])->get();
        return response()->json($users, 200);
    }

    // GET /api/users/{id} → ambil user by ID
    public function show($id)
    {
        $user = User::with(['company', 'role'])->find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user, 200);
    }

    // POST /api/users → tambah user baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,company_id',
            'role_id' => 'required|exists:roles,role_id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $validated['user_id'] = Str::uuid();

        $user = User::create($validated);

        return response()->json($user, 201);
    }

    // PUT /api/users/{id} → update user
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validated = $request->validate([
            'company_id' => 'sometimes|exists:companies,company_id',
            'role_id' => 'sometimes|exists:roles,role_id',
            'full_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->user_id . ',user_id',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $user->update($validated);

        return response()->json($user, 200);
    }

    // DELETE /api/users/{id} → hapus user
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted'], 200);
    }
}
