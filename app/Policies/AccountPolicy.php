<?php

namespace App\Policies;

use App\Account;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
{
    use HandlesAuthorization;

    public function owner(User $user, Account $account)
    {
        return $user->id === $account->user_id;
    }
}
