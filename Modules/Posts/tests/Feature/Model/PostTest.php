<?php

namespace Modules\Posts\tests\Feature\Model;


use Modules\Posts\App\Models\Post;
use Modules\Users\App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testPostCreate(): void
    {
         $post = Post::factory()->create();
         $this->assertCount(1,  Post::all());
         $this->assertDatabaseHas('posts', ['title' => $post->title]);
    }

    public function testPostRelationshipWithUser()
    {
        $post = Post::factory()
            ->for(User::factory())
            ->create();

        $this->assertTrue(isset($post->user->id));
        $this->assertTrue($post->user instanceof User);
    }


}
