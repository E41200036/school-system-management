<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SemesterRequest;
use App\Interfaces\SemesterInterface;
use App\Models\Semester;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{

    private $semester;

    public function __construct(SemesterInterface $semester) {
        $this->semester = $semester;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $semesters = $this->semester->getAll();

        if($request->ajax()) {
            return datatables()
            ->of($semesters)
            ->addColumn('semester_number', function($semester) {
                return $semester->semester_number;
            })
            ->addColumn('action', function($semester) {
                return view('admin.semester.action', ['semester' => $semester]);
            })
            ->addIndexColumn()
            ->make(true);
        }

        return view('admin.semester.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SemesterRequest $request)
    {
        try {
            $this->semester->store($request->all());
            return redirect()->back()->with('success', 'Data semester berhasil dibuat');
        } catch (Exception $th) {
            throw $th;
            return redirect()->back()->with('error', 'Data semester gagal dibuat');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SemesterRequest $request, $id)
    {
        //
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
            $this->semester->destroy($id);
            return redirect()->back()->with('success', 'Data semester berhasil dihapus');
        } catch (Exception $th) {
            throw $th;
            return redirect()->back()->with('error', 'Data semester gagal dihapus');
        }
    }
}
