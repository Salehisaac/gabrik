<?php

namespace Modules\Category\tests\Feature\Model;

use Modules\Category\App\Models\Category;
use Modules\Posts\App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testCreateCategory(): void
    {
        $category = Category::factory()->create();
        $this->assertDatabaseHas('categories', ['name' => $category->name]);
        $this->assertModelExists($category);
        $this->assertInstanceOf(Category::class, $category);
        $this->assertCount(1, Category::all());
    }

    public function testCategoryRelationshipWithPosts()
    {
        $count = rand(1 , 10);
        $category = Category::factory()->hasPosts($count)->create();
        $this->assertCount($count, $category->posts);
        $this->assertTrue($category->posts->first() instanceof Post);
    }
}
