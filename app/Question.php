<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'content'];

    /**
     * Scope a query to order questions asc
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('id', 'desc');
    }

    /**
     * Get the user that owns the topic.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the course of the question
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    /**
     * Get the answers of the question
     */
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
