<?php

namespace App\Interfaces;

interface UserInterface
{
    public function getAll();
    public function store($data);
}
