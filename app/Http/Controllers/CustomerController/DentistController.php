<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\GroupModel;
use App\Models\AdminModel\GroupUserModel;
use App\Models\AdminModel\InforDentistModel;
use App\Models\AdminModel\ServiceModel;
use App\Models\AdminModel\ShiftModel;
use App\Models\AdminModel\UserModel;
use Illuminate\Http\Request;

class DentistController extends Controller
{
    public function dentist()  {
        $group = GroupModel::where('slug','dentist')->value('id');
        $groupUsers = GroupUserModel::where('group_id',$group)->get();
        $services = ServiceModel::all();
        $dentists = InforDentistModel::all();
        foreach($dentists as $dentist){
            $arr[$dentist->dentist_uuid] = $dentist->avatar; 
        }
        return view('customer.dentist.dentist',compact('services','arr','groupUsers'));
    }

    public function  dentistDetail (UserModel $dentistDetailModel) {
        $group = GroupModel::where('slug','dentist')->value('id');
        $groupUsers = GroupUserModel::where('group_id',$group)->get();
        $services = ServiceModel::all();
        $dentists = InforDentistModel::where('dentist_uuid', $dentistDetailModel->uuid)->get();
        $shifts = ShiftModel::all();
        foreach($dentists as $dentist){
            $dentistDetailModel['avatar'] =  $dentist->avatar;
            $dentistDetailModel['description'] = $dentist->description;
            
        }
        //dd($dentistDetailModel->login);
        return view('customer.dentist.dentistDetail',compact('dentistDetailModel','services','groupUsers','shifts'));
    }
}
