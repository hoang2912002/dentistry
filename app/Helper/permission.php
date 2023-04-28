<?php

use Illuminate\Support\Facades\Route;

 if (!function_exists('permission')) {
    function permission()
    {
        $routeCollection = Route::getRoutes();

        foreach ($routeCollection as $value) {
            if(($value->getName() !== 'login.index') && ($value->getName() !== 'sanctum.csrf-cookie') && ($value->getName() !== 'ignition.healthCheck') && ($value->getName() !== 'ignition.executeSolution') && ($value->getName() !== 'ignition.updateConfig') && ($value->getName() !== 'hompage' ) ){
                $arr[] = 
                   ['name' => $value->getName()]
                ; 
            }
        }
        
        $arrayRoute = array_filter($arr,function($v){
            if(strpos($v['name'], 'index') || strpos($v['name'], 'create') || strpos($v['name'], 'update') || strpos($v['name'], 'destroy')   ){
                //dd($arr[] = ['name'=> $v]);
                return $arrNew[] = ['name'=> $v];
               }
        });

        //echo "</table>";
        //dd(array_values($arrayRoute));
        return array_values($arrayRoute);
    }
}