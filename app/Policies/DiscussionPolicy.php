<?php

namespace App\Policies;

use App\Models\User;

class DiscussionPolicy
{
    public function create(User $user): true
    {
        return true;
    }
}
