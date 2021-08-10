<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suite extends Model
{
    use HasFactory;
    public $fillable = ['name'];
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }
}

