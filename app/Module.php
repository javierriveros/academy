<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['title', 'description'];

    /**
     * Get the user that owns the module.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the module course
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    /**
     * Get the module topics
     */
    public function topics()
    {
        return $this->hasMany('App\Topic');
    }
}
