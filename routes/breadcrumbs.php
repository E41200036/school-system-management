<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function(BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// ------------- TEACHER -------------
// Teacher
Breadcrumbs::for('teachers', function(BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Guru', route('admin.teacher.index'));
});

// Teacher > Create
Breadcrumbs::for('teacher-create', function(BreadcrumbTrail $trail) {
    $trail->parent('teachers');
    $trail->push('Tambah Guru', route('admin.teacher.create'));
});
