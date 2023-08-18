<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function showLogin()
    {
        //dd(Session::has('userLoggedIn'));
        return view('pages.login');
    }

    public function loginAction(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $remember = $request->has('remember');

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->put('userLoggedIn', true);
            return redirect()->intended('dashboard')
                ->with('success', 'You are logged in sucessfully!');
        }
        return redirect('login')->with('error', 'Permission error');
    }

    public function logOut()
    {
        if (session('userLoggedIn')) {
            Auth::logout();
            session()->forget('userLoggedIn');
            return redirect('/login')->with('success', 'You were logged out!');
        }
    }

    public function showDashboard()
    {
        $user = Auth::user();
        $clicks = DB::table('clicks')
            ->select(DB::raw('YEAR(datetime) as year, MONTH(datetime) as month, user_ip, button_id, COUNT(*) as click_count'))
            ->groupBy('year', 'month', 'user_ip', 'button_id')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('pages.dashboard', compact('user', 'clicks'));
    }

    public function filter(Request $request)
    {
        $buttonId = $request->input('button_id');

        $filterValue = $request->input('filter_value');

        $clicks = DB::table('clicks')
            ->select(DB::raw('YEAR(datetime) as year, MONTH(datetime) as month, user_ip, button_id, COUNT(*) as click_count'))
            ->when($filterValue, function ($query) use ($filterValue) {
                return $query->where(function ($subQuery) use ($filterValue) {
                    $subQuery->whereRaw('YEAR(datetime) = ?', [$filterValue])
                        ->orWhere('button_id', $filterValue)
                        ->orWhere('user_ip', $filterValue);
                });
            })
            ->groupBy('year', 'month', 'user_ip', 'button_id')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();


        return view('pages.dashboard', compact('clicks'));
    }
}
