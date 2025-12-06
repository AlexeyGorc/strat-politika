<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MaterialsSeeder extends Seeder
{
    public function run(): void
    {
        // Гарантируем, что есть автор
        $user = User::first() ?? User::create([
            'name' => 'Editor2',
            'email' => 'editor2@example.com',
            'password' => Hash::make('password'),
        ]);

        if (User::count() < 5) {
            User::factory()->count(4)->create();
        }

        if (Material::count() === 0) {
            Material::factory()->analytics()->count(24)->create();
            Material::factory()->forecast()->count(24)->create();
        }
    }
}
