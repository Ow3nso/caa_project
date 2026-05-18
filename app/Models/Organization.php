<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
     * Attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'type',
        'approval_no',
        'valid_until',
        'fleet_size',
        'status',
    ];

    /**
     * Database data-type casting.
     */
    protected $casts = [
        'valid_until' => 'date',
        'fleet_size' => 'integer',
    ];
}