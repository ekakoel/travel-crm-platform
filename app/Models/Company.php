<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'country', 'email', 'phone', 'credit_limit'
    ];

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }
}

