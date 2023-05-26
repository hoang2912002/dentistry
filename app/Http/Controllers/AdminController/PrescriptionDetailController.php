<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\PrescriptionDetailModel;
use App\Models\AdminModel\PrescriptionModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PrescriptionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,PrescriptionModel $prescriptionModel)
    {
        //dd($prescriptionModel->id);
        if($request->ajax()){
            $prescriptiondetails = PrescriptionDetailModel::where('prescription_id', $prescriptionModel->id)->get();
            //dd($prescriptiondetails);
            
            return DataTables::of($prescriptiondetails)
            ->editColumn('id', function ($prescriptiondetail) {
                return $prescriptiondetail->id;
            })
            ->editColumn('medicine_id', function ($prescriptiondetail) {
                return $prescriptiondetail->medicine->name;
            })
            ->editColumn('shift_id', function ($prescriptiondetail) {
                
                return '<p class="text-dark px-3 mb-0 font-weight-bold">'.$prescriptiondetail->shift_name().'</span>';
            })
            ->editColumn('quantity', function ($prescriptiondetail) {
                return $prescriptiondetail->quantity;
            })
            ->editColumn('amount_of_time', function ($prescriptiondetail) {
                return $prescriptiondetail->amount_of_time();
            })
            ->editColumn('price', function ($prescriptiondetail) {
                return $prescriptiondetail->price();
            })
            ->rawColumns(['medicine_id','shift_id','quantity','amount_of_time','id','price'])
            ->make();
        }
        $name_page = [
            'name' => 'Prescription Detail Index',
            'total' => 'Prescription',
            'route' => 'prescription.index'
        ];
        return view('admin.prescriptiondetail.index',compact('name_page','prescriptionModel'));
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
    public function show(PrescriptionDetailModel $prescriptionDetailModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrescriptionDetailModel $prescriptionDetailModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrescriptionDetailModel $prescriptionDetailModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrescriptionDetailModel $prescriptionDetailModel)
    {
        //
    }
}
