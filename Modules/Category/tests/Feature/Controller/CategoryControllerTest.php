<?php

namespace Modules\Category\tests\Feature\Controller;

use Modules\Category\App\Models\Category;
use Modules\Users\App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
{
    protected $middlewares = ['web' , 'admin'];
    /**
     * A basic feature test example.
     */
    public function testCategoryIndexMethod(): void
    {
        Category::factory()->count(100)->create();

        $this
            ->actingAs(User::factory()->admin()->create())
            ->get(route('admin.content.category.index'))->assertOk()
            ->assertViewIs('category::index')
            ->assertViewHas('Categories', Category::orderBy('created_at', 'desc')->simplePaginate(15));

        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );
    }

    public function testCreateMethod(): void
    {
        $this
            ->actingAs(User::factory()->admin()->create())
            ->get(route('admin.content.category.create'))->assertOk()
            ->assertViewIs('category::create');

        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );

    }

    public function testStoreMethod()
    {

        $user = User::factory()->admin()->create();
        $data = Category::factory()->make()->toArray();
        $this
            ->actingAs($user)
            ->post(route('admin.content.category.store') , $data)
            ->assertSessionHas('swal-success' , 'دسته بندی جدید شما با موفقیت ثبت شد  ')
            ->assertRedirect(route('admin.content.category.index'));

        $this->assertDatabaseHas('categories' , $data);

        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );

    }

    public function testEditMethod(): void
    {
//        $this->withoutExceptionHandling();
        $category= Category::factory()->create();


        $this
            ->actingAs(User::factory()->admin()->create())
            ->get(route('admin.content.category.edit' , $category->id))->assertOk()
            ->assertViewIs('category::edit')
            ->assertViewHas('category' ,$category);

        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );
    }

    public function testUpdateMethod()
    {
        $user = User::factory()->admin()->create();
        $data = Category::factory()->make()->toArray();
        $category = Category::factory()->create();


        $this
            ->actingAs($user)
            ->put(route('admin.content.category.update' , $category->id) ,$data)
            ->assertSessionHas('swal-success' , 'دسته بندی  شما با موفقیت ویرایش شد  ')
            ->assertRedirect(route('admin.content.category.index'));

        $this->assertDatabaseHas('categories' , array_merge(['id' => $category->id] , $data));
        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );

    }

    public function testValidationRequestRequiredData()
    {
        $errors = [
            'name' => 'The name field is required.',
            'slug' => 'The slug field is required.' ,
            'description' => 'The description field is required.' ,
        ];
        $user = User::factory()->admin()->create();
        $data = [];

        //store method
        $this
            ->actingAs($user)
            ->post(route('admin.content.category.store'), $data)
            ->assertSessionHasErrors($errors);

        //update method
        $this
            ->actingAs($user)
            ->put(route('admin.content.category.update' , Category::factory()->create()->id), $data)
            ->assertSessionHasErrors($errors);


        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );
    }
    public function testValidationRequestDescriptionDataHasMinimumRule()
    {
        $errors = [
            'description' => 'The description must be at least 5 characters.' ,
        ];
        $user = User::factory()->admin()->create();
        $data = ['description' => 'ali'];

        //store method
        $this
            ->actingAs($user)
            ->post(route('admin.content.category.store'), $data)
            ->assertSessionHasErrors($errors);

        //update method
        $this
            ->actingAs($user)
            ->put(route('admin.content.category.update' , Category::factory()->create()->id), $data)
            ->assertSessionHasErrors($errors);


        $this
            ->assertEquals(
                request()->route()->middleware() ,
                $this->middlewares
            );
    }



    public function test_english_invalid_name()
    {
        $user = User::factory()->admin()->create();
        $data = ['name' => 'ali@'];
        $errors = [
            'name' => 'The name format is invalid.',
        ];

        //store
        $this
            ->actingAs($user)
            ->post(route('admin.content.category.store'), $data)
            ->assertSessionHasErrors($errors);

        //update
        $this
            ->actingAs($user)
            ->post(route('admin.content.category.update', Category::factory()->create()->id), $data)
            ->assertSessionHasErrors($errors);

        // Check if the route is available before accessing its middleware
        if (request()->route()) {
            $this
                ->assertEquals(
                    request()->route()->middleware(),
                    $this->middlewares
                );
        }
    }


    public function test_farsi_invalid_name()
    {
        $user = User::factory()->admin()->create();
        $data = ['name' => 'محمد@'];
        $errors = [
            'name' => 'The name format is invalid.' ,
        ];


        //store
        $this
            ->actingAs($user)
            ->post(route('admin.content.category.store'), $data)
            ->assertSessionHasErrors($errors);

        //update
        $this
            ->actingAs($user)
            ->post(route('admin.content.category.update' , Category::factory()->create()->id), $data)
            ->assertSessionHasErrors($errors);


        if (request()->route()) {
            $this
                ->assertEquals(
                    request()->route()->middleware(),
                    $this->middlewares
                );
        }

    }
    public function test_farsi_valid_name()
    {
        $user = User::factory()->admin()->create();
        $data = ['name' => 'محمد'];
        $errors = [
            'name' => 'The name format is invalid.' ,
        ];


        //store
        $this
            ->actingAs($user)
            ->post(route('admin.content.category.store'), $data)
            ->assertSessionDoesntHaveErrors($errors);

        //update
        $this
            ->actingAs($user)
            ->post(route('admin.content.category.update' , Category::factory()->create()->id), $data)
            ->assertSessionDoesntHaveErrors($errors);



        if (request()->route()) {
            $this
                ->assertEquals(
                    request()->route()->middleware(),
                    $this->middlewares
                );
        }

    }

    public function test_english_valid_name()
    {
        $user = User::factory()->admin()->create();
        $data = ['name' => 'samane abasi'];
        $errors = [
            'name' => 'The name format is invalid.' ,
        ];

        //store
        $this
            ->actingAs($user)
            ->post(route('admin.content.category.store'), $data)
            ->assertSessionDoesntHaveErrors($errors);

        //update
        $this
            ->actingAs($user)
            ->post(route('admin.content.category.update' , Category::factory()->create()->id), $data)
            ->assertSessionDoesntHaveErrors($errors);


        if (request()->route()) {
            $this
                ->assertEquals(
                    request()->route()->middleware(),
                    $this->middlewares
                );
        }

    }

    public function testDestroyMethod()
    {
        $category = Category::factory()->create();
        $this
            ->actingAs(User::factory()->admin()->create())
            ->delete(route('admin.content.category.destroy' , $category->id))
            ->assertRedirect(route('admin.content.category.index'))
            ->assertSessionHas('swal-success' , 'دسته بندی  شما با موفقیت حذف شد');

        $this
            ->assertSoftDeleted('categories' , ['id' => $category->id]);

        $this->assertEquals(
            $this->middlewares ,
            request()->route()->middleware()
        );
    }

}
