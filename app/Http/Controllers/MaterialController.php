<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        $materials = Material::query()
            ->with('author:id,name')
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('editor.index', compact('materials'));
    }

    public function create()
    {
        return view('editor.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required','string','max:255'],
            'type'        => ['required','in:analytics,forecast'],
            'tags'        => ['nullable','string','max:255'],
            'excerpt'     => ['nullable','string','max:1000'],
            'content'     => ['required','string'],
            'is_trending' => ['nullable','boolean'],
        ]);

        $data['author_id']   = $request->user()->id;
        $data['slug']        = $this->makeUniqueSlug($data['title']);
        $data['is_trending'] = (bool)($data['is_trending'] ?? false);

        Material::create($data);

        return redirect()->route('editor.index')->with('success', 'Материал добавлен.');
    }

    public function edit(Material $material)
    {
        return view('editor.edit', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $data = $request->validate([
            'title'       => ['required','string','max:255'],
            'type'        => ['required','in:analytics,forecast'],
            'tags'        => ['nullable','string','max:255'],
            'excerpt'     => ['nullable','string','max:1000'],
            'content'     => ['required','string'],
            'is_trending' => ['nullable','boolean'],
        ]);

        $data['is_trending'] = (bool)($data['is_trending'] ?? false);

        $material->update($data);

        return redirect()->route('editor.index')->with('success', 'Материал обновлён.');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('editor.index')->with('success', 'Материал удалён.');
    }

    private function makeUniqueSlug(string $title): string
    {
        $base = Str::slug($title);
        $slug = $base ?: Str::random(8);

        $i = 2;
        while (Material::where('slug', $slug)->exists()) {
            $slug = $base.'-'.$i;
            $i++;
        }
        return $slug;
    }
}
