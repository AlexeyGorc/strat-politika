<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::select('id','name','slug','created_at')
            ->orderBy('id')
            ->paginate(20);

        return view('admin.groups.index', compact('groups'));
    }

    public function create()
    {
        return view('admin.groups.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:100'],
            'slug' => ['nullable','alpha_dash','max:100','unique:groups,slug'],
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
            // если авто-слэг уже занят — добавим постфикс
            $base = $data['slug'] ?: 'group';
            $i = 1;
            while (Group::where('slug', $data['slug'])->exists()) {
                $data['slug'] = "{$base}-{$i}";
                $i++;
            }
        }

        Group::create($data);

        return redirect()->route('admin.groups.index');
    }

    public function edit(Group $group)
    {
        return view('admin.groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $data = $request->validate([
            'name' => ['required','string','max:100'],
            'slug' => ['nullable','alpha_dash','max:100','unique:groups,slug,'.$group->id],
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
            $base = $data['slug'] ?: 'group';
            $i = 1;
            while (Group::where('slug', $data['slug'])->where('id','!=',$group->id)->exists()) {
                $data['slug'] = "{$base}-{$i}";
                $i++;
            }
        }

        $group->update($data);

        return redirect()->route('admin.groups.index');
    }

    public function destroy(Group $group)
    {
        // можно добавить проверку на «системные» группы (1,2,3) при желании
        $group->delete();
        return redirect()->route('admin.groups.index');
    }
}
