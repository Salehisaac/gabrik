<?php

namespace Modules\Users\tests\Feature\Controller;

use Modules\Users\App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{

    protected $middlewares = ['web' , 'admin'];
    /**
     * A basic feature test example.
     */
    public function testIndexMethode(): void
    {
       $user = User::factory()->admin()->create();
       $this
           ->actingAs($user)
           ->get(route('users.index'))
           ->assertOk()
           ->assertViewIs('users::index')
           ->assertViewHas('users' , User::orderBy('created_at', 'desc')->simplePaginate(100));

        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );
    }

    public function testCreateMethode(): void
    {
        $user = User::factory()->admin()->create();
        $this
            ->actingAs($user)
            ->get(route('users.create'))
            ->assertOk()
            ->assertViewIs('users::create');

        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );
    }

    public function testEditMethode(): void
    {
        $user = User::factory()->admin()->create();
        $this
            ->actingAs($user)
            ->get(route('users.edit' , $user->id))
            ->assertOk()
            ->assertViewIs('users::edit')
            ->assertViewHas('user' , $user);

        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );
    }

    public function testShowMethode(): void
    {
        $user = User::factory()->admin()->create();
        $this
            ->actingAs($user)
            ->get(route('users.show' , $user->id))
            ->assertOk()
            ->assertViewIs('users::show')
            ->assertViewHas('user' , $user);

        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );
    }

    public function testStoreMethod()
    {

        $user = User::factory()->admin()->create();
        $data = User::factory()->make()->toArray();
        $data = array_merge($data , ['password' => bcrypt('123456')]);

        $this
            ->actingAs($user)
            ->post(route('users.store') , $data)
            ->assertSessionHas('swal-success' , 'کاربر جدید شما با موفقیت ثبت شد')
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('users' , $data);

        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );

    }

    public function testUpdateMethod()
    {

        $user = User::factory()->admin()->create();
        $data = User::factory()->make()->toArray();
        $data = array_merge($data , ['password' => bcrypt('123456')]);

        $this
            ->actingAs($user)
            ->put(route('users.update' , $user->id) , $data)
            ->assertSessionHas('swal-success' , 'کاربر جدید شما با موفقیت ویرایش شد')
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('users' , array_merge(['id' => $user->id] , $data));

        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );
    }

    public function testDestroyMethode()
    {
        $user = User::factory()->admin()->create();
        $this
            ->actingAs($user)
            ->delete(route('users.destroy' , $user->id))
            ->assertRedirect(route('users.index'))
            ->assertSessionHas('swal-success' , 'کاربر جدید شما با موفقیت حذف شد');

        $this
            ->assertSoftDeleted('users' , ['id' => $user->id]);

        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );
    }
}
