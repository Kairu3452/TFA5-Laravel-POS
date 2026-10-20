<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the users table with the same records used by the static
     * array in UserController. Every sample account uses the demo
     * password "password".
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Kyle Pingol', 'username' => 'kpingol', 'email' => 'kyle.pingol@example.com', 'role' => 'Administrator', 'status' => 'Active', 'last_login_at' => '2026-10-20 08:15:00'],
            ['name' => 'Andrea Lim', 'username' => 'alim', 'email' => 'andrea.lim@example.com', 'role' => 'Store Manager', 'status' => 'Active', 'last_login_at' => '2026-10-20 07:58:00'],
            ['name' => 'Joshua Ramos', 'username' => 'jramos', 'email' => 'joshua.ramos@example.com', 'role' => 'Cashier', 'status' => 'Active', 'last_login_at' => '2026-10-19 18:42:00'],
            ['name' => 'Kristine Navarro', 'username' => 'knavarro', 'email' => 'kristine.navarro@example.com', 'role' => 'Cashier', 'status' => 'Active', 'last_login_at' => '2026-10-19 13:05:00'],
            ['name' => 'Daniel Aquino', 'username' => 'daquino', 'email' => 'daniel.aquino@example.com', 'role' => 'Inventory Clerk', 'status' => 'Active', 'last_login_at' => '2026-10-18 16:30:00'],
            ['name' => 'Patricia Cruz', 'username' => 'pcruz', 'email' => 'patricia.cruz@example.com', 'role' => 'Cashier', 'status' => 'Inactive', 'last_login_at' => '2026-09-30 11:12:00'],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['username' => $user['username']],
                $user + ['password' => 'password'] // hashed automatically by the User model cast
            );
        }
    }
}
