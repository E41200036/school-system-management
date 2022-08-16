<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MajorRequest;
use App\Interfaces\MajorInterface;
use Exception;
use Illuminate\Http\Request;

class MajorController extends Controller
{


    private $major;

    public function __construct(MajorInterface $major)
    {
        $this->major = $major;
    }

    public function index(Request $request)
    {
        $majors = $this->major->getAll();

        if ($request->ajax()) {
            return datatables()
                ->of($majors)
                ->addColumn('name', function ($major) {
                    return $major->name;
                })
                ->addColumn('action', function ($major) {
                    return view('admin.major.action', ['major' => $major]);
                })
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.major.index');
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
    public function store(MajorRequest $request)
    {
        try {
            $this->major->store($request->name);
            return redirect()->back()->with('success', 'Data jurusan berhasil dibuat!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', 'Data jurusan gagal dibuat!');
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
        return response()->json($this->major->getById($id));
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
    public function update(MajorRequest $request, $id)
    {
        try {
            $this->major->update($id, $request->name);
            return redirect()->back()->with('success', 'Data jurusan berhasil diubah');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', 'Data jurusan gagal diubah');

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
            $this->major->destroy($id);
            return redirect()->back()->with('success', 'Data jurusan berhasil dihapus!');
        } catch(Exception $th) {
            throw $th;
            return redirect()->back()->with('success', 'Data jurusan berhasil dihapus!');
        }
    }
}
