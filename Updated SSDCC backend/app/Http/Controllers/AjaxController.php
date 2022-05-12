<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use App\CityModel as CityModel;
use App\ServiceModel as ServiceModel;
use App\ServicePriceModel as ServicePriceModel;
use DB;
class AjaxController extends Controller
{
    //

    public function getservicelist(Request $request)
    {

         if(!empty($request->user_id) and !empty($request->service_type)){
            

            $servicelists =  DB::table('services')
            ->select('services.id as service_id','services.service_name','services.service_type','services.user_type')
            ->join('users', 'users.user_type', '=', 'services.user_type')         
            ->where('users.id', $request->user_id)->where('services.service_type',$request->service_type)->get();
            
         }
         $optionservices =[];    
         if(!empty($servicelists)){
            $optionservices =[];
            foreach($servicelists as $service){

                $service_name = ($service->user_type=='home-inspector')?ucfirst($service->service_type).'-> '.$service->service_name:$service->service_name;

                $optionservices[] =array('service_id'=>$service->service_id,'service_name'=>$service_name);


            

            }
         } 
          return  $optionservices;
         
    }
}
