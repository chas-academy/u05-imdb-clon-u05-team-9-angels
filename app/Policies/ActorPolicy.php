<?php

namespace App\Policies;

use App\Models\Actor;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Actor  $actor
     * @return mixed
     */
    public function update(User $user, Actor $actor)
    {
        return intval($user->type) > 1;
    }
}
