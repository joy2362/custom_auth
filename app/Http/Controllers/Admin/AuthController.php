<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private string $guard = "admin";
    private string $perfix = "admin";
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $data = $request->only('email','password');

        if(!Auth::guard($this->guard)->attempt($data)){
            dd("ok");
            return redirect()->back();
        }

        return redirect()->route("{$this->perfix}.home");
    }

    public function logout(){
        Auth::guard($this->guard)->logout();
        return redirect()->route("{$this->perfix}.login");
    }
}
