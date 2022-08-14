<?php

namespace App\Models;

use App\Models\Scopes\GlobalUserScope;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{

    protected static function booted()
    {
        static::addGlobalScope(new GlobalUserScope);
    }

    const TEACHER_CODE_PREFIX = '01';

    use HasFactory, Uuids, SoftDeletes;

    public $table = 'teachers';
    protected $fillable = [
        'teacher_code',
        'users_id',
        'salary',
        'joining_date',
        'designation',
        'qualification',
        'experience',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
