<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    protected $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->user->getAll();

        if ($request->ajax()) {
            return datatables()
                ->of($users)
                ->addColumn('fullname', function ($user) {
                    return $user->fullname;
                })
                ->addColumn('email', function ($user) {
                    return $user->email;
                })
                ->addColumn('alternate_email', function ($user) {
                    return $user->alternate_email ?? '-';
                })
                ->addColumn('phone_number_1', function ($user) {
                    return $user->phone_number_1;
                })
                ->addColumn('dob', function ($user) {
                    return date('d-m-Y', strtotime($user->dob));
                })
                ->addColumn('gender', function ($user) {
                    return $user->gender == 'L' ? 'Laki Laki' : 'Perempuan';
                })
                ->addColumn('action', function ($user) {
                    return view('admin.users.action', [
                        'user' => $user,
                        'roles' => Role::all()
                    ]);
                })
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.users.index', [
            'roles' => Role::all(),
        ]);
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
    public function store(UserRequest $request)
    {
        try {
            $this->user->store($request->all());
            return redirect()->back()->with('success', 'Data User berhasil ditambahkan!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', 'Data User gagal ditambahkan!');
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
    public function update(UserRequest $request, $id)
    {
        try {
            $this->user->update($id, $request->all());
            return redirect()->back()->with('success','Data pengguna berhasil di ubah!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', 'Data pengguna gagal diubah!');
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
            $this->user->destroy($id);
            return redirect()->back()->with('success', 'Data user berhasil dihapus');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', 'Data user gagal dihapus!');
        }
    }
}
