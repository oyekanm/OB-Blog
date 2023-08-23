<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Support\Arr;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct(){
        // $this->middleware('permission:user_list|user_create|user_edit|user_delete', ['only' => ['index','show']]);
        // $this->middleware('permission:user_create', ['only' => ['create','store']]);
        // $this->middleware('permission:user_edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:user_delete', ['only' => ['destroy']]);
   }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        // $user = User::where("role","=", "admin");
        // $users = DB::table("model_has_roles")->get();
        // ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        // ->all();
        
        // dd($users);
       return view("Admin.users.index")->with("users",$users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        // dd($roles);
        return view("Admin.users.create")->with("roles",$roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $user = $request->validated();
        $user["password"] = Hash::make($user["password"]);

        $users = User::create($user);
        $users->assignRole($request->roles);
        // dd($user);
        return to_route('admin.users.index')->with('success', 'User created sucessfully');
        // dd($request->roles);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // dd($user->getPermissionsViaRoles()->pluck('name')->all());
        // dd($user->getPermissionsViaRoles()->count());


        // All permissions which apply on the user (inherited and direct)
            // dd($user->getAllPermissions());
            // dd($user->roles->permissions);
        //  dd($user->getRoleNames());

        return view('Admin.users.show')->with("user",$user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        // dd($roles);
        $userRole = $user->roles->pluck('name','name')->all();
        return view('Admin.users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            // $input = unset($input['password']);    
            $input = Arr::except($input,array('password'));    
        }
        // dd(DB::table('model_has_roles')->where('model_id',$id));
        $user = User::find($id);
        $user->update($input);
        $user->syncRoles($input["roles"]);
        // $user->assignRole($input["roles"]);
     
        return to_route('admin.users.index')->with('success', 'User updated sucessfully');
        
        // dd($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('admin.users.index')
                    ->with('success', 'User deleted sucessfully');
    }
}
