<?php

namespace App\Observers\Admin;

use App\Models\Semester;
use Illuminate\Support\Facades\Auth;

class SemesterObserver
{
    public function creating(Semester $param)
    {
        if(Auth::check()) {
            $param->created_by = Auth::user()->id;
            $param->is_active = 1;
        }
    }

    public function updating(Semester $param)
    {
        if(Auth::check()) {
            $param->updated_by = Auth::user()->id;
        }
    }
}
