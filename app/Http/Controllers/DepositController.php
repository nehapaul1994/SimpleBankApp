<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

 
class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/auth/login');
        }
        return view('user/deposit');
    }
    
    public function __construct()
    {
         if (!Auth::check()) {
            return redirect('/auth/login');
        }
        
    }
    
    public function deposit(Request $request)
    {
        
        $this->validate($request, [
                'amount' => 'required',
              
    
        ]);
        $amount=$request->input('amount');  
       
        $id=Auth::user()->id;
        $current_amt=\App\Account::select ('amount')->where('user_id','=',$id)->first();
        //dd($current_amt);
        $total_amt=$current_amt->amount +$amount;
        
        $update_amt=\App\Account::where('user_id',$id)->update(['amount'=>$total_amt]);
        
        return redirect('/user/dashboard');
        
    }
 
   
}