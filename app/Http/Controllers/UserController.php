<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * User Accounts page (staff who can log in to the POS).
 *
 * GET /users -> UserController@index -> resources/views/users/index.blade.php
 *
 * The data below is a static PHP array that acts as a temporary data
 * source. It will be replaced by the "users" database table (see the
 * migrations and UserSeeder) once the app is connected to a database.
 */
class UserController extends Controller
{
    /**
     * Static sample user records (temporary data source).
     *
     * @var array<int, array<string, mixed>>
     */
    private static array $users = [
        [
            'id' => 1,
            'name' => 'Kyle Pingol',
            'username' => 'kpingol',
            'email' => 'kyle.pingol@example.com',
            'role' => 'Administrator',
            'status' => 'Active',
            'last_login' => '2026-10-20 08:15',
        ],
        [
            'id' => 2,
            'name' => 'Andrea Lim',
            'username' => 'alim',
            'email' => 'andrea.lim@example.com',
            'role' => 'Store Manager',
            'status' => 'Active',
            'last_login' => '2026-10-20 07:58',
        ],
        [
            'id' => 3,
            'name' => 'Joshua Ramos',
            'username' => 'jramos',
            'email' => 'joshua.ramos@example.com',
            'role' => 'Cashier',
            'status' => 'Active',
            'last_login' => '2026-10-19 18:42',
        ],
        [
            'id' => 4,
            'name' => 'Kristine Navarro',
            'username' => 'knavarro',
            'email' => 'kristine.navarro@example.com',
            'role' => 'Cashier',
            'status' => 'Active',
            'last_login' => '2026-10-19 13:05',
        ],
        [
            'id' => 5,
            'name' => 'Daniel Aquino',
            'username' => 'daquino',
            'email' => 'daniel.aquino@example.com',
            'role' => 'Inventory Clerk',
            'status' => 'Active',
            'last_login' => '2026-10-18 16:30',
        ],
        [
            'id' => 6,
            'name' => 'Patricia Cruz',
            'username' => 'pcruz',
            'email' => 'patricia.cruz@example.com',
            'role' => 'Cashier',
            'status' => 'Inactive',
            'last_login' => '2026-09-30 11:12',
        ],
    ];

    /**
     * List all user accounts.
     */
    public function index(): View
    {
        $users = self::$users;

        $summary = [
            'total' => count($users),
            'active' => count(array_filter($users, fn (array $user) => $user['status'] === 'Active')),
            'roles' => array_count_values(array_column($users, 'role')),
        ];

        return view('users.index', [
            'title' => 'User Accounts',
            'users' => $users,
            'summary' => $summary,
        ]);
    }
}
