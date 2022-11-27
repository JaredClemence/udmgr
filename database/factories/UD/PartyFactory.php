<?php

namespace Database\Factories\UD;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UD\Party;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UD\Party>
 */
class PartyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type'=>Party::PLAINTIFF,
            'name'=>Str::random(25)
        ];
    }
}
