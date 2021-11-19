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
        return $this->belongsToMany(Route::class);
    }
}
