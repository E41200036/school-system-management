<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Interfaces\TeacherInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TeacherController extends Controller
{

    protected $teacher;

    public function __construct(TeacherInterface $teacher)
    {
        $this->teacher = $teacher;
    }

    public function index(Request $request)
    {
        $teachers = $this->teacher->getAll();

        try {
            if ($request->ajax()) {
                return datatables()
                    ->of($teachers)
                    ->addColumn('teacher_code', function ($teacher) {
                        return $teacher->teacher_code;
                    })
                    ->addColumn('fullname', function ($teacher) {
                        return $teacher->user->fullname;
                    })
                    ->addColumn('gender', function ($teacher) {
                        return $teacher->user->gender == 'L' ? 'Laki-laki' : 'Perempuan';
                    })
                    ->addColumn('qualification', function ($teacher) {
                        return $teacher->qualification;
                    })
                    ->addColumn('experience', function ($teacher) {
                        return $teacher->experience;
                    })
                    ->addColumn('phone_number_1', function ($teacher) {
                        return $teacher->user->phone_number_1;
                    })
                    ->addColumn('dob', function ($teacher) {
                        return date('d-m-Y', strtotime($teacher->user->dob));
                    })
                    ->addColumn('action', function ($teacher) {
                        return view('admin.teacher.action', ['teacher' => $teacher]);
                    })
                    ->addIndexColumn()
                    ->make(true);
            }
            return view('admin.teacher.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create', [
            'teacherCode' => $this->teacher->generateTeacherCode(),
            'roles'       => Role::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        try {
            $this->teacher->store(array_merge($request->all()));
            return redirect()->back()->with('success', 'Data Guru berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Guru gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.teacher.show', ['teacher' => $this->teacher->getById($id), 'roles' => Role::get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.teacher.edit', ['teacher' => $this->teacher->getById($id), 'roles' => Role::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, $id)
    {
        try {
            $this->teacher->update($id, $request->all());
            return redirect()->back()->with('success', 'Data Guru berhasil diperbarui');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Data Guru gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->teacher->delete($id);
            return redirect()->back()->with('success', 'Data Guru berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Guru gagal dihapus');
        }
    }
}
