<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class IndexPostTest extends TestCase
{

    # UnAuthorized user

    /**
     * Test posts routes.
     *
     * @return void
     */
    public function testIndexPostsRouteWithUnauthorizedUserWithSupportedLanguageEN()
    {
        $response = $this->get('/posts/en');

        $response->assertStatus(200);
    }

    /**
     * Test posts routes.
     *
     * @return void
     */
    public function testIndexPostsRouteWithUnauthorizedUserWithSupportedLanguageAR()
    {
        $response = $this->get('/posts/ar');

        $response->assertStatus(200);
    }


    /**
     * Test posts routes.
     *
     * @return void
     */
    public function testIndexPostsRouteWithUnauthorizedUserWithUnsupportedLanguage()
    {
        $response = $this->get('/posts/fr');

        $response->assertStatus(404);
    }

    /**
     * Test posts routes.
     *
     * @return void
     */
    public function testIndexPostsRouteWithUnauthorizedUserWithInvalidLanguage()
    {
        $response = $this->get('/posts/2534f32');

        $response->assertStatus(404);
    }


    # Authorized user

    /**
     * Test posts routes.
     *
     * @return void
     */
    public function testIndexPostsRouteWithAuthorizedUserWithSupportedLanguageEN()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/posts/en');

        $response->assertStatus(200);
    }

    /**
     * Test posts routes.
     *
     * @return void
     */
    public function testIndexPostsRouteWithAuthorizedUserWithSupportedLanguageAR()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/posts/ar');

        $response->assertStatus(200);
    }


    /**
     * Test posts routes.
     *
     * @return void
     */
    public function testIndexPostsRouteWithAuthorizedUserWithUnsupportedLanguage()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/posts/fr');

        $response->assertStatus(404);
    }

    /**
     * Test posts routes.
     *
     * @return void
     */
    public function testIndexPostsRouteWithAuthorizedUserWithInvalidLanguage()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/posts/sdfg21');

        $response->assertStatus(404);
    }

}
