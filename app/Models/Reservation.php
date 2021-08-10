<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public $fillable = ['arrival', 'departure', 'guests', 'price', 'hotel_id', 'suite_id'];
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }
    public function suite()
    {
        return $this->belongsTo('App\Models\Suite');
    }
}
