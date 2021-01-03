<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        // $email = $request->email;
        $password = $request->password;
        // $member = new \App\Member();
        // $member->email = $request->email;
        // $member->password = $request->password;
        // $user->save();
        $hashedPassword = Hash::make($request->newPassword);
        $now = date("Y-m-d H:i:s");
        $param =[
            'email'=>$request->email,
            'password'=>$hashedPassword,
            'created_at'=> $now,
            'updated_at'=> $now
        ];
        DB::insert('insert into member(email,password,created_at,updated_at) values(:email,:password,:created_at,:updated_at)',$param);
        return view('register.complete');
    }

    public function user_login(RegisterRequest $request)
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
}
