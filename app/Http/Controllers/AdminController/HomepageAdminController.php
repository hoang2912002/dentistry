<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageAdminController extends Controller
{
    public function index()
    {
        $name_page = [
            'name' => 'HomePage',
            'total' => 'Dashboard',
            'route' => 'homepage.index'
        ];
        return view('admin.homepage',compact('name_page'));
    }
}
