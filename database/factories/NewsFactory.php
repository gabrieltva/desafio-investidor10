<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(4);
        return [
            'title' => $title,
            'content' => implode("\n\n", $this->faker->paragraphs(5)),
            'date' => $this->faker->date('Y-m-d'),
            'id_category' => Category::factory(),
        ];
    }

    /**
     * Define a specific state for generating permalink.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withPermalink()
    {
        return $this->state(function (array $attributes) {
            return [
                'slug' => Str::slug($attributes['title']),
            ];
        });
    }
}
