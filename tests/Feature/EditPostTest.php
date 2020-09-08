<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class EditPostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEditPostResourceRoute()
    {
        // valid post id & language
        $this->get('/posts/edit/1/en')->assertStatus(302);
        $this->get('/posts/edit/1/ar')->assertStatus(302);

        // valid post id & unsupported/invalid language
        $this->get('/posts/edit/1/fr')->assertStatus(302);
        $this->get('/posts/edit/1/sdfds12')->assertStatus(404);

        // not found post
        $this->get('/posts/edit/123/en')->assertStatus(302);

        $this->actingAs(factory(User::class)->make())
            ->get('/posts/edit/1/en')
            ->assertStatus(403);


        $this->actingAs(factory(User::class)->make())
            ->get('/posts/edit/1/ar')
            ->assertStatus(403);

        $this->actingAs(factory(User::class)->make())
            ->get('/posts/edit/1/fr')
            ->assertStatus(404);

        $this->actingAs(factory(User::class)->make())
            ->get('/posts/edit/213/en')
            ->assertStatus(404);

        $this->actingAs(factory(User::class)->make())
            ->get('/posts/edit/dfd3/en')
            ->assertStatus(404);

    }
}
