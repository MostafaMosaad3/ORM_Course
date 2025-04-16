<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'wallet' => random_int(0 , 1000) ,
            'wallet2' => random_int(0 , 1000) ,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * state function that make me able to change an attribute value
     */
    public function adminAccount()
    {
        return $this->state(function(array $attributes) {
            return [
                'is_admin' => true,
            ];
        });
    }

    /**
     * configure function is callback function that is running after using the factory
     */

//    public function configure()
//    {
//        return $this->afterMaking(function(User $user) {
//            log::info('after making function');
//        })->afterCreating(function(User $user) {
//            $user->update(['name' => 'Mostafa']);
//        });
//    }
}
