<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'company_id'];

    public function company(){
        return $this->belongsTo(Company::class, ['company_id']);
    }

    public function hauls(){
        return $this->hasMany(Haul::class, ['id']);
    }
}
