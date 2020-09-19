<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AboutusTest extends TestCase
{
    /**
     * Test about us routes.
     *
     * @return void
     */
    public function testAboutusEN()
    {
        $response = $this->get('/about-us/en');

        $response->dumpHeaders();
        $response->assertStatus(200);
    }


    /**
     * Test about us routes.
     *
     * @return void
     */
    public function testAboutusAR()
    {
        $response = $this->get('/about-us/ar');

        $response->assertStatus(200);
    }


    /**
     * Test about us routes.
     *
     * @return void
     */
    public function testAboutusWithUnSupportedLanguage()
    {
        $response = $this->get('/about-us/fr');

        $response->assertStatus(404);
    }


    /**
     * Test about us routes.
     *
     * @return void
     */
    public function testAboutusWithoutLanguage()
    {
        $response = $this->get('/about-us/nolang');

        $response->assertStatus(404);
    }


    /**
     * Test about us routes.
     *
     * @return void
     */
    public function testAboutusWithInvalidLanguageParameter()
    {
        $response = $this->get('/about-us/23');

        $response->assertStatus(404);
    }
}
