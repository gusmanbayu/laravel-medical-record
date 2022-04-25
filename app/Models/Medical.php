<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
    public function action()
    {
        return $this->belongsTo(Action::class);
    }

    public function laboratory()
    {
        return $this->hasMany(Laboratory::class);
    }
}
