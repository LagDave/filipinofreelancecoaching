<?php

namespace App\Http\Controllers;

use App\User;
use \Mailjet\Resources;
use Illuminate\Http\Request;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;

class PasswordResetsController extends Controller
{
    public function index(){
      return view('password_reset.index');
    }
    public function verify(Request $request){

      $email = $request->email;

      if(sizeof(User::where('email', $email)->get()) == 0){
        return back()->with('error', 'Email not found');
      }
      $code = mt_rand(111111, 999999);
      // Get the user and save a code
      $user = User::where('email', $email)->first();
      $user->unique_code = $code;
      $user->save();

      // Mail the code
      $toEmail = $email;
      Mail::to($toEmail)->send(new PasswordResetMail($code));
      
      return view('password_reset.verify', compact('email'));

    }
    public function update_pass(Request $request){
      $user = User::where('email', $request->email)->first();
      if($user->unique_code == $request->code){
        Cookie::queue('email', $request->email, 1440);
        return redirect('/reset_password/update_pass_form');
      }
      return redirect('/reset_password')->with('error', 'Wrong code! Please try again.');
    }

    public function update_pass_form(){
      return view('password_reset.update_pass');
    }

    public function updateStore(Request $request){
      $request->validate([
        'password'=>'required',
        'confirm_password'=>'required|same:password'
      ]);
      $email =  Cookie::get('email');
      $user = User::where('email', $email)->first();
      $user->password = Hash::make($request->password);
      $user->save();

      return redirect('/login')->with('success', 'Password changed successfully!');

      
    }
}
