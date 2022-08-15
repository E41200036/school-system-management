<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->with('roles')->whereHas('roles', function ($query) {
            $query->where('name', User::ADMIN_ROLE)
                ->orWhere('name', User::KEPALA_SEKOLAH_ROLE)
                ->orWhere('name', User::WAKIL_KEPALA_SEKOLAH_ROLE)
                ->orWhere('name', User::KOMISARIS_ROLE);
        })->get();
    }

    public function store($data)
    {
        $fullname = $data['first_name'] . ' ' . $data['last_name'];
        $username = strtolower($data['first_name']);

        DB::beginTransaction();

        try {
            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'fullname' => $fullname,
                'username' => $username,
                'email' => $data['email'],
                'alternate_email' => $data['alternate_email'] ?? null,
                'phone_number_1' => $data['phone_number_1'],
                'phone_number_2' => $data['phone_number_2'] ?? null,
                'mother_name' => $data['mother_name'] ?? null,
                'dob' => $data['dob'],
                'gender' => $data['gender'],
                'address' => $data['address'],
                'is_active' => 1
            ]);
        } catch (Exception $th) {
            throw $th;
            DB::rollBack();
        }

        try {
            $user->assignRole($data['role']);
        } catch (Exception $th) {
            throw $th;
            DB::rollBack();
        }

        DB::commit();
    }

    public function update($id, $data)
    {
        DB::beginTransaction();
        try {
            $user = $this->model->find($id);
            $user->update($data);
            $user->save;
        } catch (Exception $th) {
            throw $th;
            DB::rollBack();
        }

        try {
            $user->syncRoles($data['role']);
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
            $user = $this->model->find($id);
            $user->is_active = 0;
            $user->save();
        } catch (Exception $th) {
            throw $th;
            DB::rollBack();
        }

        DB::commit();
    }
}
