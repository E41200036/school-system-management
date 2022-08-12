<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password'          => password_hash('password', PASSWORD_DEFAULT),
            'is_active'         => 1,
            'remember_token'    => Str::random(10),
        ];

        $userAdmin = User::create(array_merge([
            'first_name'      => 'Ibnu',
            'last_name'       => 'Sutio',
            'fullname'        => 'Ibnu Sutio',
            'username'        => 'ibnu',
            'email'           => 'ibnu@work.com',
            'mother_name'     => 'Nur Hasanah',
            'gender'          => 'Laki-laki',
            'profile_picture' => null,
            'phone_number_1'  => '081234567890',
            'phone_number_2'  => null,
            'dob'             => '2002-04-22',
            'address'         => 'Jl. Kebon Jeruk No. 1',
            'extra_note'      => null,
            'alternate_email' => null,
            'created_by'      => null,
            'updated_by'      => null,
        ], $default_user_value));

        // Employee Role
        $superAdmin         = Role::create(['name' => User::ADMIN_ROLE]);
        $kepalaSekolah      = Role::create(['name' => User::KEPALA_SEKOLAH_ROLE]);
        $wakilKepalaSekolah = Role::create(['name' => User::WAKIL_KEPALA_SEKOLAH_ROLE]);
        $guru               = Role::create(['name' => User::GURU_ROLE]);
        $akunting           = Role::create(['name' => User::AKUNTING_ROLE]);
        $komisaris          = Role::create(['name' => User::KOMISARIS_ROLE]);

        // Siswa Role
        $siswa = Role::create(['name' => User::SISWA_ROLE]);

        // Role
        $permission = Permission::create(['name' => 'create role']);
        $permission = Permission::create(['name' => 'update role']);
        $permission = Permission::create(['name' => 'delete role']);
        $permission = Permission::create(['name' => 'read role']);

        // User
        $permission = Permission::create(['name' => 'create user']);
        $permission = Permission::create(['name' => 'update user']);
        $permission = Permission::create(['name' => 'delete user']);
        $permission = Permission::create(['name' => 'read user']);

        // Guru
        $permission = Permission::create(['name' => 'create guru']);
        $permission = Permission::create(['name' => 'read guru']);
        $permission = Permission::create(['name' => 'update guru']);
        $permission = Permission::create(['name' => 'delete guru']);

        // Siswa
        $permission = Permission::create(['name' => 'create siswa']);
        $permission = Permission::create(['name' => 'read siswa']);
        $permission = Permission::create(['name' => 'update siswa']);
        $permission = Permission::create(['name' => 'delete siswa']);

        // Kelas
        $permission = Permission::create(['name' => 'create kelas']);
        $permission = Permission::create(['name' => 'read kelas']);
        $permission = Permission::create(['name' => 'update kelas']);
        $permission = Permission::create(['name' => 'delete kelas']);

        // Jurusan
        $permission = Permission::create(['name' => 'create jurusan']);
        $permission = Permission::create(['name' => 'read jurusan']);
        $permission = Permission::create(['name' => 'update jurusan']);
        $permission = Permission::create(['name' => 'delete jurusan']);

        // Mata Pelajaran
        $permission = Permission::create(['name' => 'create mata pelajaran']);
        $permission = Permission::create(['name' => 'read mata pelajaran']);
        $permission = Permission::create(['name' => 'update mata pelajaran']);
        $permission = Permission::create(['name' => 'delete mata pelajaran']);

        $superAdmin->givePermissionTo('create role');
        $superAdmin->givePermissionTo('update role');
        $superAdmin->givePermissionTo('delete role');
        $superAdmin->givePermissionTo('read role');

        $superAdmin->givePermissionTo('create guru');
        $superAdmin->givePermissionTo('read guru');
        $superAdmin->givePermissionTo('update guru');
        $superAdmin->givePermissionTo('delete guru');

        $superAdmin->givePermissionTo('create siswa');
        $superAdmin->givePermissionTo('read siswa');
        $superAdmin->givePermissionTo('update siswa');
        $superAdmin->givePermissionTo('delete siswa');

        $superAdmin->givePermissionTo('create kelas');
        $superAdmin->givePermissionTo('read kelas');
        $superAdmin->givePermissionTo('update kelas');
        $superAdmin->givePermissionTo('delete kelas');

        $superAdmin->givePermissionTo('create jurusan');
        $superAdmin->givePermissionTo('read jurusan');
        $superAdmin->givePermissionTo('update jurusan');
        $superAdmin->givePermissionTo('delete jurusan');

        $superAdmin->givePermissionTo('create mata pelajaran');
        $superAdmin->givePermissionTo('read mata pelajaran');
        $superAdmin->givePermissionTo('update mata pelajaran');
        $superAdmin->givePermissionTo('delete mata pelajaran');

        $superAdmin->givePermissionTo('create user');
        $superAdmin->givePermissionTo('update user');
        $superAdmin->givePermissionTo('delete user');
        $superAdmin->givePermissionTo('read user');

        $userAdmin->assignRole(User::ADMIN_ROLE);
    }
}
