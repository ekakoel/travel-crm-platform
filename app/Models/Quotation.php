<?php

namespace App\Models;

use App\Models\QuotationLog;
use App\Models\QuotationItem;
use App\Models\QuotationHotel;
use App\Models\QuotationShare;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quotation extends Model
{
    use HasFactory;
    protected $fillable = [
        'currency','pax','subtotal','margin','total',
        'valid_until','status','share_uuid'
    ];

    protected static function booted()
    {
        static::creating(function ($q) {
            $q->code = 'QT-' . now()->format('Ymd') . '-' . rand(1000,9999);
            $q->share_uuid = Str::uuid();
        });
    }

    public function quotable()
    {
        return $this->morphTo();
    }

    public function items()
    {
        return $this->hasMany(QuotationItem::class);
    }

    public function hotels()
    {
        return $this->hasMany(QuotationHotel::class);
    }

    public function logs()
    {
        return $this->hasMany(QuotationLog::class);
    }

    public function shares()
    {
        return $this->hasMany(QuotationShare::class);
    }
}
