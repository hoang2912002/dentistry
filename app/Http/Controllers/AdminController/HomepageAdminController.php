<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\BookModel;
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
        $books = BookModel::all();
        return view('admin.homepage',compact('name_page','books'));
    }
}
