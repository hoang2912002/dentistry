<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\ServiceModel;
use App\Models\AdminModel\ServiceSkuModel;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
    public function serviceDetail(ServiceModel $serviceDetailModel)
    {
        $services = ServiceModel::all();
        $services_sku = ServiceSkuModel::where('service_id',$serviceDetailModel->id)->get();
        return view('customer.service.serviceDetail',compact('serviceDetailModel','services','services_sku'));
    }
    public function service(ServiceModel $serviceModel)
    {
        $services = ServiceModel::all();
        return view('customer.service.service',compact('serviceModel','services'));
    }
}
