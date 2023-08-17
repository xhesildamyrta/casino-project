<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function showLogin(){
        $user = Auth::user();
        $clicks = DB::table('clicks')
            ->select(DB::raw('YEAR(datetime) as year, MONTH(datetime) as month, user_ip, button_id, COUNT(*) as click_count'))
            ->groupBy('year', 'month', 'user_ip', 'button_id')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
        if(Auth::check()){
            return view('pages.home',compact('user', 'clicks'));
        }
        else{
            return view('pages.login');
        }
    }

    public function loginAction(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin')
                        ->withSuccess('Signed in');
        }
        return redirect("admin")->withSuccess('Login details are not valid');
    }

}



