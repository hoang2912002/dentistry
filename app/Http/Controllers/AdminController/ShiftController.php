<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\ShiftRequest\StoreRequest;
use App\Http\Requests\AdminRequest\ShiftRequest\UpdateRequest;
use App\Models\AdminModel\ShiftModel;
use App\Models\AdminModel\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', ShiftModel::class);
        $name_page = [
            'name' => 'Shift Index',
            'total' => 'Shift',
            'route' => 'shift.index'
        ];
        if($request->ajax()){
            $shifts = ShiftModel::get();
            return DataTables::of($shifts)
            ->editColumn('id', function ($shift) {
                return $shift->id;
            })
            ->editColumn('name', function ($shift) {
                
                return $shift->name;
            })
            ->editColumn('slug', function ($shift) {
                return $shift->slug;
            })
            ->addColumn('action', function ($shift) {
                $routeDestroy = "'" . route('shift.destroy', $shift->slug) . "'";
                $route_edit =  '<a href="'. route('shift.edit', $shift->slug) .'" class="badge bg-gradient-secondary"><i class="fas fa-edit"></i></a>';
                
                $route_delete = '<a href="javascript:void(0)" class="badge bg-gradient-danger" onclick="deleteItem('. $routeDestroy .')"><i class="fas fa-trash"></i></a>';
                return $route_edit . '&nbsp' . $route_delete;
            })
        
            ->rawColumns(['id','name','slug','action'])
            ->make();
        }
        return view('admin.shift.index',compact('name_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', ShiftModel::class);
        $name_page = [
            'name' => 'Shift Create',
            'total' => 'Shift',
            'route' => 'shift.create'
        ];
        return view('admin.shift.create',compact('name_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $shift = ShiftModel::create($request->all());
            if(!empty($shift)){
                return redirect()->route('shift.index')->with('success','Created shift successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ShiftModel $shiftModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShiftModel $shiftModel)
    {
        $this->authorize('update', $shiftModel);
        $name_page = [
            'name' => 'Shift Update',
            'total' => 'Shift',
            'route' => 'shift.index'
        ];
        return view('admin.shift.update',compact('name_page','shiftModel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, ShiftModel $shiftModel)
    {
        try {
            $shift = $shiftModel->update($request->all());
            if(!empty($shift)){
                return redirect()->route('shift.index')->with('success','Updated shift successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShiftModel $shiftModel)
    {
        try {
            $this->authorize('delete', $shiftModel);
            if(!empty($shiftModel->delete())){
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
