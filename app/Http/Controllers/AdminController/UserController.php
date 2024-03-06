<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\UserRequest\StoreRequest;
use App\Http\Requests\AdminRequest\UserRequest\UpdateRequest;
use App\Models\AdminModel\GroupModel;
use App\Models\AdminModel\GroupUserModel;
use App\Models\AdminModel\InforDentistModel;
use App\Models\AdminModel\LoginModel;
use App\Models\AdminModel\RoleModel;
use App\Models\AdminModel\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */    
    public function index(Request $request)
    {
        $this->authorize('viewAny', UserModel::class);
        
        if($request->ajax()){
            $users = UserModel::get();
            //dd($users);
            return DataTables::of($users)
            ->editColumn('user_uuid', function ($user) {
                return $user->uuid;
            })
            ->editColumn('name', function ($user) {
                
                return $user->name;
            })
            ->editColumn('gender', function ($user) {
                return $user->gender();
            })
            ->editColumn('birthdate', function ($user) {
                return $user->birthdate();
            })
            ->editColumn('login_id', function ($user) {
                return $user->login->email;
            })
            ->addColumn('action', function ($user) {
                $routeDestroy = "'" . route('user.destroy', $user->uuid) . "'";
                $route_edit =  '<a href="'. route('user.edit', $user->uuid) .'" class="badge bg-gradient-secondary"><i class="fas fa-edit"></i></a>';
                
                $route_delete = '<a href="javascript:void(0)" class="badge bg-gradient-danger" onclick="deleteItem('. $routeDestroy .')"><i class="fas fa-trash"></i></a>';
                return $route_edit . '&nbsp' . $route_delete;
            })
        
            ->rawColumns(['user_uuid','name','gender','birthdate','login_id','action'])
            ->make();
        }
        $name_page = [
            'name' => 'User Index',
            'total' => 'User',
            'route' => 'user.index'
        ];
        $p = permission();
        return view('admin.user.index',compact('name_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $this->authorize('create', UserModel::class);

        $name_page = [
            'name' => 'User Create',
            'total' => 'User',
            'route' => 'user.index'
        ];
        $groups = GroupModel::get()->all();
        return view('admin.user.create',compact('name_page','groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        
        try {
            
            $dentistInformation = $request->only(['avatar','description']);
            $login = LoginModel::create($request->only('email','password','phone_number','activated'));
            if(!empty($login)){
                $request->merge([
                    'login_id' => $login->id,
                    'uuid' => (string)Str::uuid()
                ]);
                $array_user = [
                    'uuid' => (string)Str::uuid(),
                    'name' => $request->name,
                    'gender' => $request->gender,
                    'birthdate' => $request->birthdate,
                    'login_id' => $login->id,
                ];
                $user = UserModel::create($array_user);
                $dentistInformation['dentist_uuid'] = $user->uuid;
                if(!empty($user)){
                    $role = GroupUserModel::create([
                        'user_uuid' => $user->uuid,
                        'group_id' => $request->role
                    ]);
                    if(!empty($role)){
                        if($request->hasFile('avatar')){
                            $avatar = $request->avatar;
                            $nameAvatar = $avatar->getClientOriginalName();
                            $dirFolder = 'img/admin/dentist/';
                            $newAvatar = $dirFolder . 'dentist' . '-' . (string)Str::uuid() .  '-' . $nameAvatar;
                            $dentistInformation['avatar'] = $newAvatar;
                            
                            @unlink($newAvatar);
                            $dentist = InforDentistModel::create($dentistInformation);
                            if(!empty($dentist)){
                                if(!empty($avatar)){
                                    $avatar->move($dirFolder, $newAvatar);
                                    
                                }
                            }
                        }
                        return redirect()->route('user.index')->with('success' , 'Created user successfully');
                        
                    }
                    
                }
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserModel $userModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserModel $userModel)
    {
        $this->authorize('update', $userModel);
        $group_user = GroupUserModel::where('user_uuid',$userModel->uuid)->value('group_id');
        
        $groups = GroupModel::all();
        $name_page = [
            'name' => 'User Update',
            'total' => 'User',
            'route' => 'user.index'
        ];
        //dd($groups);
        
        $arr= [
            0 => 'dentist',
            1 => 'doctor',
        ];
        if(in_array($userModel->group_user->all(),$arr)){
            
            $dentistInformation = InforDentistModel::where('dentist_uuid',$userModel->uuid)->get();
        }
        else{
            
            $dentistInformation[0] = '';
        }
        return view('admin.user.update',compact('userModel','group_user','groups','name_page','dentistInformation'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, UserModel $userModel)
    {
        try {
            $login = $userModel->login->update($request->only('email','phone_number','activated'));
            if(!empty($login)){
                $array_user = [
                    'uuid' => $userModel->uuid,
                    'name' => $request->name,
                    'gender' => $request->gender,
                    'birthdate' => $request->birthdate,
                    'login_id' => $userModel->login_id,
                ];
                $user = $userModel->update($array_user);
                if(!empty($user)){
                    $role = GroupUserModel::where('user_uuid',$userModel->uuid)->update([
                        'user_uuid' => $userModel->uuid,
                        'group_id' => $request->role
                    ]);
                    if(!empty($role)){
                        return redirect()->route('user.index')->with('success' , 'Updated user successfully');
                    }
                }
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserModel $userModel)
    {
        try {
            $this->authorize('delete', $userModel);
            $dentist = InforDentistModel::where('dentist_uuid',$userModel->uuid)->get()->all();
            if(!empty($dentist)){
                $dentist = InforDentistModel::where('dentist_uuid',$userModel->uuid)->delete();
            }
            $group_user = GroupUserModel::where('user_uuid',$userModel->uuid)->delete();
            if($userModel->delete()){
                $login = LoginModel::where('id',$userModel->login_id)->delete();
                return 1;
            }
            else{
                return 0;
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        

    }
}
