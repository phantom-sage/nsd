<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactusTest extends TestCase
{
    /**
     * A about us routes.
     *
     * @return void
     */
    public function testAboutUsEN()
    {
        $response = $this->get('/contact-us/en');

        $response->assertStatus(200);
    }


    /**
     * A about us routes.
     *
     * @return void
     */
    public function testAboutUsAR()
    {
        $response = $this->get('/contact-us/ar');

        $response->assertStatus(200);
    }


    /**
     * A about us routes.
     *
     * @return void
     */
    public function testAboutUsWithUnSupportedLanguage()
    {
        $response = $this->get('/contact-us/fr');

        $response->assertStatus(404);
    }

    /**
     * A about us routes.
     *
     * @return void
     */
    public function testAboutUsWithInvalidLanguage()
    {
        $response = $this->get('/contact-us/123');

        $response->assertStatus(404);
    }


    /**
     * A about us routes.
     *
     * @return void
     */
    public function testAboutUsWithNoLanguage()
    {
        $response = $this->get('/contact-us/');

        $response->assertStatus(404);
    }
}
