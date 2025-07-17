<?php

namespace App\Policies;

use App\Models\Discussion;
use App\Models\User;

class DiscussionPolicy
{
    public function create(User $user): true
    {
        return true;
    }

    public function reply(User $user, Discussion $discussion): true
    {
        return true;
    }

    public function solve(User $user, Discussion $discussion): bool
    {
        return $user->id === $discussion->user_id;
    }
}
