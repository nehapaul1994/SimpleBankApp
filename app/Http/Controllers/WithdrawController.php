<?php
 
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



 
 
class WithdrawController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        return view('/user/withdraw');
    }
    
    public function withdraw(Request $request){
        
        $this->validate($request, [
                'amount' => 'required',
              
    
        ]);
        $amount=$request->input('amount');  
       
        $id=Auth::user()->id;
        $current_amt=\App\Account::select ('amount')->where('user_id','=',$id)->first();
        if($current_amt->amount >= $amount)
        {
            $total_amt=$current_amt->amount -$amount;
            $update_amt=\App\Account::where('user_id',$id)->update(['amount'=>$total_amt]);
        }
        else
        {
              return back()->with('error','No sufficient balance');
        }
        //dd($current_amt);
       
       
        
        return redirect('/user/dashboard');
        
    }
 
   
}