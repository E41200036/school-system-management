<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{

    // Employee Role
    const ADMIN_ROLE = 'Super Admin';
    const KEPALA_SEKOLAH_ROLE = 'Kepala Sekolah';
    const WAKIL_KEPALA_SEKOLAH_ROLE = 'Wakil Kepala Sekolah';
    const KOMISARIS_ROLE = 'Komisaris';
    const GURU_ROLE = 'Guru';
    const SISWA_ROLE = 'Siswa';
    const AKUNTING_ROLE = 'Akunting';

    use HasApiTokens, HasFactory, Notifiable, HasRoles, Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'fullname',
        'username',
        'email',
        'mother_name',
        'gender',
        'profile_picture',
        'phone_number_1',
        'phone_number_2',
        'dob',
        'address',
        'extra_note',
        'alternate_email',
        'created_by',
        'updated_by',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'users_id');
    }
}
