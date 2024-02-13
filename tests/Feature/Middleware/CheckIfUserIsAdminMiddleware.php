<?php

namespace Tests\Feature\Middleware;



use App\Http\Middleware\CheckIfUserIsAdmin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Modules\Users\App\Models\User;
use Tests\TestCase;

class CheckIfUserIsAdminMiddleware extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testWhenUserIsNotAdmin(): void
    {
        $user = User::factory()->user()->create();

        $this->actingAs($user);

        $request = Request::create('/admin' , 'GET');

        $middleware = new CheckIfUserIsAdmin();

        $response = $middleware->handle($request , function (){});

        $this->assertEquals($response->getStatusCode() , 302);
    }

    public function testWhenUserIsAdmin(): void
    {
        $user = User::factory()->admin()->create();

        $this->actingAs($user);

        $request = Request::create('/admin', 'GET');

        $middleware = new CheckIfUserIsAdmin();

        // Use assertSame to check for identical values, including null
        $response = $middleware->handle($request, function () {});


        $this->assertEquals($response->getStatusCode() , 200);
    }


    public function testWhenUserIsNotLoggedIn(): void
    {

        $request = Request::create('/admin', 'GET');

        $middleware = new CheckIfUserIsAdmin();


        $response = $middleware->handle($request, function () {});

        $this->assertSame($response->getStatusCode(), 302);
    }
}
