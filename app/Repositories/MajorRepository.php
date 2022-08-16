<?php

namespace App\Repositories;

use App\Interfaces\MajorInterface;
use App\Models\Major;
use Exception;
use Illuminate\Support\Facades\DB;

class MajorRepository implements MajorInterface
{

    private $model;

    public function __construct(Major $model) {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $this->model->create(['name' => $data]);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
        DB::commit();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function update($id, $data) {
        DB::beginTransaction();
        try {
            $major = Major::find($id);
            $major->name = $data;
            $major->save();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
        DB::commit();
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $major = $this->model->where('id', $id)->update(['is_active' => 0]);
        } catch(Exception $th) {
            throw $th;
            DB::rollBack();
        }
        DB::commit();
    }

}
