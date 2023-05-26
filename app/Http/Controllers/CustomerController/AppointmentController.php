<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest\AppointmentRequest\StoreRequest;
use App\Models\AdminModel\BookModel;
use App\Models\AdminModel\GroupModel;
use App\Models\AdminModel\GroupUserModel;
use App\Models\AdminModel\ServiceModel;
use App\Models\AdminModel\ShiftModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AppointmentController extends Controller
{
    public function index()
    {
        //dd(permission());
        $group = GroupModel::where('slug','doctor')->value('id');
        $groupUsers = GroupUserModel::where('group_id',$group)->get();
        $services = ServiceModel::all();
        $shifts = ShiftModel::all();
        return view('customer.appointment.index',compact('services','groupUsers','shifts'));
    }

    public function store(StoreRequest $request)
    {
        try {
            $date_appointment = Carbon::createFromFormat('d/m/Y',$request->date_appointment)->format('Y-m-d');
            $request['date_appointment'] = $date_appointment;
            //dd($request);
            
            $appointment = BookModel::create($request->all());
            if(!empty($appointment)){
                return redirect()->route('.index')->with('success','Đặt lịch hẹn thành công');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        //dd($request);
    }
}
