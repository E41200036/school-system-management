<?php

namespace App\Repositories;

use App\Interfaces\TeacherInterface;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TeacherRepository implements TeacherInterface
{
    protected $model;

    public function __construct(Teacher $model)
    {
        $this->model = $model;
    }

    public function generateTeacherCode()
    {
        // code start at 001
        $teacherCode = Teacher::TEACHER_CODE_PREFIX . date('Ymd') . sprintf('%03d', $this->model->count() + 1);
        $teacher     = $this->model->where('teacher_code', $teacherCode)->first();
        if ($teacher) {
            $this->generateTeacherCode();
        } else {
            return $teacherCode;
        }
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'first_name'      => $data['first_name'],
                'last_name'       => $data['last_name'],
                'fullname'        => $data['first_name'] . ' ' . $data['last_name'],
                'username'        => strtolower($data['first_name'] . ' ' . $data['last_name']),
                'email'           => $data['email'],
                'mother_name'     => $data['mother_name'] ?? null,
                'gender'          => $data['gender'],
                'profile_picture' => $data['profile_picture'] ?? null,
                'phone_number_1'  => $data['phone_number_1'],
                'phone_number_2'  => $data['phone_number_2'] ?? null,
                'dob'             => $data['dob'],
                'address'         => $data['address'],
                'extra_note'      => $data['extra_note'] ?? null,
                'alternate_email' => $data['alternate_email'] ?? null,
                'is_active'       => $data['is_active'] ?? true,
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        try {
            Teacher::create([
                'users_id'      => $user->id,
                'teacher_code'  => $data['teacher_code'],
                'salary'        => $data['salary'],
                'joining_date'  => $data['joining_date'],
                'designation'   => $data['designation'],
                'qualification' => $data['qualification'],
                'experience'    => $data['experience'],
                'is_active'     => 1
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        try {
            $user->assignRole($data['designation']);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        DB::commit();
    }

    public function getAll()
    {
        return $this->model->with('user')->get();
    }

    public function getById($id)
    {
        return $this->model->with('user')->find($id);
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $teacher = $this->model->find($id);
            $teacher->is_active = 0;
            $teacher->save();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        try {
            $teacher->user->is_active = 0;
            $teacher->user->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        DB::commit();
    }

    public function update($id, $data)
    {
        DB::beginTransaction();
        try {
            $teacher = $this->model->find($id);
            $teacher->update($data);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        try {
            $teacher->user->update($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        try {
            $teacher->user->syncRoles($data['designation']);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        DB::commit();
    }
}
