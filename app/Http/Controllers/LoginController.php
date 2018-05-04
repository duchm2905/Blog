<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request){
        if($request->isMethod('post')) {
            $email = $request->get('email');
            $password = $request->get('password');
            if ($user = $this->authenticate($email, $password)) {
                $request->session()->put('user', $user);
                return redirect()->route('listUser');
            }
        }
        return view('login');
    }
    protected function authenticate($email,$password){
        if(!$email || !$password) return false;
        $user = User::where('email',$email)
                    ->where('password',md5($password))
                    ->first()
        ;
        if(!$user || !$user->is_active ){
            return false;
        }
        return $user;
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect('/');
    }
}
