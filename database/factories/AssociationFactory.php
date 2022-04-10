<?php

namespace Database\Factories;

use App\Models\Association;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Association>
 */
class AssociationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Association::class ; 

    public function definition()
    {
        return [
            'nom'=>$this->faker->name() ,
            'date'=>$this->faker->date($format = 'Y-m-d', $max = 'now')  ,
            'description'=>$this->faker->paragraph($nbSentences = 3, $variableNbSentences = true) ,
        ];
    }
}
