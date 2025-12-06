<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id','name','email','group_id','created_at')
            ->orderBy('id')
            ->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $groups = Group::orderBy('id')->get(['id','name']);
        return view('admin.users.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required','string','max:255'],
            'email'    => ['required','email','max:255', Rule::unique('users','email')],
            'group_id' => ['required','integer','exists:groups,id'],
            'password' => ['required','string','min:8','confirmed'],
        ]);

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'group_id' => (int)$data['group_id'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        $groups = Group::orderBy('id')->get(['id','name']);
        return view('admin.users.edit', compact('user','groups'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'     => ['required','string','max:255'],
            'email'    => ['required','email','max:255', Rule::unique('users','email')->ignore($user->id)],
            'group_id' => ['required','integer','exists:groups,id'],
            'password' => ['nullable','string','min:8','confirmed'],
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->group_id = (int)$data['group_id'];

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return redirect()->route('admin.users.index');
    }

    public function destroy(Request $request, User $user)
    {
        // Нельзя удалить самого себя
        if ($request->user()->id === $user->id) {
            abort(403, 'Нельзя удалить самого себя.');
        }

        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
