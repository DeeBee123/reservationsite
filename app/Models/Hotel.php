<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    public $fillable = ['name'];
    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }
    public function suites()
    {
        return $this->hasMany('App\Models\Suite');
    }
}
