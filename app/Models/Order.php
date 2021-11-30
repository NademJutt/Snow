<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'orders'; 
 
    public function childrens() 
    {
        return $this->belongsToMany(Children::class, 'order_childerns', 'order_id', 'child_id');
    }

    public function trip()
    {
    	return $this->belongsTo(Trip::class);
    }
}
