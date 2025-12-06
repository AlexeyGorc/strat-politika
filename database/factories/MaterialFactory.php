<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MaterialFactory extends Factory
{
    protected $model = Material::class;

    public function definition(): array
    {
        $title = fake('ru_RU')->unique()->sentence(5, true);

        return [
            'author_id'   => User::inRandomOrder()->value('id') ?? User::factory(),
            'title'       => $title,
            'slug'        => Str::slug($title) . '-' . Str::lower(Str::random(5)),
            'type'        => fake()->randomElement(['analytics', 'forecast']),
            'tags'        => collect(fake()->randomElements([
                'политика','экономика','общество','международные отношения',
                'выборы','инфляция','санкции','энергетика','рынки','конфликты','РФ','ЕС','США','Китай'
            ], mt_rand(2,4)))->implode(', '),
            'excerpt'     => fake('ru_RU')->text(160),
            'content'     => fake('ru_RU')->paragraphs(mt_rand(6, 14), true),
            'is_trending' => fake()->boolean(20),
        ];
    }

    public function analytics(): self
    {
        return $this->state(fn() => ['type' => 'analytics']);
    }

    public function forecast(): self
    {
        return $this->state(fn() => ['type' => 'forecast']);
    }
}
