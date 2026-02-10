<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    protected $fillable = ['qty', 'price'];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function itemable()
    {
        return $this->morphTo();
    }
}
