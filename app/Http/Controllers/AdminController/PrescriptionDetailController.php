<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\PrescriptionDetailModel;
use App\Models\AdminModel\PrescriptionModel;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\PDF;
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
    public function export_file_pdf(PrescriptionModel $prescriptionModel)
    {
        $prescriptiondetails = PrescriptionDetailModel::
            join("medicines","medicines.id","=","prescription_details.medicine_id")
            ->join("shifts","shifts.id","=","prescription_details.shift_id")
            ->select(['prescription_details.*','shifts.name','medicines.name as medicines_name'])
            ->where('prescription_id',$prescriptionModel->id)
            ->get()->groupBy('medicines_name')->all();

        // // foreach($prescriptiondetails as $k => $d){

        // //     dd($d[0]->amount_of_time);
        // // }
        // return view('admin.prescriptiondetail.export_file_pdf',compact('prescriptionModel','prescriptiondetails'));
        $pdf = FacadePdf::loadview('admin.prescriptiondetail.export_file_pdf',compact('prescriptionModel','prescriptiondetails'))->setPaper('A4');
        return $pdf->download('toa_thuoc.pdf');
    }
}
