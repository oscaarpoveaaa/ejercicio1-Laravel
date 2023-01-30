<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{

    public function subjects()
    {
        return $this->belongsToMany(subject::class)->withTimestamps;
    }

    use HasFactory;
}
