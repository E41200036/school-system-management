<?php

namespace App\Observers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    public function creating(User $params)
    {
        if(Auth::check())
        {
            $params->password = password_hash($params->password, PASSWORD_DEFAULT);
            $params->created_by = Auth::user()->id;
        }
    }

    public function updating(User $params)
    {
        if(Auth::check())
        {
            $params->updated_by = Auth::user()->id;
        }
    }
}
