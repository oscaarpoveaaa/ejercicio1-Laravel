<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    public function students()
    {
        return $this->belongsToMany(student::class)->withTimestamps;
    }

    use HasFactory;
}
