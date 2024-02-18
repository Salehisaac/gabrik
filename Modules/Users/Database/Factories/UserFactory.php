<?php

namespace Modules\Users\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Users\App\Models\User>
 */

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Users\App\Models\User::class;

    /**
     * Define the model's default state.
     */
    public function definition():array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => null,
            'password' => bcrypt('password'),
            'password_confirmation' => bcrypt('password'),
            'role' => $this->faker->randomElement(['admin', 'user']),
            'status' => $this->faker->randomElement(['0', '1']),
        ];
    }

    public function user(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'user',
        ]);
    }

    /**
     * Indicate that the model's type should be admin.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
        ]);
    }
}

