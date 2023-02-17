<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20'
        ]);


        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        $to_name = $request->name;
        $to_email = $request->email;
        $body = "<a href=''> cliquez ici pour confirmer </a>";

        Mail::send('email.mail', $data = [
            'name' => $to_name,
            'body' => $body
        ],
        function($message) use($to_name, $to_email){
            $message->to($to_email, $to_name)->subject('courriel test laravel');
        }
        );

        return redirect()->back()->withSuccess(trans('lang.msg_1'));


    }

    public function authentication(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users',
            'password' => 'required|min:6|max:20'
        ]);
        $credentials = $request->only('email', 'password');
        if(!Auth::validate($credentials)):
            return redirect(route('login'))->withErrors(trans('auth.failed'));//withErrors se trouve dans resources/lang/auth/    'failed' => 'These credentials do not match our records.',
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user, $request->get('remember'));
        
        return redirect()->intended('dashboard')->withSuccess('Signed in');
       
    }

    public function dashboard(){

        $name = 'guest';

        if(Auth::check()){
            return view('dashboard');
        }

        return redirect(route('login'))->withErrors(trans('auth.failed'));

    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }


    public function forgotPassword(){
        return view('auth.forgot-password');
    }

    public function tempPassword(Request $request){

        $request->validate(
            [ 'email' => 'required|email|exists:users']
        );

        $user = User::where('email',$request->email)->get();
        $user = $user[0];
        $tempPass=str::random(25);
        $user->temp_password = $tempPass;
        $user->save();
        $userId= $user->id;

        $link = "<a href='/new-password/".$userId."/".$tempPass."'> clickity for new password </a>";

        return $link;

    }

    public function newPassword(User $user, $tempPassword){
        
        if($user->temp_password === $tempPassword){
            return view('auth.new-password');
        }

        return redirect('forgot-password')->withErrors('password does not match you are a dungy bum');

    }













    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
