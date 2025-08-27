<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Quote;

class QuoteFactory extends Factory
{
    protected $model = Quote::class;

    public function definition()
    {
        return [
            'text' => $this->faker->realText(rand(80, 200)), // Isi kutipan
            'source' => $this->faker->name(), // Sumber kutipan (ustadz, ulama, dsb)
        ];
    }
}
