<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\ServiceRequest\StoreRequest;
use App\Http\Requests\AdminRequest\ServiceRequest\UpdateRequest;
use App\Models\AdminModel\ServiceModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$this->authorize('viewAny',serviceModel::class);
        $name_page = [
            'name' => 'Service Index',
            'total' => 'Service',
            'route' => 'service.index'
        ];
        if($request->ajax()){
            $services = ServiceModel::get();
            return DataTables::of($services)
            ->editColumn('id', function ($service) {
                return $service->id;
            })
            ->editColumn('name', function ($service) {
                
                return $service->name;
            })
            ->editColumn('slug', function ($service) {
                return $service->slug;
            })
            ->addColumn('action', function ($service) {
                $routeDestroy = "'" . route('service.destroy', $service->slug) . "'";
                $route_edit =  '<a href="'. route('service.edit', $service->slug) .'" class="badge bg-gradient-secondary"><i class="fas fa-edit"></i></a>';
                
                $route_delete = '<a href="javascript:void(0)" class="badge bg-gradient-danger" onclick="deleteItem('. $routeDestroy .')"><i class="fas fa-trash"></i></a>';
                return $route_edit . '&nbsp' . $route_delete;
            })
        
            ->rawColumns(['id','name','slug','action'])
            ->make();
        }
        return view('admin.service.index',compact('name_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name_page = [
            'name' => 'Service Create',
            'total' => 'Service',
            'route' => 'service.index'
        ];
        return view('admin.service.create',compact('name_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //dd($request);
        try {
            $price = explode('VNĐ',$request->price);
            $price = explode(',' , $price[0]);
            $price = implode('',$price);
            $request['price'] = $price;
            $service = ServiceModel::create($request->all());
            if(!empty($service)){
                return redirect()->route('service.index')->with('success','Created service successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceController $serviceController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceModel $serviceModel)
    {
        $name_page = [
            'name' => 'Service Update',
            'total' => 'Service',
            'route' => 'service.index'
        ];
        return view('admin.service.update',compact('name_page','serviceModel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, ServiceModel $serviceModel)
    {
        $price = explode('VNĐ',$request->price);
        $price = explode(',' , $price[0]);
        $price = implode('',$price);
        $request['price'] = $price;
        try {
            $service = $serviceModel->update($request->all());
            if(!empty($service)){
                return redirect()->route('service.index')->with('success','Updated service successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceModel $serviceModel)
    {
        try {
            //$this->authorize('delete', $serviceModel);
            if(!empty($serviceModel->delete())){
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
