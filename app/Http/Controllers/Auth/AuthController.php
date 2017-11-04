<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Account;
 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    //user model instance
    protected $user;
    
    //authenticator
    protected $auth;

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    private $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth, User $user)
    {
        $this->user = $user;
        $this->auth = $auth;
       // $this->middleware('guest', ['except' => 'getLogout']);
        
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|max:10',
        'email' => 'required',
        'password' => 'required|max:10',
    
        ]);
        $mail_check = \App\User::where('email','=',$request->input('email'))->get();
        if($mail_check)
        {
             return back()->with('error','Mail already exist');
        }
        $rand = $this->generateRandomString(8);
        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->password = bcrypt($request->password);
        $this->user->save();
        $account = new \App\Account;
        $account->user_id = $this->user->id;
        $account->act_no = $rand;
        $account->amount = 0;
        $account->save();
        return back()->with('success','You are successfully registered');
      
    }
    
    public function generateRandomString($length) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
     }
    
    protected function getLogin() {
        return View('auth.login');
    }
    
     protected function getRegister() {
        return View('auth.register');
    }
    
    protected function getLogout()
    {
        $this->auth->logout();
        Auth::logout();
        return redirect('auth/login');
    }
    
    public function postLogin(Request $request)
    {          
        $this->validate($request, [
                'email' => 'required',
                'password' => 'required',
    
        ]);

        if ($this->auth->attempt($request->only('email', 'password'))) {
            $user = User::select('id','name')->where('email' , '=', $request->email)->first();
            $account = Account::select('amount','act_no')->where('user_id' , '=', $user->id)->first();
            return view('user.dashboard')->with(['user' => $user,'account'=>$account]);
        }
        else 
            return back()->with('error','Invalid Credentials');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
