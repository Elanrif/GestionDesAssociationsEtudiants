<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
    public function definition()
    {
        return [
            //'name' => $this->faker->name(),
            //'email' => $this->faker->unique()->safeEmail(),
            //'email_verified_at' => now(),
            //'password' => Str::random(9), // password
            'nom' => $this->faker->name()   ,
            'prenom' => $this->faker-> name()  ,
            'email' => $this->faker->unique()->freeEmail  ,
            'password' => $this->faker->password   ,
            'code_apogée' => $this->faker->numberBetween($min = 15000000, $max = 22999999)        ,
            'num_tel' => $this->faker->e164PhoneNumber ,
            'filiere' => $this->faker->sentence($nbWords = 1, $variableNbWords = true),
            
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
