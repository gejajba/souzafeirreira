<?php

namespace Database\Factories;

use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TeamMember>
 */
class TeamMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'slug' => fake()->unique()->slug(),
            'oab_number' => 'OAB/RS '.fake()->unique()->numerify('###.###'),
            'education' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'specialties' => [fake()->words(2, true)],
            'position' => 'Advogado(a)',
            'sort_order' => fake()->numberBetween(0, 100),
            'is_active' => true,
        ];
    }
}
