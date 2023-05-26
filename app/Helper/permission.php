<?php

use Illuminate\Support\Facades\Route;

 if (!function_exists('permission')) {
    function permission()
    {
        $routeCollection = Route::getRoutes();
        //dd(str_contains($routeCollection->getRoutes()[16]->uri(),'admin'));
        foreach ($routeCollection as $value) {
            if((str_contains($value->uri(),'admin')) && ($value->getName() !== 'login.index') && ($value->getName() !== 'sanctum.csrf-cookie') && ($value->getName() !== 'ignition.healthCheck') && ($value->getName() !== 'ignition.executeSolution') && ($value->getName() !== 'ignition.updateConfig') && ($value->getName() !== 'hompage' ) ){
                $arr[] = 
                ['name' => $value->getName()]
                ; 
            }  
        }
        $arrayRoute = array_filter($arr,function($v){
            if(strpos($v['name'], 'index') || strpos($v['name'], 'create') || strpos($v['name'], 'update') || strpos($v['name'], 'destroy')   ){
                return $arrNew[] = ['name'=> $v];
               }
        });
        return array_values($arrayRoute);

    }   
}