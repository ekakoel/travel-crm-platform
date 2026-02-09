<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name','email','phone','source','status','assigned_to'
    ];

    public function sales()
    {
        return $this->belongsTo(Admin::class, 'assigned_to');
    }
}
