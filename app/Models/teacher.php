<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);  // A teacher belongs to a user
    }

    // Relationship with Course (Teacher to Course)
    public function courses()
    {
        return $this->hasMany(Course::class);  // A teacher can teach many courses
    }
}
