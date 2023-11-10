<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Haul extends Model
{
    use HasFactory;

    protected $fillable = ['fish_id', 'sea_id', 'ship_id', 'weight'];

    public function ship(){
        return $this->belongsTo(Ship::class, ['ship_id']);
    }
}
