<?php

namespace Database\Factories;

use App\Models\Degree;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = "$2y$12$7JclxITDrp7eSTTyuWRrQ.wUAYVPO5JNezlLIlDJ/5oQ8fERxSQPi"; // asdf

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $degree_ids = Degree::all()->pluck('id')->all();
        $degree_ids[] = null;
        $degree_id = fake()->randomElement($degree_ids);

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('asdf'),
            'remember_token' => Str::random(10),
            'profile_img' => null,
            'role' => $degree_id ? 'student' : fake()->randomElement(['professor']),
            'degree_id' => $degree_id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
