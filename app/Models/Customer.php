<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Customer account (database version of the CustomerController static array).
 */
class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'code',
        'name',
        'email',
        'phone',
        'city',
        'tier',
        'points',
        'status',
        'joined',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'points' => 'integer',
        ];
    }
}
