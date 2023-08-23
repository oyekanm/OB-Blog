<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePermissionsRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct(){
        // $this->middleware('permission:role_list|role_create|role_edit|role_delete', ['only' => ['index','show']]);
        // $this->middleware('permission:role_create', ['only' => ['create','store']]);
        // $this->middleware('permission:role_edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:role_delete', ['only' => ['destroy']]);
   }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Permission::all());
        $permission = Permission::all();
        return view('Admin.permissions.index')->with('permissions',$permission);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('Admin.permissions.create')->with("roles",$roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePermissionsRequest $request)
    {
        // dd($request);
        
        $permission = Permission::create($request->validated());
        $permission->syncRoles($request->roles);
        return to_route('admin.permissions.index')->with('success', 'permission created sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::find($id);
        $role = Role::all();
        $roles = $permission->roles->pluck('id','id')->all();
        // dd($permission->roles->pluck('id','id')->all());
      
        if (!isset($permission)){
            return redirect('admin/permissions')->with('error', 'No Permission Found');
        }
       return view('admin.permissions.edit',[
        "roles"=>$role,
        "roled"=>$roles,
        "permission"=>$permission
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatePermissionsRequest $request, string $id)
    {
        // dd($request->name);
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->save();
        return to_route('admin.permissions.index')->with('success', 'permission updated sucessfully');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        // dd($permission);
        $permission->delete();
        return to_route('admin.permissions.index')->with('success', 'permission was deleted sucessfully');
    }
}
 