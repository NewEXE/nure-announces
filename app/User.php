<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Announce;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function announces()
    {
        return $this->hasMany(Announce::class, 'user_id', 'id');
    }
    
    public function isAdmin()
    {
        return $this->role == 2;
    }
    
    public function isRegular()
    {
        return $this->role == 1 || $this->role == 2;
    }
}
