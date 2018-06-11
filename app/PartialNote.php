<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartialNote extends Model
{
    protected $fillable = ['name', 'percentage'];
    /**
     * Get the course
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
