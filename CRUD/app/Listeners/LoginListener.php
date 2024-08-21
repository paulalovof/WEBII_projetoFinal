<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Auth;

class LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        PermissionController::loadPermissions(Auth::user() -> role_id);
    }
}
