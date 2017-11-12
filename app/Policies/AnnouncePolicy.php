<?php

namespace App\Policies;

use App\User;
use App\Announce;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnnouncePolicy
{

    use HandlesAuthorization;

    /**
     * Determine whether the user can view the announce.
     *
     * @param  \App\User  $user
     * @param  \App\Announce  $announce
     * @return mixed
     */
    public function view(User $user, Announce $announce)
    {
        return true;
    }

    /**
     * Determine whether the user can create announces.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->isRegular())
            return true;
        
    } 
    
    /**
     * Determine whether the user can update the announce.
     *
     * @param  \App\User  $user
     * @param  \App\Announce  $announce
     * @return mixed
     */
    public function update(User $user, Announce $announce)
    {
        if($user->isAdmin() || $user->id === $announce->user->id) // изменить на user has announce    
            return true;
    }

    /**
     * Determine whether the user can delete the announce.
     *
     * @param  \App\User  $user
     * @param  \App\Announce  $announce
     * @return mixed
     */
    public function delete(User $user, Announce $announce)
    {
        if($user->isAdmin() || $user->id == $announce->user->id) // изменить на user has announce
            return true;
    }

    /*
    public function before(User $user, $ability)
    {
        if($user->role == 2)
        {
            return true;
        }
    }
    */

}
