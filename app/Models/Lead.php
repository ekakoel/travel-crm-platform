<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name', 'source', 'status', 'assigned_to'
    ];

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function activities()
    {
        return $this->morphMany(CrmActivity::class, 'subject');
    }

    public function notes()
    {
        return $this->morphMany(CrmNote::class, 'noteable');
    }
}

