<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\PrescriptionModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $prescriptions = PrescriptionModel::get();
            //dd($prescriptions);
            return DataTables::of($prescriptions)
            ->editColumn('prescription_id', function ($prescription) {
                return $prescription->id;
            })
            ->editColumn('user_uuid', function ($prescription) {
                return $prescription->user_uuid();
            })
            ->editColumn('user_name', function ($prescription) {
                
                return '<p class="text-dark px-3 mb-0 font-weight-bold">'.$prescription->user->name.'</span>';
            })
            ->editColumn('total_quantity', function ($prescription) {
                return $prescription->quantity();
            })
            ->editColumn('total_price', function ($prescription) {
                return $prescription->price();
            })
            ->addColumn('action', function ($prescription) {
                $routeDestroy = "'" . route('prescription.destroy', $prescription->id) . "'";
                $route_edit =  '<a href="'. route('prescription.edit', $prescription->id) .'" class="badge bg-gradient-secondary" title="Edit"><i class="fas fa-edit"></i></a>';
                $route_delete = '<a href="javascript:void(0)" class="badge bg-gradient-danger" onclick="deleteItem('. $routeDestroy .')" title="Delete"><i class="fas fa-trash"></i></a>';
                $route_bill = '<a href="'. route('prescription.edit', $prescription->id) .'" class="badge bg-gradient-info" title="Detail"><i class="fas fa-solid fa-calendar-week"></i></a>';
                return $route_edit . '&nbsp' . $route_bill . '&nbsp' . $route_delete;
            })
        
            ->rawColumns(['prescription_id','user_uuid','user_name','total_quantity','total_price','action'])
            ->make();
        }
        $name_page = [
            'name' => 'Prescription Index',
            'total' => 'Prescription',
            'route' => 'prescription.index'
        ];
        return view('admin.prescription.index',compact('name_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PrescriptionModel $prescriptionModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrescriptionModel $prescriptionModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrescriptionModel $prescriptionModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrescriptionModel $prescriptionModel)
    {
        //
    }
}
