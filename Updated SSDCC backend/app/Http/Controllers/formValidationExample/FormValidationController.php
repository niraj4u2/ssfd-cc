<?php

namespace App\Http\Controllers\formValidationExample;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,Response;
class FormValidationController extends Controller
{
       //
    public function index()
    {
        return view('formValidationExample.index');
    }    
 
    public function store(Request $request)
    {  
   $validator = Validator::make($request->all(), [
     'firstname' => 'required|min:4|max:25',
     'lastname' => 'required|min:4|max:25',
     'email' => 'required|email|unique:users',
     'phone' => 'required|numeric',
     'password' => 'required|min:3|max:20',
     'confirm_password' => 'required|min:3|max:20|same:password',
     ],[
 
     'firstname.required' => ' The first name field is required.',
     'firstname.min' => ' The first name must be at least 4 characters.',
     'firstname.max' => ' The first name may not be greater than 25 characters.',
     'lastname.required' => ' The last name field is required.',
     'lastname.min' => ' The last name must be at least 4 characters.',
     'lastname.max' => ' The last name may not be greater than 25 characters.',
 
     ]);
   $validator->validate();
   dd('Form submitted successfully.');
    }
}
