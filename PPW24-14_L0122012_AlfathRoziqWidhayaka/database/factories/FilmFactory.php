<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FilmFactory extends Factory
{
    protected $model = Film::class;

    public function definition()
    {
        return [
            'kode_film' => $this->faker->unique()->bothify('FLM-####'),
            'judul' => $this->faker->sentence(3),
            'sutradara' => $this->faker->name,
            'tahun_rilis' => $this->faker->year,
            'cover' => $this->faker->optional()->imageUrl(640, 480, 'movies', true, 'Faker'),
        ];
    }
}
