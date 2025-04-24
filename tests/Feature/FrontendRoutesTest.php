<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FrontendRoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_about_page(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    public function test_faq_page(): void
    {
        $response = $this->get('/faq');

        $response->assertStatus(200);
    }

    public function test_service_page(): void
    {
        $response = $this->get('/service/page');

        $response->assertStatus(200);
    }


    public function test_frontend_logout(): void
    {
        $response = $this->get('/frontend-logout');

        $response->assertRedirect('/');
    }


}
