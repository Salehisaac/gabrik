<?php

namespace Modules\Posts\Database\Factories;



use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Category\App\Models\Category;
use Modules\Posts\App\Models\Post;
use Modules\Users\App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Posts\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'image' => $this->faker->url,
            'gallery' => 'gallery1,gallery2,gallery3',
            'slug' => $this->faker->slug,
            'video' => $this->faker->url,
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'type' => $this->faker->randomElement(['blog', 'project']),
        ];
    }
}
