<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use App\Entity\User;
use App\Entity\UsersVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\VerificationEmail;
use Mail;



class AuthController extends Controller
{ 

    public function register(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:3|confirmed',
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }


        $user = User::create([
        'name' => $request->name,
        'surname' => $request->surname,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => bcrypt($request->password)
        ]);

        $verifyUser = UsersVerification::create([
            'user_id' => $user->id,
            'token' => sha1(time())
        ]);

        Mail::to($user->email)->send(new VerificationEmail($user));

        return response()->json(['status' => 'success'], 200);
    }

    public function verifyEmail($token)
     {
        $verifyUser = UsersVerification::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->is_verified) {
            $verifyUser->user->is_verified = 1;
            $verifyUser->user->save();
            UsersVerification::where('token', $token)->delete();
            $status = "Your e-mail is verified. You can now login.";
            } else {
            $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return response()->json(['status' => 'error'], 500);
        }
        return response()->json(['status' => $status], 200);
    }   

    public function login(Request $request)
    {
    
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['status' => 'success'], 200)->header('Authorization', $token);
        }
        return response()->json(['error' => 'login_error'], 401);
    }

    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    public function user(Request $request)
    {
        dd($this->guard());

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    private function guard()
    {
        return Auth::guard();
    }

}