<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('register.index');
    } 

    public function confirm(RegisterRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $data = [
            'email' => $email,
            'password' => $password
        ];
        $validate_rule = [
            'email'=> 'required',
            'password'=> 'required'
        ];
        $this->validate($request, $validate_rule);


        return view('register.confirm', $data);
    } 

    public function complete(Request $request)
    {
        return view('register.complete');
    } 
}
