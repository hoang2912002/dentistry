<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\TypeOfMedicineRequest\StoreRequest;
use App\Http\Requests\AdminRequest\TypeOfMedicineRequest\UpdateRequest;
use App\Models\AdminModel\TypeOfMedicineModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TypeOfMedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name_page = [
            'name' => 'Type of medicine Index',
            'total' => 'Type of medicine',
            'route' => 'typeOfMedicine.index'
        ];
        if($request->ajax()){
            $types = TypeOfMedicineModel::get();
            return DataTables::of($types)
            ->editColumn('id', function ($typeOfMedicine) {
                return $typeOfMedicine->id;
            })
            ->editColumn('name', function ($typeOfMedicine) {
                
                return $typeOfMedicine->name;
            })
            ->editColumn('slug', function ($typeOfMedicine) {
                return $typeOfMedicine->slug;
            })
            ->addColumn('action', function ($typeOfMedicine) {
                $routeDestroy = "'" . route('typeOfMedicine.destroy', $typeOfMedicine->slug) . "'";
                $route_edit =  '<a href="'. route('typeOfMedicine.edit', $typeOfMedicine->slug) .'" class="badge bg-gradient-secondary"><i class="fas fa-edit"></i></a>';
                
                $route_delete = '<a href="javascript:void(0)" class="badge bg-gradient-danger" onclick="deleteItem('. $routeDestroy .')"><i class="fas fa-trash"></i></a>';
                return $route_edit . '&nbsp' . $route_delete;
            })
        
            ->rawColumns(['id','name','slug','action'])
            ->make();
        }
        return view('admin.type_of_medicine.index',compact('name_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name_page = [
            'name' => 'Type of medicine Create',
            'total' => 'Type of medicine',
            'route' => 'typeOfMedicine.index'
        ];
        return view('admin.type_of_medicine.create',compact('name_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $typeOfMedicine = TypeOfMedicineModel::create($request->all());
            if(!empty($typeOfMedicine)){
                return redirect()->route('typeOfMedicine.index')->with('success','Created type successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeOfMedicineModel $typeOfMedicineModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeOfMedicineModel $typeOfMedicineModel)
    {
        $name_page = [
            'name' => 'Type of medicine Update',
            'total' => 'Type of medicine',
            'route' => 'typeOfMedicine.index'
        ];
        return view('admin.type_of_medicine.update',compact('name_page','typeOfMedicineModel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, TypeOfMedicineModel $typeOfMedicineModel)
    {
        try {
            $typeOfMedicine = $typeOfMedicineModel->update($request->all());
            if(!empty($typeOfMedicine)){
                return redirect()->route('typeOfMedicine.index')->with('success','Updated type successfully!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeOfMedicineModel $typeOfMedicineModel)
    {
        try {
            //$this->authorize('delete', $typeOfMedicineModel);
            if(!empty($typeOfMedicineModel->delete())){
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
