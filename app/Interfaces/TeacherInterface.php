<?php

namespace App\Interfaces;

interface TeacherInterface
{
   public function generateTeacherCode();

   public function getAll();
   public function getById($id);
   public function store($data);
   public function delete($id);
   public function update($id, $data);
}
