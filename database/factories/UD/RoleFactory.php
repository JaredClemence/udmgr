<?php

namespace Database\Factories\UD;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UD\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UD\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>1,
            'legal_case_id'=>1,
            'type'=>Role::OTHER
        ];
    }
}
