<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\GroupModel;
use App\Models\AdminModel\GroupUserModel;
use App\Models\AdminModel\PermissionModel;
use App\Models\AdminModel\RoleModel;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny',RoleModel::class);
        $name_page = [
            'name' => 'Role Create',
            'total' => 'Role',
            'route' => 'role.index'
        ];
        $permissions = PermissionModel::all();
        $roles = RoleModel::all() ?? [];
        $groups = GroupModel::all();
        foreach($permissions as $permission){
            $name_route = explode('.',$permission->name);
            $arr_permissions[$name_route[0]][] = 
            [
                'id' =>  $permission->id,
                'name' => $name_route[1]
            ];
        }
        foreach($arr_permissions as $index => $value) {
            $array_permission[$index] = [];
            foreach($value as $key =>  $v ){
                if($v['name'] === 'index'){
                    $arN[$index][0] = [
                        'id' => $arr_permissions[$index][$key]['id'],
                        'name' => $v['name']
                    ]; 
                }
                if($v['name'] === 'create'){
                    $arN[$index][1] = [
                        'id' => $arr_permissions[$index][$key]['id'],
                        'name' => $v['name']
                    ];
                }
                if($v['name'] === 'update'){
                    $arN[$index][2] = [
                        'id' => $arr_permissions[$index][$key]['id'],
                        'name' => $v['name']
                    ];
                }
                if($v['name'] === 'destroy'){
                    $arN[$index][3] = [
                        'id' => $arr_permissions[$index][$key]['id'],
                        'name' => $v['name']
                    ];
                }
            }
            ksort($arN[$index]);
            $array_permission[$index] = $arN[$index];
        }
        //dd($array_permission);
        return view('admin.role.index',compact('array_permission','name_page','roles','groups'));
    }

    public function api(Request $request)
    {
        
        $roles = RoleModel::where('group_id',$request->group_id)->get()->all();
        $array_role = [];
        if($roles !== []){
            foreach($roles as $key => $role){
                //dd($role->permission);
                $array_role[$role->permission_id] = [
                    'checked' => 1,
                    'permission' => $role->permission_id
                ];
            }
        }
        //dd($array_role);
        $array_role = json_encode($array_role);
        //dd($array_role);
        return response()->json($array_role);
    }

    public function store(Request $request)
    {
        //dd($request);
        try {
            $check_role = RoleModel::where('group_id',$request->role);
            $name = ($check_role->get()->all() != []) ? 'Updated' : 'Created';
            //dd($name);
            if($check_role->get()->all() != []){
                //dd(1);
                $check_role->delete();
                foreach($request->permission_id as $permission => $activated){
                    $role = RoleModel::create([
                        'group_id' => $request->role,
                        'permission_id' => $permission
                    ]);
                }
            }
            else{
                //dd(2);
                foreach($request->permission_id as $permission => $activated){
                    $role = RoleModel::create([
                        'group_id' => $request->role,
                        'permission_id' => $permission
                    ]);
                }
                
            }
           
            return redirect()->route('role.index')->with('success'," $name role successfully!");
            
            //dd($check_role->get()->all() != []);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
