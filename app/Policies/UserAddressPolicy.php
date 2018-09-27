<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
Use App\Models\UserAddress;

class UserAddressPolicy
{
    use HandlesAuthorization;

    public function own(User $user,UserAddress $userAddress){
        return $user->id == $userAddress->user_id;
    }
}
