<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'routes'; 

    public function trips()
    {
        return $this->belongsToMany(Trip::class);
    }

    public function location()
    {
        return $this->hasMany(Location::class);
    }
}
