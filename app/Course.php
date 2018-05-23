<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description'];
    /**
     * Scope a query to order courses asc
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('id', 'desc');
    }

    /**
     * Get the user that owns the course.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the titular teacher
     */
    public function teacher()
    {
        return $this->belongsTo('App\User', 'teacher_id');
    }


    /**
     * Get the course modules.
     */
    public function modules()
    {
        return $this->hasMany('App\Module');
    }
}
