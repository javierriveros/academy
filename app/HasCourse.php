<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasCourse extends Model
{
    /**
     * Get the course
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    /**
     * Get the user
     */
    public function student()
    {
        return $this->belongsTo('App\User', 'student_id');
    }
}
