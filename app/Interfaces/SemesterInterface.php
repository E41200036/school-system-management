<?php

namespace App\Interfaces;

interface SemesterInterface
{
    public function getAll();
    public function store($data);
    public function destroy($id);
}
