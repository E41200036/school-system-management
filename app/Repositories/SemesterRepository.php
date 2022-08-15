<?php

namespace App\Repositories;

use App\Interfaces\SemesterInterface;
use App\Models\Semester;
use Exception;
use Illuminate\Support\Facades\DB;

class SemesterRepository implements SemesterInterface
{
    private $model;

    public function __construct(Semester $model) {
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
            Semester::create([
                'semester_number' => $data['semester_number']
            ]);
        } catch (Exception $th) {
            throw $th;
            DB::rollBack();
        }
        DB::commit();
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $semester = Semester::find($id);
            $semester->is_active = 0;
            $semester->save();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
        DB::commit();
    }
}
