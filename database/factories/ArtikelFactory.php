<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,8)),
            //'slug' => $this->faker->slug(),
            //'content' => '<p>'.implode('</p><p>',$this->faker->paragraphs(mt_rand(5,10))).'</p>',
            'content' => collect($this->faker->paragraphs(mt_rand(3,5)))
                ->map(fn($p) => "<p>$p</p>")
                ->implode(''),
            'image' => "https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg",
            'category_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,2)
        ];
    }
}
