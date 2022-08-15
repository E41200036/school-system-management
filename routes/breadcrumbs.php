<?php // routes/breadcrumbs.php

use App\Models\Teacher;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

Breadcrumbs::for('dashboard', function(BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// ------------- TEACHER -------------
// Teacher
Breadcrumbs::for('teachers', function(BreadcrumbTrail $trail) {
    $trail->push('Guru', route('admin.teacher.index'));
});

// Teacher > Create
Breadcrumbs::for('teacher-create', function(BreadcrumbTrail $trail) {
    $trail->parent('teachers');
    $trail->push('Tambah Guru', route('admin.teacher.create'));
});

// Teacher > [User]
Breadcrumbs::for('teacher-info', function(BreadcrumbTrail $trail, Teacher $teacher) {
    $trail->parent('teachers');
    $trail->push($teacher->user->fullname, route('admin.teacher.show', $teacher->id));
});

// Teacher > [User] > Edit
Breadcrumbs::for('teacher-edit', function(BreadcrumbTrail $trail, Teacher $teacher) {
    $trail->parent('teacher-info', $teacher);
    $trail->push('Ubah', route('admin.teacher.edit', $teacher->id));
});

// ------------- USER -------------

// User
Breadcrumbs::for('user', function(BreadcrumbTrail $trail) {
    $trail->push('Pengguna');
});

// ------------- ROLE -------------

// Role
Breadcrumbs::for('role', function(BreadcrumbTrail $trail) {
    $trail->push('Role', route('admin.role.index'));
});

// Role > Create
Breadcrumbs::for('role-create', function(BreadcrumbTrail $trail) {
    $trail->parent('role');
    $trail->push('Tambah Role');
});

// Role > Info
Breadcrumbs::for('role-show', function(BreadcrumbTrail $trail, Role $role) {
    $trail->parent('role');
    $trail->push($role->name, route('admin.role.show', $role->id));
});

// Role > [Role] > Ubah
Breadcrumbs::for('role-edit', function(BreadcrumbTrail $trail, Role $role) {
    $trail->parent('role-show', $role);
    $trail->push('Ubah');
});
