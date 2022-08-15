<?php

namespace App\Repositories;

use App\Interfaces\PermissionInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionInterface
{
    protected $model;

    public function __construct(Permission $model) {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
