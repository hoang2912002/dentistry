<?php

namespace Database\Factories\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminModel\GroupModel>
 */
class GroupModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = 'Admin';
        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
