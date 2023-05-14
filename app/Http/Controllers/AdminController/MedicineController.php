<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\MedicineRequest\StoreRequest;
use App\Http\Requests\AdminRequest\MedicineRequest\UpdateRequest;
use App\Models\AdminModel\ManufacturerModel;
use App\Models\AdminModel\MedicineModel;
use App\Models\AdminModel\TypeOfMedicineModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name_page = [
            'name' => 'Medicine Index',
            'total' => 'Medicine',
            'route' => 'medicine.index'
        ];
        if($request->ajax()){
            $medicines = MedicineModel::get();
            return DataTables::of($medicines)
            ->editColumn('id', function ($medicine) {
                return $medicine->id;
            })
            ->editColumn('name', function ($medicine) {
                
                return $medicine->name;
            })
            ->editColumn('slug', function ($medicine) {
                return $medicine->slug;
            })
            ->editColumn('quantity', function ($medicine) {
                return $medicine->quantity();
            })
            ->editColumn('root', function ($medicine) {
                return $medicine->root;
            })
            ->editColumn('price', function ($medicine) {
                return $medicine->price();
            })
            ->editColumn('type_of_medicine_name', function ($medicine) {
                return $medicine->type_of_medicine->name;
            })
            ->editColumn('manufacturer_name', function ($medicine) {
                return $medicine->manufacturer->name;
            })
            ->addColumn('action', function ($medicine) {
                $routeDestroy = "'" . route('medicine.destroy', $medicine->slug) . "'";
                $route_edit =  '<a href="'. route('medicine.edit', $medicine->slug) .'" class="badge bg-gradient-secondary"><i class="fas fa-edit"></i></a>';
                
                $route_delete = '<a href="javascript:void(0)" class="badge bg-gradient-danger" onclick="deleteItem('. $routeDestroy .')"><i class="fas fa-trash"></i></a>';
                return $route_edit . '&nbsp' . $route_delete;
            })
        
            ->rawColumns(['id','name','slug','quantity','root','price','type_of_medicine_name','manufacturer_name','action'])
            ->make();
        }
        return view('admin.medicine.index',compact('name_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name_page = [
            'name' => 'Medicine Create',
            'total' => 'Medicine',
            'route' => 'medicine.index'
        ];
        $manufacturer = ManufacturerModel::get();
        $type = TypeOfMedicineModel::get();
        return view('admin.medicine.create',compact('name_page','manufacturer','type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $price = explode('VNĐ',$request->price);
            $price = explode(',' , $price[0]);
            $price = implode('',$price);
            $request['price'] = $price;
            $medicine = MedicineModel::create($request->all());
            if(!empty($medicine)){
                return redirect()->route('medicine.index')->with('success','Created medicine successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicineModel $medicineModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicineModel $medicineModel)
    {
        $manufacturer = ManufacturerModel::get();
        $type = TypeOfMedicineModel::get();
        $name_page = [
            'name' => 'Medicine Update',
            'total' => 'Medicine',
            'route' => 'medicine.index'
        ];
        return view('admin.medicine.update',compact('name_page','medicineModel','manufacturer','type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, MedicineModel $medicineModel)
    {
        try {
            $price = explode('VNĐ',$request->price);
            $price = explode(',' , $price[0]);
            $price = implode('',$price);
            $request['price'] = $price;
            $medicine = $medicineModel->update($request->all());
            if(!empty($medicine)){
                return redirect()->route('medicine.index')->with('success','Updated medicine successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicineModel $medicineModel)
    {
        try {
            //$this->authorize('delete', $serviceModel);
            if(!empty($medicineModel->delete())){
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
