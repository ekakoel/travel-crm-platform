<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentTransaction extends Model
{
    protected $fillable = ['amount', 'type', 'description'];

    public function wallet()
    {
        return $this->belongsTo(AgentWallet::class, 'agent_wallet_id');
    }
}

