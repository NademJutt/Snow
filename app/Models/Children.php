<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $dates = ['dob'];

    public function orders() 
    {
        return $this->belongsToMany(Order::class, 'order_childerns', 'order_id', 'child_id');
    }
}
