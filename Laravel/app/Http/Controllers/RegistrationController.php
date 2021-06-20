<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class RegistrationController extends Controller
{
    public function index(){
        return view('registration.create');
    }

    public function create(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = new User([
            'name'      =>  $request->get('name'),
            'email'     =>  $request->get('email'),
            'password'  =>  $request->get('password'),
            'remember_token' => Str::random(30),
        ]);
        $user->save();
        return redirect()->route('register')->with('success', 'Register Success');
    }

//    public function store(Request $request)
//    {
//        $this->validate(request(), [
//            'name' => 'required',
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//
//        $user = new User([
//            'name'      =>  $request->get('name'),
//            'email'     =>  $request->get('email'),
//            'password'  =>  $request->get('password'),
//            'remember_token' => Str::random(10),
//        ]);
//        $user->save();
//        return redirect()->route('register')->with('success', 'Register Success');
//    }
}
