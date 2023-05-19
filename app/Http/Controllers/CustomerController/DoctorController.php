<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\UserModel;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function detail(UserModel $doctorModel)
    {
        dd($doctorModel);
    }
}
