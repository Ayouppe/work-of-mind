<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    // Relationship with Teacher (Course to Teacher - Many to One)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');  // A course is taught by a teacher (user_id points to user table)
    }


    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }


    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'user_id');
    }

}
