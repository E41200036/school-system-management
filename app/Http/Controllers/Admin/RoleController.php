<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\PermissionInterface;
use App\Interfaces\RoleInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    protected $roles;
    protected $permissions;

    public function __construct(RoleInterface $roles, PermissionInterface $permissions) {
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = $this->roles->getAll();

        if($request->ajax()) {
            return datatables()
            ->of($roles)
            ->addColumn('name', function($role) {
                return $role->name;
            })
            ->addColumn('action', function($role) {
                return view('admin.role.action', [
                    'role' => $role
                ]);
            })
            ->addIndexColumn()
            ->make(true);
        }

        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = $this->permissions->getAll();
        return view('admin.role.create', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->roles->store($request->all());
            return redirect()->back()->with('success', 'Role baru berhasil dibuat!');
        } catch (Exception $th) {
            throw $th;
            return redirect()->back()->with('error', 'Role gagal berhasil dibuat!');
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
        $role = $this->roles->getById($id);
        return view('admin.role.show', [
            'role' => $role,
            'permissions' => $this->permissions->getAll()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.role.edit', [
            'role' => $this->roles->getById($id),
            'permissions' => $this->permissions->getAll()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->roles->update($id, $request->all());
            return redirect()->back()->with('success', 'Role berhasil diperbarui!');
        } catch (Exception $th) {
            throw $th;
            return redirect()->back()->with('error', 'Role gagal diperbarui!');
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
            $this->roles->destroy($id);
            return redirect()->back()->with('success', 'Role berhasil dihapus!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', 'Role gagal dihapus!');
        }
    }
}
