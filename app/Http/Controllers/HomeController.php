<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class HomeController extends Controller
{
    public function index()
    {
        // 6 последних публикаций (любой тип)
        $latest = Material::query()
            ->with('author:id,name')
            ->latest()
            ->take(6)
            ->get();

        // Можно подсветить “важные” (необязательно)
        $trending = Material::query()
            ->where('is_trending', true)
            ->latest()
            ->take(3)
            ->get();

        return view('home.index', compact('latest', 'trending'));
    }
}
