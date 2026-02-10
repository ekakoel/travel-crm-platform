<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agent extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'company_id', 'name', 'email', 'phone', 'password', 'is_active'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function quotations()
    {
        return $this->morphMany(Quotation::class, 'customerable');
    }

    public function wallet()
    {
        return $this->hasOne(AgentWallet::class);
    }
}

