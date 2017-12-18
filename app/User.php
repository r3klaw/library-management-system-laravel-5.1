<?php

namespace App;

use App\Task;
use App\Book;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'age'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     /**
     * Validate if user is admin
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->is_admin;
    }

    /**
     * Validate if user is senior
     *
     * @return boolean
     */
    public function isSenior()
    {
        return ($this->age > 12);
    }

    /**
     * Validate if user is junior
     *
     * @return boolean
     */
    public function isJunior()
    {
        return ($this->age <= 12);
    }

    /**
     * The books that belong to the user.
     */
    public function books()
    {
        return $this->belongsToMany('App\Book', 'users_books')
                    ->withPivot('expire_on', 'penalty_fee', 'status')
                    ->withTimestamps();
    }
}
