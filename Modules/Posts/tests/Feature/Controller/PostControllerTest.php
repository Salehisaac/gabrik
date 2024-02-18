<?php

namespace Modules\Posts\tests\Feature\Controller;

use App\Http\Services\File\FileService;
use App\Http\Services\Image\ImageService;
use Illuminate\Foundation\Application;
use Illuminate\Http\UploadedFile;
use Modules\Category\App\Models\Category;
use Modules\Posts\App\Models\Post;
use Modules\Users\App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    protected array $middlewares = ['web'];

    /**
     * A basic feature test example.
     */
    public function testIndexMethode(): void
    {
        $user = User::factory()->admin()->create();

        $this
            ->actingAs($user)
            ->get(route('posts.index'))
            ->assertOk()
            ->assertViewIs('posts::index')
            ->assertViewHas(
                'posts',
                Post::orderBy('created_at', 'desc')->simplePaginate(100)
            );

        $this
            ->assertEquals(
                request()->route()->middleware(),
                $this->middlewares
            );
    }

    public function testCreateMethode(): void
    {
        $user = User::factory()->admin()->create();

        $this
            ->actingAs($user)
            ->get(route('posts.create'))
            ->assertOk()
            ->assertViewIs('posts::create')
            ->assertViewHas('categories', Category::all());

        $this
            ->assertEquals(
                request()->route()->middleware(),
                $this->middlewares
            );
    }

    public function testShowMethode(): void
    {
        $user = User::factory()->admin()->create();
        $post = Post::factory()->create();

        $this
            ->actingAs($user)
            ->get(route('posts.show', $post->id))
            ->assertOk()
            ->assertViewIs('posts::show')
            ->assertViewHas('post', $post);

        $this
            ->assertEquals(
                request()->route()->middleware(),
                $this->middlewares
            );
    }

    public function testEditMethode(): void
    {
        $user = User::factory()->admin()->create();
        $post = Post::factory()->create();

        $this
            ->actingAs($user)
            ->get(route('posts.edit', $post->id))
            ->assertOk()
            ->assertViewIs('posts::edit')
            ->assertViewHasAll([
                'categories' => Category::all(),
                'post'       => $post,
            ]);

        $this
            ->assertEquals(
                request()->route()->middleware(),
                $this->middlewares
            );
    }

    public function testStoreMethod()
    {
        $user = User::factory()->admin()->create();
        $data = Post::factory()->make()->toArray();

        $this
            ->actingAs($user)
            ->post(route('posts.store'), $data)
            ->assertRedirect(route('posts.index'))
            ->assertSessionHas(
                'swal-success',
                'پست جدید شما با موفقیت ثبت شد'
            );;
    }

    public function testUploadImageInPost()
    {
        $image = UploadedFile::fake()->image('image.png');
        $imageService = new ImageService();
        $result = $imageService->save($image, 'posts');
        $this
            ->assertFileExists($result);


        $imageService->deleteImage($result);

        //delete image
        $this
            ->assertFileDoesNotExist($result);
    }

    public function testUploadVideoInPost()
    {
        $dummyVideoPath = storage_path('app/public/dummy-video.mp4');
        file_put_contents($dummyVideoPath, '');

        $video = new UploadedFile($dummyVideoPath, 'dummy-video.mp4', 'video/mp4', null, true);

        $fileService = new FileService();

        $fileService->setExclusiveDirectory('videos' . DIRECTORY_SEPARATOR . 'post-videos');
        $fileService->setFileSize($video);
        $fileSize = $fileService->getFileSize();
        $result = $fileService->moveToPublic($video);
        $this->assertFileExists(public_path($result));


        $fileService->deleteFile(public_path($result));
        $fileService->deleteDirectoryAndFiles(public_path('videos' . DIRECTORY_SEPARATOR . 'post-videos'));
        $this->assertFileDoesNotExist(public_path($result));
    }

}





