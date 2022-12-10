<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Post;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function test_bisa_bikin_post(){
    //     $data = [
    //         'title' => $this->faker->sentence,
    //         'content' => $this->faker->paragraph,
    //     ];
    //     $this->post(route('posts.store'), $data)
    //         ->assertStatus(201)
    //         ->assertJson($data);
    // }

    // public function test_bisa_update_post(){
    //     $post = factory(Post::class)->create();
    //     $data = [
    //         'title' => $this->faker->sentence,
    //         'content' => $this->faker->paragraph
    //     ];
    //     $this->put(route('posts.update', $post->id), $data)
    //         ->assertStatus(200)
    //         ->assertJson($data);
    // }
    
    // public function test_bisa_show_post(){
    //     $post = factory(Post::class)->create();
    //     $this->get(route('posts.show', $post->id))
    //         ->assertStatus(200);
    // }
    
    // public function test_bisa_delete_post(){
    //     $post = factory(Post::class)->create();
    //     $this->delete(route('posts.delete', $post->id))
    //         ->assertStatus(204);
    // }
    
    public function test_bisa_tampilkan_list_posts(){
        $posts = factory(Post::class, 2)->create()->map(function ($post) {
            return $post->only(['id', 'title', 'content']);
        });
        $this->get(route('posts'))
            ->assertStatus(200)
            ->assertJson($posts->toArray())
            ->assertJsonStructure([
                '*' => [ 'id', 'title', 'content' ],
            ]);
    }
}
