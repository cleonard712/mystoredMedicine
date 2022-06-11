<?php

namespace App\Policies;

use App\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response as AccessResponse;

class SupplierPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function delete(User $user)
    {
        return($user->sebagai == 'owner' 
        ? AccessResponse::allow()
        : AccessResponse::deny('You must be a super administrator') 
    );
    }
}
