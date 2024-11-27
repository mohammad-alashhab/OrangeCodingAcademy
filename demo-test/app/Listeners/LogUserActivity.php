<?php

namespace App\Listeners;

use App\Models\AuditLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class LogUserActivity
{
    /**
     * Handle the event.
     *
     * @param  Login|Logout  $event
     * @return void
     */
    public function handle($event)
    {
        AuditLog::create([
            'user_id' => $event->user->id,
            'action' => $event instanceof Login ? 'Login' : 'Logout',
            'details' => $event instanceof Login
                ? 'User logged in.'
                : 'User logged out.'
        ]);
    }
}

