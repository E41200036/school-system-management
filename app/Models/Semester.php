<?php

namespace App\Models;

use App\Models\Scopes\GlobalUserScope;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{

    protected static function booted()
    {
        static::addGlobalScope(new GlobalUserScope);
    }

    use HasFactory, Uuids, SoftDeletes;

    public $table = 'semesters';

    protected $fillable = [
        'semester_number',
    ];
}
