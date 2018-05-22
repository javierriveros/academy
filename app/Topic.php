<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /**
     * Get the user that owns the topic.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the topic course
     */
    public function module()
    {
        return $this->belongsTo('App\Module');
    }
}
