<?php

namespace App\Observers\Admin;

use App\Models\Major;
use Illuminate\Support\Facades\Auth;

class MajorObserver
{
    public function creating(Major $params)
    {
        if(Auth::user()) {
            $params->created_by = Auth::user()->id;
            $params->is_active = 1;
        }
    }

    public function updating(Major $params)
    {
        if(Auth::user()) {
            $params->updated_by = Auth::user()->id;
        }
    }
}
