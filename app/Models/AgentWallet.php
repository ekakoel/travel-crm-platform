<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentWallet extends Model
{
    protected $fillable = ['agent_id', 'balance'];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function transactions()
    {
        return $this->hasMany(AgentTransaction::class);
    }
}

