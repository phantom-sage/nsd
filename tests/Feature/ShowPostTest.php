<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowPostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowPostResourceRoute()
    {
        // valid post id & valid language
        $this->get('/posts/1/en')->assertStatus(200);

        // valid post id & valid language
        $this->get('/posts/1/ar')->assertStatus(200);

        // valid post id & unsupported language
        $this->get('/posts/1/fr')->assertStatus(404);

        // valid post id & invalid language
        $this->get('/posts/1/1invalid1')->assertStatus(404);

        // not found post id
        $this->get('/posts/34/en')->assertStatus(404);

        // invalid post id
        $this->get('/posts/post/en')->assertStatus(404);
    }
}
