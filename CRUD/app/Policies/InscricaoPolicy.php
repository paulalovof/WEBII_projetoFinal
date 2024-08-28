<?php

namespace App\Policies;

use App\Http\Controllers\PermissionController;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InscricaoPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function index(){
        return PermissionController::isAuthorized('inscricao.index');
    }
}
