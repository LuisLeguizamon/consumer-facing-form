<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class ClientFormTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_client_form_can_be_rendered(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_client_form_show_products_information(): void
    {
        $response = $this->get('/');

        $response->assertInertia(
            fn (AssertableInertia $page) => $page
                ->component('ClientForm/ClientForm')
                ->has('products', 3)
                ->has(
                    'products.home',
                    fn (AssertableInertia $page) => $page
                        ->where('image_url', '/images/products/home-card.jpeg')
                        ->where('subtitle', 'Your current or soon-to-be home')
                        ->where('title', 'Home')
                        ->where('value', 'home')
                )
                ->has(
                    'products.auto',
                    fn (AssertableInertia $page) => $page
                        ->where('image_url', '/images/products/auto-card.jpeg')
                        ->where('subtitle', 'Your personal vehicle(s)')
                        ->where('title', 'Auto')
                        ->where('value', 'auto')
                )

                ->has(
                    'products.recreational_vehicle',
                    fn (AssertableInertia $page) => $page
                        ->where('image_url', '/images/products/recreational-vehicle-card.jpeg')
                        ->where('subtitle', 'Your boat RV, motorcycle, etc')
                        ->where('title', 'Recreational Vehicle')
                        ->where('value', 'recreational_vehicle')
                )
        );
    }
}
