<?php

namespace App\Models;

use App\Models\Scopes\GlobalUserScope;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new GlobalUserScope);
    }

    protected $fillable = [
        'name'
    ];
}
