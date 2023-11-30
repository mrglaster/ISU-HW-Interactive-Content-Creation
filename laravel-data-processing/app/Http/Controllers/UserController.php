<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function softDelete(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User soft deleted successfully');
    }


}
