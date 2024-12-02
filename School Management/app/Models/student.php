<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class student extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);  // A student belongs to a user
    }

    // Relationship with Course through enrollments
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');  // A student can enroll in many courses
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'user_id');
    }


}
