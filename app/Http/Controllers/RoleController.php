<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests\CreateRolesRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
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
        $roles = Role::all();
        // $roles = $role->permissions->pluck("name")->all();
        // dd($roles);
        return view('Admin.roles.index')->with("roles",$roles); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::all();
        // dd($permission);
        return view('Admin.roles.create')->with("permissions",$permission);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRolesRequest $request)
    {
        $role = Role::create($request->validated());
        $role->syncPermissions($request->permissions);
        return to_route('admin.roles.index')->with('success', 'roles created sucessfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::find($id);;
        $roles = $role->users->pluck("name")->all();
        // dd($role->users->pluck("name")->all());
        // $roles = $role->permissions->pluck("name")->all();
        // $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        //     ->where("role_has_permissions.role_id",$id)
        //     ->get();
            // dd($roles,$array);
            // dd($rolePermissions);
            // dd(implode(",",  array($roles) ));
            // dd(implode(",",  $roles ));
    
        return view('Admin.roles.show', compact("role","roles"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        $permission = Permission::all();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        // dd($rolePermissions);
      
        if (!isset($role)){
            return redirect('admin/roles')->with('error', 'No role Found');
        }
       return view('admin.roles.edit',[
        "role"=>$role,
        "permissions"=>$permission,
        "rolePermissions"=>$rolePermissions,
       ]);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateRolesRequest $request, Role $role)
    {
        // dd($request);
        $role->name = $request->name;
        $role->syncPermissions($request->permissions);
        $role->save();
        return to_route('admin.roles.index')
                    ->with('success', 'role updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // dd($role);
        $role->delete();
        return to_route('admin.roles.index')
                    ->with('success', 'role deleted sucessfully');
    }
}
