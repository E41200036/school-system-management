<?php

namespace App\Repositories;

use App\Interfaces\RoleInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleInterface
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findById($id);
    }

    public function store($data)
    {
        DB::beginTransaction();

        try {
            $role = Role::create(['name' => $data['name']]);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }

        try {
            foreach ($data['permission'] as $permission) {
                $role->givePermissionTo($permission);
            }
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }

        DB::commit();
    }

    public function update($id, $data)
    {
        DB::beginTransaction();
        try {
            $role = $this->model->findById($id);
            $role->update(['name' => $data['name']]);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }

        try {
            $role->syncPermissions($data['permission']);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }

        DB::commit();
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        // delete permission of role and role
        try {
            $role = $this->model->findById($id);
            $role->permissions()->detach();
            $role->delete();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }

        DB::commit();
    }
}
