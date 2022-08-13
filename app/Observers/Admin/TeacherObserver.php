<?php

namespace App\Observers\Admin;

use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class TeacherObserver
{
    /**
     * Handle the teacher "created" event.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return void
     */
    public function creating(Teacher $teacher)
    {
        if(Auth::check()) {
            $teacher->created_by = Auth::user()->id;
        }
    }

    /**
     * Handle the teacher "updated" event.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return void
     */

    public function updating(Teacher $teacher)
    {
        if(Auth::check()) {
            $teacher->updated_by = Auth::user()->id;
        }
    }
}
