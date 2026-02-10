<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmNote extends Model
{
    protected $fillable = ['note', 'user_id'];

    public function noteable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

