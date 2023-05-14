<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\ManufacturerRequest\StoreRequest;
use App\Http\Requests\AdminRequest\ManufacturerRequest\UpdateRequest;
use App\Models\AdminModel\ManufacturerModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name_page = [
            'name' => 'Manufacturer Index',
            'total' => 'Manufacturer',
            'route' => 'manufacturer.index'
        ];
        if($request->ajax()){
            $manufactureres = ManufacturerModel::get();
            return DataTables::of($manufactureres)
            ->editColumn('id', function ($manufacturer) {
                return $manufacturer->id;
            })
            ->editColumn('name', function ($manufacturer) {
                
                return $manufacturer->name;
            })
            ->editColumn('slug', function ($manufacturer) {
                return $manufacturer->slug;
            })
            ->editColumn('address', function ($manufacturer) {
                return $manufacturer->address;
            })
            ->editColumn('email', function ($manufacturer) {
                return $manufacturer->email;
            })
            ->editColumn('phone_number', function ($manufacturer) {
                return $manufacturer->phone_number;
            })
            ->addColumn('action', function ($manufacturer) {
                $routeDestroy = "'" . route('manufacturer.destroy', $manufacturer->slug) . "'";
                $route_edit =  '<a href="'. route('manufacturer.edit', $manufacturer->slug) .'" class="badge bg-gradient-secondary"><i class="fas fa-edit"></i></a>';
                
                $route_delete = '<a href="javascript:void(0)" class="badge bg-gradient-danger" onclick="deleteItem('. $routeDestroy .')"><i class="fas fa-trash"></i></a>';
                return $route_edit . '&nbsp' . $route_delete;
            })
        
            ->rawColumns(['id','name','slug', 'address', 'email', 'phone_number','action'])
            ->make();
        }
        return view('admin.manufacturer.index',compact('name_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name_page = [
            'name' => 'Manufacturer Create',
            'total' => 'Manufacturer',
            'route' => 'manufacturer.index'
        ];
        return view('admin.manufacturer.create',compact('name_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $manufacturer = ManufacturerModel::create($request->all());
            if(!empty($manufacturer)){
                return redirect()->route('manufacturer.index')->with('success','Created manufacturer successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ManufacturerModel $manufacturerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManufacturerModel $manufacturerModel)
    {
        $name_page = [
            'name' => 'Manufacturer Update',
            'total' => 'Manufacturer',
            'route' => 'manufacturer.index'
        ];
        return view('admin.manufacturer.update',compact('name_page','manufacturerModel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, ManufacturerModel $manufacturerModel)
    {
        try {
            $room = $manufacturerModel->update($request->all());
            if(!empty($room)){
                return redirect()->route('manufacturer.index')->with('success','Updated manufacturer successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ManufacturerModel $manufacturerModel)
    {
        try {
            //$this->authorize('delete', $manufacturerModel);
            if(!empty($manufacturerModel->delete())){
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
