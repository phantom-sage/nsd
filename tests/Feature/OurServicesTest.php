<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OurServicesTest extends TestCase
{
    /**
     * Test our services routes.
     *
     * @return void
     */
    public function testOurServicesEN()
    {
        $response = $this->get('/our-services/en');

        $response->assertStatus(200);
    }


    /**
     * Test our services routes.
     *
     * @return void
     */
    public function testOurServicesAR()
    {
        $response = $this->get('/our-services/ar');

        $response->assertStatus(200);
    }


    /**
     * Test our services routes.
     *
     * @return void
     */
    public function testOurServicesWithUnsupportedLanguage()
    {
        $response = $this->get('/our-services/fr');

        $response->assertStatus(404);
    }


    /**
     * Test our services routes.
     *
     * @return void
     */
    public function testOurServicesWithInvalidLanguageParameter()
    {
        $response = $this->get('/our-services/123');

        $response->assertStatus(404);
    }
}
