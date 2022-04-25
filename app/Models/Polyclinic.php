<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polyclinic extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function doctor()
    {

        return $this->hasMany(Doctor::class);
    }
}
