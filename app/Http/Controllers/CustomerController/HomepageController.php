<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\GroupModel;
use App\Models\AdminModel\GroupUserModel;
use App\Models\AdminModel\InforDentistModel;
use App\Models\AdminModel\ServiceModel;
use App\Models\AdminModel\UserModel;
use App\Models\CustomerModel\HomepageModel;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $group = GroupModel::where('slug','dentist')->value('id');
        $groupUsers = GroupUserModel::where('group_id',$group)->get();

        //dd($groupUser);
        // foreach($groupUser as $a){
        //     dd($a->user);
        // }
        // $staffs = UserModel::where();
        $services = ServiceModel::all();
        $dentists = InforDentistModel::all();
        foreach($dentists as $dentist){
            $arr[$dentist->dentist_uuid] = $dentist->avatar; 
        }
        return view('customer.homepage.homepage',compact('services','groupUsers','arr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = ServiceModel::all();
        return view('customer.homepage.create',compact('services'));
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
    public function show(HomepageModel $homepageModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomepageModel $homepageModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomepageModel $homepageModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomepageModel $homepageModel)
    {
        //
    }
}
