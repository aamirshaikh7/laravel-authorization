<?php

namespace App\Policies;

use App\Models\Discussion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscussionPolicy
{
    use HandlesAuthorization;

    public function before (User $user) {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discussion  $discussion
     * @return mixed
     */
    public function markAsBestComment(User $user, Discussion $discussion)
    {
        return $discussion->user->is($user);
    }

    public function view(User $user, Discussion $discussion) {
        return $discussion->user->is($user);
    }
}
