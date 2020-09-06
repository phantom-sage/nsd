<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    /**
     * Test create post.
     *
     * @return void
     */
    public function testCreatePostWithUnauthorizedUserEN()
    {
        $response = $this->get('/posts/create/en')->assertStatus(302);
    }


    /**
     * Test create post.
     *
     * @return void
     */
    public function testCreatePostWithUnauthorizedUserAR()
    {
        $reponse = $this->get('/posts/create/ar')->assertStatus(302);
    }


    /**
     * Test create post.
     *
     * @return void
     */
    public function testCreatePostWithAuthorizedUserEN()
    {
        $this->actingAs(factory(User::class)->make())->get('/posts/create/en')->assertStatus(200);
    }


    /**
     * Test create post.
     *
     * @return void
     */
    public function testCreatePostWithAuthorizedUserAR()
    {
        $this->actingAs(factory(User::class)->make())->get('/posts/create/ar')->assertStatus(200);
    }


    /**
     * Test create post.
     *
     * @return void
     */
    public function testCreatePostWithUnauthorizedUserWithUnSupportedLanguagefr()
    {
        $this->get('/posts/create/fr')->assertStatus(302);
    }


    /**
     * Test create post.
     *
     * @return void
     */
    public function testCreatePostWithAuthorizedUserWithUnSupportedLanguagefr()
    {
        $this->actingAs(factory(User::class)->make())->get('/posts/create/fr')->assertStatus(404);
    }

    /**
     * Test create post.
     *
     * @return void
     */
    public function testCreatePostWithUnauthorizedUserWithInvalidLanguage()
    {
        $this->get('/posts/create/frsdf23')->assertStatus(404);
    }

    /**
     * Test create post.
     *
     * @return void
     */
    public function testCreatePostWithAuthorizedUserWithInvalidLanguage()
    {
        $this->actingAs(factory(User::class)->make())->get('/posts/create/frsdf23')->assertStatus(404);
    }
}
