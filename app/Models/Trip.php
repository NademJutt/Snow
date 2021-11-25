<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'trips'; 

    public function routes()
    {
        return $this->belongsToMany(Route::class, 'trip_route', 'trip_id', 'route_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_trip', 'user_id', 'trip_id');
    }
}
