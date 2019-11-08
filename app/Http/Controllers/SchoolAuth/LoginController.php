<?php

namespace App\Http\Controllers\SchoolAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/school/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('school.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('school.auth.login');
    } 
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('school');
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate(); 
        return redirect('school/login');
    }
    public function postLogin(Request $request)
    { 
        $this->validate($request, [
            'email'      => 'required',
            'password'      => 'required',
        ]); 
        if (auth()->guard('school')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'status' => '1', 'isactive' => '1']))
        {   
            return redirect('/school/home'); 
        }        
        else
        {    
            return Redirect::back()->with(['message' => 'Invalid credentials', 'alert-class' => 'alert-danger']);
        }
    }
}
