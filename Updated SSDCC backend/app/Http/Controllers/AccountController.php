<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $checkExistingUser  =   Accounts::where('account_num', '=', $request->account_num)->select('*')->first();

        if (!isset($checkExistingUser)) {
            $error_messages = array(
                'name.required' => 'Name is required.',
                'account_num.required' => 'Enter six digit account number.',
                'pin.required' => 'Pin is required.'
            ); 
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'account_num' => 'required|max:255|min:6',
                'pin' => 'required|max:255'
            ],$error_messages);
            
            
             if($request->hasFile('profile_img')){            
            
             // Get filename with the extension
              $filenameWithExt = $request->file('profile_img')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('profile_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;            
            $path = $request->file('profile_img')->storeAs('public/userimg/',$fileNameToStore);
            // set here profile image 
            $account['profile_img'] = $fileNameToStore;
         }
            
            if ($validator->fails()) {
                $response['status'] = false;
                $msgs = [];
                foreach($validator->errors()->getMessages() as $value){
                    $msgs[] = $value[0];
                }
                $response['error'] = implode(',',$msgs);//$validator->errors();
            }else{
                $account['name'] = $request->name;
                $account['account_num'] = $request->account_num;
                $account['account_pin'] = $request->pin;
               
             
                $res = Accounts::Create($account);
                if ($res) {
                    $response['status'] = true;
                    $response['msg'] = 'Account has been successfully added.';
                }else{
                    $response['status'] = false;
                    $response['msg'] = 'Something went wrong';
                }
            }
        }else {
            $response['status'] = false;
            $response['msg'] = 'User Already Exist';
        }
        
        return response()->json($response);
    }

    public function GetAll(Request $request)
    {
        $response = Accounts::all();
        return response()->json(['status' => true, 'data' => $response]);
    }

    public function RemoveData(Request $request)
    {
        Accounts::where('accounts_id', '!=', '')->delete();
        return response()->json(['status' => true, 'data' => 'Deleted']);
    }

    public function IsMpinExists(Request $request)
    {
        $checkExistingUser  =   Accounts::where('account_pin', '=', $request->pin)->where('account_num', '=', $request->account_num)->select('*')->first();
        
        
        if (isset($checkExistingUser)) {
            $response = ['status' => true, 'data'=>array('accounts_id'=>$checkExistingUser->accounts_id,'account_num'=>$checkExistingUser->account_num,'name'=>$checkExistingUser->name,'card_status'=>$checkExistingUser->card_status
                 ,'profile_img'=>self::getProfileImg($checkExistingUser->profile_img))
            ];
        }else{
            $response = ['status' => false];
        }
        return response()->json($response);
    }

    public function Test(Request $request)
    {
        $response = 'Working';
        return response()->json(['status' => true, 'data' => $response]);
    }
    // update here card status here 
    
    public function update_card_status(Request $request)
    {
		$response = ['status' => false];
        // 1 Normal 
        // 2 Temporary Block 
        // 0 Permanent Block 
        $checkExistingUser  =   Accounts::where('account_num', '=', $request->account_num)->select('*')->first();
       
        // check here customer 
        if(!empty($checkExistingUser) and isset($request->card_status)){
			// check permanent block status 
			if($checkExistingUser->card_status ==0){
				$response = ['status' => false,'message'=>'Your card is permanent blocked '];
			}else{
			    $status = Accounts::where(['account_num'=>$request->account_num])->update([
							'card_status'=>$request->card_status
						]);
						
			 $response = ['status' => true,'message'=>'Update successfully'];
			}
		}else{
			$response = ['status' => false,'message'=>'Invalid Customer'];
		}
		 return response()->json($response);
    }
    
    public function ProfileImageUpload(Request $request){
           $response = ['status' => false];
             $data = $request->all();
             
            $checkExistingUser  =   Accounts::where('account_num', '=', @$data['account_num'])->select('*')->first();
           
            $previousProfileImage = $checkExistingUser->profile_img;
              $rules = [             
            'profile_img' => 'mimes:jpeg,jpg,png,gif|required|max:100000' // max 10000kb         
            
        ]; 
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json(['success'=>false,'status'=>433,'message' => 'Unprocessable Entity', 'validationErrors' => $validator->errors()], 422);
        } 
         $profile_img_path ='';
         if($request->hasFile('profile_img')){             
            
            // Get filename with the extension
            $filenameWithExt = $request->file('profile_img')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('profile_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;            
            $path = $request->file('profile_img')->storeAs('public/userimg/',$fileNameToStore);
            //   $user->avatar = $fileNameToStore ;

            $updateUserData = Accounts::where("account_num", @$data['account_num']) ->update([
                "profile_img"=>$fileNameToStore                 
            ]);

        if(!empty($updateUserData)){
            // check previous file and delete here 
            if(!empty($previousProfileImage)){
                unlink(storage_path('app/public/userimg/'.$previousProfileImage));
            }
           
            $profile_img_path = self::getProfileImg($fileNameToStore);
             
            return response()->json(['success'=>true, 'message' => 'Profile image has been updated','data'=>array('profile_img'=>$profile_img_path)],200);
        }else{
            return response()->json(['success'=>false, 'message' => 'Unable to upload profile image! Please try again' ], 201);
        }
   }else{
        return response()->json(['success'=>false, 'message' => 'Profile image is not valid! Please try again' ], 201);
   }
 
    }
    
     private function getProfileImg($image_name =null){
         
        if(!empty($image_name)){
            return asset("storage/app/public/userimg/").'/'.$image_name;
        }else{
            return asset("storage/app/public/userimg/").'/nouser.png';
        }

    }
    
} 
