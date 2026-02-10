<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationLog extends Model
{
    protected $fillable = ['action', 'user_id'];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

