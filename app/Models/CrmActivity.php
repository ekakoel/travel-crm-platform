<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmActivity extends Model
{
    protected $fillable = [
        'type', 'note', 'activity_date'
    ];

    protected $casts = [
        'activity_date' => 'datetime'
    ];

    public function subject()
    {
        return $this->morphTo();
    }
}

