<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\RoomRequest\StoreRequest;
use App\Http\Requests\AdminRequest\RoomRequest\UpdateRequest;
use App\Models\AdminModel\RoomModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny',RoomModel::class);
        $name_page = [
            'name' => 'Room Index',
            'total' => 'Room',
            'route' => 'room.index'
        ];
        if($request->ajax()){
            $rooms = RoomModel::get();
            return DataTables::of($rooms)
            ->editColumn('id', function ($room) {
                return $room->id;
            })
            ->editColumn('name', function ($room) {
                
                return $room->name;
            })
            ->editColumn('slug', function ($room) {
                return $room->slug;
            })
            ->addColumn('action', function ($room) {
                $routeDestroy = "'" . route('room.destroy', $room->slug) . "'";
                $route_edit =  '<a href="'. route('room.edit', $room->slug) .'" class="badge bg-gradient-secondary"><i class="fas fa-edit"></i></a>';
                
                $route_delete = '<a href="javascript:void(0)" class="badge bg-gradient-danger" onclick="deleteItem('. $routeDestroy .')"><i class="fas fa-trash"></i></a>';
                return $route_edit . '&nbsp' . $route_delete;
            })
        
            ->rawColumns(['id','name','slug','action'])
            ->make();
        }
        return view('admin.room.index',compact('name_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',RoomModel::class);
        $name_page = [
            'name' => 'Room Create',
            'total' => 'Room',
            'route' => 'room.index'
        ];
        return view('admin.room.create',compact('name_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $room = RoomModel::create($request->all());
            if(!empty($room)){
                return redirect()->route('room.index')->with('success','Created room successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomModel $roomModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomModel $roomModel)
    {
        $this->authorize('update', $roomModel);
        $name_page = [
            'name' => 'Room Update',
            'total' => 'Room',
            'route' => 'room.index'
        ];
        return view('admin.room.update',compact('name_page','roomModel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, RoomModel $roomModel)
    {
        try {
            $room = $roomModel->update($request->all());
            if(!empty($room)){
                return redirect()->route('room.index')->with('success','Updated room successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomModel $roomModel)
    {
        try {
            $this->authorize('delete', $roomModel);
            if(!empty($roomModel->delete())){
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
