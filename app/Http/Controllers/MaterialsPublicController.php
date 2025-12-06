<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialsPublicController extends Controller
{
    public function analytics(Request $request)
    {
        $materials = Material::query()
            ->where('type', 'analytics')
            ->with('author:id,name')
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('materials.analytics', compact('materials'));
    }

    public function risks(Request $request)
    {
        $materials = Material::query()
            ->where('type', 'forecast')
            ->with('author:id,name')
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('materials.risks', compact('materials'));
    }

    public function show(Material $material)
    {
        return view('materials.show', compact('material'));
    }
}
