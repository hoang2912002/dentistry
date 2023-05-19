<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\ServiceModel;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
    public function serviceDetail(ServiceModel $serviceDetailModel)
    {
        $services = ServiceModel::all();
        return view('customer.service.serviceDetail',compact('serviceDetailModel','services'));
    }
}
