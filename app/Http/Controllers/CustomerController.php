<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * Customer Accounts page.
 *
 * GET /customers -> CustomerController@index -> resources/views/customers/index.blade.php
 *
 * The data below is a static PHP array that acts as a temporary data
 * source. It will be replaced by the "customers" database table (see the
 * migration and CustomerSeeder) once the app is connected to a database.
 */
class CustomerController extends Controller
{
    /**
     * Static sample customer records (temporary data source).
     *
     * @var array<int, array<string, mixed>>
     */
    private static array $customers = [
        [
            'id' => 1,
            'code' => 'CUS-0001',
            'name' => 'Maria Santos',
            'email' => 'maria.santos@example.com',
            'phone' => '0917 555 0101',
            'city' => 'Quezon City',
            'tier' => 'Gold',
            'points' => 2450,
            'status' => 'Active',
            'joined' => '2025-01-14',
        ],
        [
            'id' => 2,
            'code' => 'CUS-0002',
            'name' => 'Juan Dela Cruz',
            'email' => 'juan.delacruz@example.com',
            'phone' => '0918 555 0102',
            'city' => 'Manila',
            'tier' => 'Silver',
            'points' => 1180,
            'status' => 'Active',
            'joined' => '2025-03-02',
        ],
        [
            'id' => 3,
            'code' => 'CUS-0003',
            'name' => 'Angela Reyes',
            'email' => 'angela.reyes@example.com',
            'phone' => '0919 555 0103',
            'city' => 'Makati City',
            'tier' => 'Regular',
            'points' => 320,
            'status' => 'Active',
            'joined' => '2025-06-21',
        ],
        [
            'id' => 4,
            'code' => 'CUS-0004',
            'name' => 'Paolo Garcia',
            'email' => 'paolo.garcia@example.com',
            'phone' => '0920 555 0104',
            'city' => 'Taguig City',
            'tier' => 'Gold',
            'points' => 3105,
            'status' => 'Active',
            'joined' => '2024-11-08',
        ],
        [
            'id' => 5,
            'code' => 'CUS-0005',
            'name' => 'Bea Mendoza',
            'email' => 'bea.mendoza@example.com',
            'phone' => '0921 555 0105',
            'city' => 'Pasig City',
            'tier' => 'Silver',
            'points' => 875,
            'status' => 'Inactive',
            'joined' => '2025-02-27',
        ],
        [
            'id' => 6,
            'code' => 'CUS-0006',
            'name' => 'Carlo Bautista',
            'email' => 'carlo.bautista@example.com',
            'phone' => '0922 555 0106',
            'city' => 'Caloocan City',
            'tier' => 'Regular',
            'points' => 140,
            'status' => 'Active',
            'joined' => '2025-09-05',
        ],
    ];

    /**
     * List all customer accounts.
     */
    public function index(): View
    {
        $customers = self::$customers;

        $summary = [
            'total' => count($customers),
            'active' => count(array_filter($customers, fn (array $customer) => $customer['status'] === 'Active')),
            'gold' => count(array_filter($customers, fn (array $customer) => $customer['tier'] === 'Gold')),
            'points' => array_sum(array_column($customers, 'points')),
        ];

        return view('customers.index', [
            'title' => 'Customer Accounts',
            'customers' => $customers,
            'summary' => $summary,
        ]);
    }
}
