<?php

namespace Tests\Feature;

use Tests\TestCase;

class PosPagesTest extends TestCase
{
    /**
     * All four routes respond and render the expected Blade view.
     */
    public function test_every_page_loads(): void
    {
        $pages = [
            '/' => ['pages.home', 'Run the counter, know your customers.'],
            '/about' => ['pages.about', 'About TFA5 POS'],
            '/customers' => ['customers.index', 'Customer Accounts'],
            '/users' => ['users.index', 'User Accounts'],
        ];

        foreach ($pages as $uri => [$view, $heading]) {
            $this->get($uri)
                ->assertOk()
                ->assertViewIs($view)
                ->assertSee($heading);
        }
    }

    /**
     * Every page shows navigation links to all four pages.
     */
    public function test_navigation_links_to_all_pages_on_every_page(): void
    {
        foreach (['/', '/about', '/customers', '/users'] as $uri) {
            $response = $this->get($uri)->assertOk();

            foreach (['home', 'about', 'customers.index', 'users.index'] as $name) {
                $response->assertSee('href="'.route($name).'"', false);
            }
        }
    }

    /**
     * The customers page loops through at least 5 static records.
     */
    public function test_customers_page_lists_static_array_records(): void
    {
        $response = $this->get('/customers')
            ->assertOk()
            ->assertViewHas('customers', fn (array $customers) => count($customers) >= 5);

        foreach ($response->viewData('customers') as $customer) {
            $response->assertSee($customer['name'])->assertSee($customer['code']);
        }
    }

    /**
     * The users page loops through at least 5 static records.
     */
    public function test_users_page_lists_static_array_records(): void
    {
        $response = $this->get('/users')
            ->assertOk()
            ->assertViewHas('users', fn (array $users) => count($users) >= 5);

        foreach ($response->viewData('users') as $user) {
            $response->assertSee($user['name'])->assertSee($user['username']);
        }
    }

    /**
     * Unknown pages return 404.
     */
    public function test_unknown_page_returns_404(): void
    {
        $this->get('/does-not-exist')->assertNotFound();
    }
}
