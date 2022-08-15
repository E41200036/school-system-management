<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    public $table = 'students';

    protected $fillable = [
        'users_id',
        'student_code',
        'semesters_id',
    ];
}
