<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['name', 'city', 'country'];

    public function rooms()
    {
        return $this->hasMany(HotelRoom::class);
    }
}

