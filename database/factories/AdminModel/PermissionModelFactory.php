<?php

namespace Database\Factories\AdminModel;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminModel\PermissionModel>
 */
class PermissionModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->randomElement(permission());
        return [
            'name' =>  $name['name']
        ];
    }
}
