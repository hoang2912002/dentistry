<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\ServiceRequest\StoreRequest;
use App\Http\Requests\AdminRequest\ServiceRequest\UpdateRequest;
use App\Models\AdminModel\ServiceModel;
use App\Models\AdminModel\ServiceSkuModel;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$this->authorize('viewAny',serviceModel::class);
        $name_page = [
            'name' => 'Service Index',
            'total' => 'Service',
            'route' => 'service.index'
        ];
        if($request->ajax()){
            $services = ServiceModel::get();
            return DataTables::of($services)
            ->editColumn('id', function ($service) {
                return $service->id;
            })
            ->editColumn('name', function ($service) {
                
                return $service->name;
            })
            ->editColumn('slug', function ($service) {
                return $service->slug;
            })
            ->addColumn('action', function ($service) {
                $routeDestroy = "'" . route('service.destroy', $service->slug) . "'";
                $route_edit =  '<a href="'. route('service.edit', $service->slug) .'" class="badge bg-gradient-secondary"><i class="fas fa-edit"></i></a>';
                
                $route_delete = '<a href="javascript:void(0)" class="badge bg-gradient-danger" onclick="deleteItem('. $routeDestroy .')"><i class="fas fa-trash"></i></a>';
                return $route_edit . '&nbsp' . $route_delete;
            })
        
            ->rawColumns(['id','name','slug','action'])
            ->make();
        }
        return view('admin.service.index',compact('name_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name_page = [
            'name' => 'Service Create',
            'total' => 'Service',
            'route' => 'service.index'
        ];
        return view('admin.service.create',compact('name_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $price = explode('VNĐ',$request->price);
            $price = explode(',' , $price[0]);
            $price = implode('',$price);
            $request['price'] = $price;
            $serviceData = $request->except(['thumbnail']);
            
            if($request->hasFile('logo')){
                $logo = $request->logo;
                $nameLogo = $logo->getClientOriginalName();
                $dirFolder = 'img/admin/service/';
                $newLogo = $dirFolder . 'service-logo' . '-' . $request->slug .  '-' . $nameLogo;
                $serviceData['logo'] = $newLogo;
                
                @unlink($newLogo);
            }
            else{
                $serviceData['logo'] = null;
            }
            $service = ServiceModel::create($serviceData);
            if(!empty($service)){
                if(!empty($logo)){
                    $logo->move($dirFolder, $newLogo);
                }
                if(!empty($request->thumbnail)){
                    $InformationService = ServiceModel::all()->last();
                    foreach($request->thumbnail as $key => $service_sku){
                        $nameService = $request->slug;
                        $nameServiceSku = $service_sku->getClientOriginalName();
                        $dirFolder = 'img/admin/service/';
                        $newSku = $dirFolder . 'service-sku' . '-' . $request->slug  . '-' . $nameServiceSku;
                        @unlink($newSku);
                        $service_sku->move($dirFolder, $newSku);
                        $arr[] = [
                            'service_id' =>$InformationService->id,
                            'service_sku' =>$newSku,
                            'created_at' =>Carbon::now(),
                            'updated_at' =>Carbon::now(),
                        ];
                    } 
                }
                else{
                    $InformationService = ServiceModel::all()->last();
                        $newServiceSku = null;
                        $arr[] = [
                            'service_id' =>$InformationService->id,
                            'service_sku' =>$newServiceSku,
                            'created_at' =>Carbon::now(),
                            'updated_at' =>Carbon::now(),
                        ];
                        
                }
                $service_Sku = new ServiceSkuModel();
                $service_Sku->insert($arr);
                //if(!empty($service_sku)){
                    return redirect()->route('service.index')->with('success','Updated service successfully!');
                //}
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceController $serviceController)
    {
        //
    }

    public function api(Request $request){
        //dd($request);

        return response()->json(json_encode($request));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function api_service_sku(Request $request){
        // $service_sku = ServiceSkuModel::where('service_id', $request->service_id)->get()->all();
        // foreach($service_sku as $key => $each){
        //     //dd($each->service_sku);
        //     $arr[] =  $each->service_sku;
        // }
        // $new_Arr = json_encode($arr);
        dd($request);
        return response()->json($request); 
        //dd($arr);
    }
    public function edit(ServiceModel $serviceModel)
    {
        //dd($serviceModel);
        $name_page = [
            'name' => 'Service Update',
            'total' => 'Service',
            'route' => 'service.index'
        ];
        $service_sku = ServiceSkuModel::where('service_id', $serviceModel->id)->get()->all();
        // foreach($service_sku as $e){

        //     dd($e->id);
        // }
        return view('admin.service.update',compact('name_page','serviceModel','service_sku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, ServiceModel $serviceModel)
    {
        //dd($request);
        $price = explode('VNĐ',$request->price);
        $price = explode('.' , $price[0]);
        $price = implode('',$price);
        $request['price'] = $price;
        try {
            $serviceData = $request->except(['thumbnail']);
            if($request->hasFile('logo')){
                $logo = $request->logo;
                
                $nameLogo = $logo->getClientOriginalName();
                $dirFolder = 'img/admin/service/';
                $newLogo = $dirFolder . 'service-logo' . '-' . $request->slug .  '-' . $nameLogo;
                $serviceData['logo'] = $newLogo;
                @unlink($serviceModel->logo);
            }
            else{
                $serviceData['logo'] = $serviceModel['logo'];
            }
            
            $service = $serviceModel->update($serviceData);
            
            
            if(!empty($service)){
                if(!empty($logo)){
                    $logo->move($dirFolder, $newLogo);
                }
                if(!empty($request->thumbnail)){
                    $InformationServiceSku = ServiceSkuModel::where('service_id', $serviceModel->id)->get()->all();
                    foreach($request->thumbnail as $key => $service_sku){
                        $nameService = $request->slug;
                        //$serviceSku = $request->thumbnail[$key];
                                
                        $nameServiceSku = $service_sku->getClientOriginalName();
                        $dirFolder = 'img/admin/service/';
                        $newSku = $dirFolder . 'service-sku' . '-' . $request->slug  . '-' . $nameServiceSku;
                        
                        @unlink($InformationServiceSku[$key]['service_sku']);
                        $service_sku->move($dirFolder, $newSku);
                        //dd($InformationServiceSku[$key]['service_sku'],$service_sku,$serviceModel->logo);
                        $arr[] = [
                            'service_id' =>$serviceModel->id,
                            'service_sku' =>$newSku,
                            'created_at' =>Carbon::now(),
                            'updated_at' =>Carbon::now(),
                        ];
                    }
                }
                else{
                    $InformationServiceSku = ServiceSkuModel::where('service_id', $serviceModel->id)->get()->all();
                        
                    foreach($InformationServiceSku as $key => $service_sku){ 
                        $newServiceSku = $InformationServiceSku[$key]['service_sku'];
                        //dd($logo,$service_sku, $newServiceSku);
                        $dirFolder = 'img/admin/service/';
                        
                        //dd($newServiceSku,$name_imgSku,$newSku);

                        
                        $arr[] = [
                            'service_id' =>$serviceModel->id,
                            'service_sku' =>$newServiceSku,
                            'created_at' =>Carbon::now(),
                            'updated_at' =>Carbon::now(),
                        ];
                        
                        
                    }
                }
                ServiceSkuModel::where('service_id', $serviceModel->id)->delete();

                $service_sku = new ServiceSkuModel();
                $service_sku->insert($arr);
                //if(!empty($service_sku)){
                    return redirect()->route('service.index')->with('success','Updated service successfully!');
                //}
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceModel $serviceModel)
    {
        try {
            //$this->authorize('delete', $serviceModel);
            $service_Sku = ServiceSkuModel::where('service_id',$serviceModel->id)->delete();
            if(!empty($serviceModel->delete())){
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
