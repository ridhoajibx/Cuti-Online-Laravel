<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginKaryawanController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function LoginKaryawan(Request $r)
    {
      if(!User::where('email',$r->email)->count()){
        return redirect('/login');
      }

      $user = User::where('email',$r->email)->first();
      if($user->user_level_id==1){
        $user_level="admin";
      }
      if($user->user_level_id==2){
        $user_level="hrd";
      }
      if($user->user_level_id==3){
        $user_level="karyawan";
      }

      if(Auth::guard($user_level)->attempt(['email' => $r->email, 'password' => $r->password], $r->remember))
			{
				return redirect($user_level);
			}

      return redirect('/login');

    }
}
