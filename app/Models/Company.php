<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function boats(){
        return $this->hasMany(Ship::class, 'company_id');
    }

    public function users(){
        return $this->hasMany(User::class, 'company_id');
    }

    public $timestamps = false;
}
