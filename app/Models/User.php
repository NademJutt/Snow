<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser
{
   
   
    public function meta()
    {
        //return $this->hasOne(Customermeta::class);
        return $this->hasOne(Customermeta::class, 'user_id', 'id');
    }

    public function kid()
    {
        return $this->hasMany(Children::class);
    }

    public function trips()
    {
        return $this->belongsToMany(Trip::class, 'user_trip', 'user_id', 'trip_id');
    }


}
