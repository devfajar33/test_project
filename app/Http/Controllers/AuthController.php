<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        try{
            $username = $request->username;
            $password = $request->password;
            $data = User::where('username', $username)->first();
            if($data){ //cek email ada atau tidak 
                if(Hash::check($password, $data->password)){
                    if(Auth::attempt([
                        'username' => $request->username,
                        'password' => $request->password,
                    ])){
                        alert()->success('Success','Data has been successfuly');
                        return redirect('dashboard');
                    }
                }
                else{
                    alert()->warning('Warning','Invalid email or password !');
                    return redirect('/');
                }
            }else{
                alert()->warning('Warning','Username not found, please register !');
                return redirect('/');
            }

        }
        catch(\Exception $ex)
        {
            DB::rollback();
            alert()->error('Error','Something went wrong !');
            return back()->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('useraccess');
        alert()->success('Success','Logout success !');
        return redirect('/');
    }
}
