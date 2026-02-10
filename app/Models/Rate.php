<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'net_price', 'publish_price', 'currency',
        'start_date', 'end_date'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date'
    ];

    public function rateable()
    {
        return $this->morphTo();
    }
}

