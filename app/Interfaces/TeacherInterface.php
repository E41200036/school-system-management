<?php

namespace App\Interfaces;

interface TeacherInterface
{
   public function generateTeacherCode();

   public function store($data);
}
