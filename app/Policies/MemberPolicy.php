<?php

namespace App\Policies;

use App\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response as AccessResponse;
use Illuminate\Support\Facades\Response as FacadesResponse;

class MemberPolicy
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
    public function checkmember(User $user)
    {
        return($user->sebagai == 'member' 
        ? AccessResponse::allow()
        : AccessResponse::deny('Anda harus daftar sebagai member dahulu') 
    );
    }
}
