<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User as UserModel;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule; 
use App\Models\Accounts as Accounts; 

class Dashboard extends Controller
{
    //
	// public function __construct(){
	// 	parent::__construct();
	// }


	public function index(){
		$data = Accounts::get(); 
		 
		$requests = Accounts::select( DB::raw('count(card_status) as status_count,card_status') )->groupBy('card_status')->get();
	    
	    $count[0]= 0;
	    $count[1]= 0;
	    $count[2]= 0;

	    if(!empty($requests)){
	        foreach($requests as $result){
	            $count[$result->card_status]= $result->status_count;
	        }
	    } 
		return view('account.index' , ['data'=>$data,'count'=>$count]);
	}
	function delete($id){
		 
		try {

			$data = Accounts::where(DB::raw('md5(accounts_id)'), $id)->first();
		 
			
			$data->delete();
		 
			Session::flash('message', 'Account has been deleted successfully !');
      Session::flash('alert-class', 'alert-success');
		} catch (Exception $e) {
			Session::flash('message', $e->getMessage());
      Session::flash('alert-class', 'alert-danger');
		}
		return redirect()->route('home');
	}
	
	function deleteall(Request $request){
	    
	    $data = $request->all();
	    $checkedIdGroup =[];
	    
	    if(!empty($request->checkedId)){
        $checkedIdGroup =$request->checkedId;
		 
		try { 
            if($request->deleteAll =='Delete'){
              
		    	$data = Accounts::wherein('accounts_id',$checkedIdGroup)->delete();
		 
			 
		 
		    	Session::flash('message', 'Account has been deleted successfully !');
              Session::flash('alert-class', 'alert-success');
            }
          
             if($request->unblockAll =='Unblock'){
              
		    	$data = Accounts::wherein('accounts_id',$checkedIdGroup)->update(['card_status' => 1]);
		  
			 
		 
		    	Session::flash('message', 'Account has been unblocked successfully !');
              Session::flash('alert-class', 'alert-success');
            }
              if($request->blockAll =='Block'){
              
		    	$data = Accounts::wherein('accounts_id',$checkedIdGroup)->update(['card_status' => 0]);
		 
			 
		 
		    	Session::flash('message', 'Account has been blocked successfully !');
              Session::flash('alert-class', 'alert-success');
            }
            
             if($request->clearAll =='Clear'){
              
		    	$data = Accounts::wherein('accounts_id',$checkedIdGroup)->update(['card_status' => 2]);
		 
			 
		 
		    	Session::flash('message', 'Account has been blocked successfully !');
              Session::flash('alert-class', 'alert-success');
            }
            
		} catch (Exception $e) {
			Session::flash('message', $e->getMessage());
      Session::flash('alert-class', 'alert-danger');
		}
    }else{
        	Session::flash('message', 'Check at least 1 record.');
            Session::flash('alert-class', 'alert-danger');
    }
		return redirect()->route('home');
	}
}
