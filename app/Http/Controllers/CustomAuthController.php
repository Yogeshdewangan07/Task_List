<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view('form.login');
    }

    public function registration(){
        return view('form.registration');
    }

    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:registrations',
            'password' => 'required',
        ]);

        $user = new Registration();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            $request->session()->put('loginId', $user->id);
            return redirect(route('tasks.index'));
        }else{
            return back()->with('fail', 'Something wrong');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Registration::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect()->route('tasks.index');
            }else{
                return back()->with('fail', 'Password not matches.');
            }
        }else{
            return back()->with('fail', 'This email is not registered.');
        }
    }

    public function index(){
        $data = array();
        if(Session::has('loginId')){
            $data = Registration::where('id', '=', Session::get('loginId'))->first();
        }
        return view('index', ['data' => $data]);
    }

    public function logout(){
        if(Session::has("loginId")){
            Session::pull('loginId');
            return redirect(route('form.login'));
        }
    }
}
