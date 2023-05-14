<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\GroupRequest\StoreRequest;
use App\Http\Requests\AdminRequest\GroupRequest\UpdateRequest;
use App\Models\AdminModel\GroupModel;
use App\Models\AdminModel\GroupUserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny',GroupModel::class);
        $name_page = [
            'name' => 'Group Index',
            'total' => 'Group',
            'route' => 'group.index'
        ];
        if($request->ajax()){
            $groups = GroupModel::get();
            //dd($groups);
            return DataTables::of($groups)
            ->editColumn('id', function ($group) {
                return $group->id;
            })
            ->editColumn('name', function ($group) {
                
                return $group->name;
            })
            ->editColumn('slug', function ($group) {
                return $group->slug;
            })
            ->addColumn('action', function ($group) {
                $routeDestroy = "'" . route('group.destroy', $group->slug) . "'";
                $route_edit =  '<a href="'. route('group.edit', $group->slug) .'" class="badge bg-gradient-secondary"><i class="fas fa-edit"></i></a>';
                
                $route_delete = '<a href="javascript:void(0)" class="badge bg-gradient-danger" onclick="deleteItem('. $routeDestroy .')"><i class="fas fa-trash"></i></a>';
                return $route_edit . '&nbsp' . $route_delete;
            })
        
            ->rawColumns(['id','name','slug','action'])
            ->make();
        }
        return view('admin.group.index',compact('name_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', GroupModel::class);
        $name_page = [
            'name' => 'Group Create',
            'total' => 'Group',
            'route' => 'group.index'
        ];
        return view('admin.group.create',compact('name_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {   
        try {
            $group = GroupModel::create($request->all());
            if(!empty($group)){
                return redirect()->route('group.index')->with('success','Created group successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        //dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(GroupModel $groupModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GroupModel $groupModel)
    {
        //dd($groupModel);
        $this->authorize('update', $groupModel);
        $name_page = [
            'name' => 'Group Update',
            'total' => 'Group',
            'route' => 'group.index'
        ];
        return view('admin.group.update',compact('groupModel','name_page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, GroupModel $groupModel)
    {
        try {
            $group = $groupModel->update($request->all());
            if(!empty($group)){
                return redirect()->route('group.index')->with('success','Updated group successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        //dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupModel $groupModel)
    {
        $this->authorize('delete', $groupModel);
        try {
            $group_user =GroupUserModel::where('group_id',$groupModel->id);
            if($group_user->get()->all() !== []){
                //dd($group_user);
                $group_user->delete();  
            }
            $group = $groupModel->delete();
            if(!empty($group)){
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
