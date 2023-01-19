<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private string $guard = "manager";
    private string $perfix = "manager";
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $data = $request->only('email','password');
        if(!Auth::guard($this->guard)->attempt($data)){
            return redirect()->back();
        }

        return redirect()->route("{$this->perfix}.home");
    }

    public function logout(){
        Auth::guard($this->guard)->logout();
        return redirect()->route("{$this->perfix}.login");
    }
}
