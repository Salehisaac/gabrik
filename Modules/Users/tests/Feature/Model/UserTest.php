<?php

namespace Modules\Users\tests\Feature\Model;

use Modules\Posts\App\Models\Post;
use Modules\Users\App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testCreateUser(): void
    {
      $user = User::factory()->create();
      $this->assertDatabaseHas('users', ['name' => $user->name]);
      $this->assertCount(1 , User::all());
    }

    public function testUserRelationshipWithPosts()
    {
        $count = rand(1 , 10);
        $user = User::factory()->hasPosts($count)->create();
        $this->assertCount($count, $user->posts);
        $this->assertTrue($user->posts->first() instanceof Post);
    }
}
