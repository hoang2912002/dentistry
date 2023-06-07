<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\BookRequest\StoreRequest;
use App\Models\AdminModel\BookModel;
use App\Models\AdminModel\GroupModel;
use App\Models\AdminModel\GroupUserModel;
use App\Models\AdminModel\ShiftModel;
use App\Models\AdminModel\UserModel;
//use App\Models\AdminModel\bookModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $books = BookModel::get();
            //dd($books);
            return DataTables::of($books)
            ->editColumn('book_id', function ($book) {
                return $book->id;
            })
            ->editColumn('name', function ($book) {
                
                return $book->book_name();
            })
            ->editColumn('date_appointment', function ($book) {
                return $book->date_appointment();
            })
            ->editColumn('shift_id', function ($book) {
                return '<p class="text-secondary font-weight-bold text-xs mt-1 mb-0">'. $book->shift() . '</p>';
            })
            ->addColumn('action', function ($book) {
                $routeDestroy = "'" . route('book.destroy', $book->id) . "'";
                $route_edit =  '<a href="'. route('book.edit', $book->id) .'" class="badge bg-gradient-secondary"><i class="fas fa-edit"></i></a>';
                $route_delete = '<a href="javascript:void(0)" class="badge bg-gradient-danger" onclick="deleteItem('. $routeDestroy .')"><i class="fas fa-trash"></i></a>';
                $route_bill = '<a href="'. route('bookdetail.index',$book->id) .'" class="badge bg-gradient-info"><i class="fas fa-solid fa-file-invoice"></i></a>';
                return $route_edit . '&nbsp' . $route_bill . '&nbsp' . $route_delete;
            })
        
            ->rawColumns(['book_id','name','date_appointment','shift_id','action'])
            ->make();
        }
        $name_page = [
            'name' => 'Book Index',
            'total' => 'Book',
            'route' => 'book.index'
        ];
        return view('admin.book.index',compact('name_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name_page = [
            'name' => 'Book Create',
            'total' => 'Book',
            'route' => 'book.index'
        ];
        $users = UserModel::get();
        $groups = GroupModel::where('slug','doctor')->value('id');
        $doctors = GroupUserModel::where('group_id',$groups)->get();
        $shifts = ShiftModel::all();
        //dd($dotors[0]->user);
        return view('admin.book.create',compact('name_page','users','doctors','shifts'));
    }

    public function api(Request $request)
    {
        $arrUser = [];
        if(!empty($request->user)){
            $userObject = UserModel::where('uuid',$request->user)->get()->all();
            foreach($userObject as $userData){
                $arrUser = [
                    'uuid' => $userData->uuid,
                    'name' => $userData->name,
                    'email'=> $userData->login->email,
                    'phone_number'=> $userData->login->phone_number,
                ];
            }
            $arrUser = json_encode($arrUser);
            return response()->json($arrUser); 
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd(($request->except('choices_user')));
        try {
            if(!empty($request->choices_user)){
                $book = BookModel::create($request->except('choices_user'));
            }
            else{
                //dd($request);
                $array_user = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'date_appointment' => $request->date_appointment,
                    'shift_id' => $request->shift_id,
                    'doctor_uuid' => $request->doctor_uuid,
                    'note' => $request->note,
                ];
                $book = BookModel::create($array_user);
            }
            if(!empty($book)){
                return redirect()->route('book.index')->with('success' , 'Created book successfully');
            }
            
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BookModel $bookModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookModel $bookModel)
    {
        $name_page = [
            'name' => 'Book Update',
            'total' => 'Book',
            'route' => 'book.index'
        ];
        //dd($bookModel);
        $users = UserModel::get();
        $groups = GroupModel::where('slug','doctor')->value('id');
        $doctors = GroupUserModel::where('group_id',$groups)->get();
        $shifts = ShiftModel::all();
        //dd($doctors[0]->user);
        return view('admin.book.update',compact('name_page','users','doctors','shifts','bookModel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookModel $bookModel)
    {
        try {
            $book = $bookModel->update($request->all());
            if(!empty($book)){
                return redirect()->route('book.index')->with('success' , 'Updated book successfully');
            }
            
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookModel $bookModel)
    {
        try {
            //$this->authorize('delete', $bookModel);
            if($bookModel->delete()){
                return 1;
            }
            else{
                return 0;
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
