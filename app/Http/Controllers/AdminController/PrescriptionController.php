<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\MedicineModel;
use App\Models\AdminModel\PrescriptionDetailModel;
use App\Models\AdminModel\PrescriptionModel;
use App\Models\AdminModel\ShiftModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                $route_detail = '<a href="'. route('prescriptiondetail.index', $prescription->id) .'" class="badge bg-gradient-info" title="Detail"><i class="fas fa-solid fa-calendar-week"></i></a>';
                return $route_edit . '&nbsp' . $route_detail . '&nbsp' . $route_delete;
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
        $shifts = ShiftModel::all();
        $medicines = MedicineModel::all();
        $name_page = [
            'name' => 'Prescription Create',
            'total' => 'Prescription',
            'route' => 'prescription.create'
        ];
        return view("admin.prescription.create",compact('name_page','medicines','shifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request['user_uuid'] = Auth::user()->User->uuid ;
            $price = explode('VNĐ',$request->total_price);
            $price = explode('.' , $price[0]);
            $price = implode('',$price);
            $request['total_price'] = $price;
            //dd($request->total_quantity/(array_key_last($request->medicine)+1));
            $prescription = PrescriptionModel::create($request->only('total_quantity','user_uuid','total_price','activated'));
            if(!empty($prescription)){
                //dd($prescription->id);
                foreach($request->medicine as $medicine){
                    foreach($request->shift_id as $shift){
                        $price = MedicineModel::where('id',$medicine)->value('price');
                        $arrPrescriptionDetail[] = [
                            'prescription_id' => $prescription->id,
                            'medicine_id' => $medicine,
                            'shift_id' => $shift,
                            'price' => $price,
                            'quantity' => $request->total_quantity/(array_key_last($request->medicine)+1),
                            'amount_of_time' => 1,
                            'created_at' =>Carbon::now(),
                            'updated_at' =>Carbon::now(),
                        ];
                    }
                }
                //dd($arrPrescriptionDetail);
                // foreach($arrPrescriptionDetail as $prescriptionDetail){
                    
                // }
                $prescriptionDetail = new PrescriptionDetailModel();
                $prescriptionDetail->insert($arrPrescriptionDetail);
                if(!empty($prescriptionDetail)){
                    return redirect()->route('prescription.index')->with('success','Created prescription successfully!');
                }
                
                //$prescriptionDetail = 
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function api(Request $request)
    {
        //dd($request->medicine);
        if(!empty($request->medicine)){
            foreach($request->medicine as $medicine){
                $price = MedicineModel::where('id',$medicine)->value('price');
                $arr[] = $price;
            }
            $price = json_encode(array_sum($arr));
        }
        else{
            $price = 0;
        }
        return response()->json($price);
        
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
