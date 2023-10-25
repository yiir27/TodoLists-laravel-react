<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lists>
 */
class ListsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['work', 'shopping', 'private'];
        return [
            'task' => $this -> faker -> realtext(12),
            'memo' => $this -> faker -> realtext(20),
            'category' => $this -> faker -> randomElement($categories)
        ];
    }
}
