<?php

namespace App\Interfaces;

interface UserInterface
{
    public function getAll();
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}
