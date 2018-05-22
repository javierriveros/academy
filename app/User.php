<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isStudent() {
		return $this->type >= 1;
    }

	public function isTeacher() {
		return $this->type >= 2;
    }

	public function isAdmin() {
		return $this->type >= 3;
    }

    public function rol()
    {
        if ($this->isAdmin()) {
            return 'admin';
        } else if($this->isTeacher()) {
            return 'teacher';
        } else {
            return 'student';
        }
    }

    /**
     * Get all of the courses for the user.
     */
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    /**
     * Get all of the modules for the user.
     */
    public function modules()
    {
        return $this->hasMany('App\Module');
    }
}
