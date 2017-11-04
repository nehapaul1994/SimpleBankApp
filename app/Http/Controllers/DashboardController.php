<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
 
 
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
       
         if (Auth::check()) {
            return redirect('/auth/login');
        }
    }
    
    public function index()
    {
       
        if(Auth::user())
        {
            $id=Auth::user()->id;
            $user = \App\User::select('id','name')->where('id' , '=', $id)->first();
            $account = \App\Account::select('amount','act_no')->where('user_id' , '=', $id)->first();
            return view('user.dashboard')->with(['user' => $user,'account'=>$account]);
        }
        
        else {
         return view('auth/login');   
        }
        
    }
 
   
}