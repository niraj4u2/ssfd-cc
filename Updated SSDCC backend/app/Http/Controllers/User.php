<?php

namespace App\Http\Controllers; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;


use App\User as UserModel;

 
class User extends Controller
{
    //
    
    public function changepassword(Request $request)
    {
		$data = $request->except('_method','_token','submit');
	    
            $user = auth()->user();
			if(!empty($data['oldpassword'])){
		        $rules['oldpassword'] =  'required|min:2';
				$rules['password'] =  'required|min:8|required_with:confirm_password|same:confirm_password';
				$rules['confirm_password'] =  'required|min:8';
		 	
	 
		        $validator = Validator::make($request->all(), $rules);
        		
        		$oldpassword =  Hash::make($request->input('oldpassword'));  
        		
        		if(Hash::check(request('oldpassword'), $user->password)){
        		         Session::flash('message', 'Password has been updated successufully');
                         Session::flash('alert-class', 'alert-success');
                $update_data['password']=	Hash::make($request->input('password'));
                $wh['id'] = $user->id; 
                $user= UserModel::where($wh)->update($update_data);
                    
        		}else{
        		    Session::flash('message', 'Old password is matching');
                    Session::flash('alert-class', 'alert-danger');
        		}
        	 
        		
        		if ($validator->fails()) {
        			return redirect()->Back()->withInput()->withErrors($validator);
        		}
        		
        		
		
			}
			$data=[];
            return view('user.changepassword', ['data' => $data]);
     	    
    }

    
}
