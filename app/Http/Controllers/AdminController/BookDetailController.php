<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\BookDetailModel;
use App\Models\AdminModel\BookModel;
use Illuminate\Http\Request;

class BookDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BookModel $bookModel)
    {
        //dd($bookModel);
        $name_page = [
            'name' => 'Book Detail',
            'total' => 'Book',
            'route' => 'book.index'
        ];
        return view('admin.bookdetail.index',compact('name_page','bookModel'));
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
   
}
