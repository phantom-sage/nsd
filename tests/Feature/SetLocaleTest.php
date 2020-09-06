<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SetLocaleTest extends TestCase
{
    /**
     * Test set locale route.
     *
     * @return void
     */
    public function testSetLocaleEN()
    {
        $response = $this->post('/setLocale', [
            'language' => 'en'
        ], [
            'Content-Type' => 'Application\json'
        ]);

        $response->assertStatus(302);
    }


    /**
     * Test set locale route.
     *
     * @return void
     */
    public function testSetLocaleAR()
    {
        $response = $this->post('/setLocale', [
            'language' => 'ar'
        ], [
            'Content-Type' => 'Application\json'
        ]);

        $response->assertStatus(302);
    }



    /**
     * Test set locale route.
     *
     * @return void
     */
    public function testSetLocaleWithUnsupportedLanguage()
    {
        $response = $this->post('/setLocale', [
            'language' => 'fr'
        ], [
            'Content-Type' => 'Application\json'
        ]);

        $response->assertStatus(404);
    }


    /**
     * Test set locale route.
     *
     * @return void
     */
    public function testSetLocaleWithInvalidLanguageParameter()
    {
        $response = $this->post('/setLocale', [
            'language' => '123'
        ], [
            'Content-Type' => 'Application\json'
        ]);

        $response->assertStatus(404);
    }
}
