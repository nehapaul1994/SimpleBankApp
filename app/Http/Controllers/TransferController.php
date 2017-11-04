<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('/user/tranfer');
    }
    
    public function transfer(Request $request)
    {
        $this->validate($request, [
                'ac_id' => 'required',
                'amount' => 'required',
    
        ]);
        
        $tranfer_id=$request->input('ac_id');
        $id=Auth::user()->id;
        $current_amt=\App\Account::select ('amount')->where('user_id','=',$id)->first();
        $current=\App\Account::select('amount')->where('act_no','=',$tranfer_id)->first();
        $amount=$request->input('amount');  
        if($amount<=$current_amt->amount)
        {
            $total_amt=$current_amt->amount -$amount;
            $update_amt=\App\Account::where('user_id',$id)->update(['amount'=>$total_amt]);
             
            $total=$current->amount +$amount;
            $update=\App\Account::where('act_no',$tranfer_id)->update(['amount'=>$total]);
            return redirect('/user/dashboard'); 
        }
        else
        {
              return back()->with('error','No sufficient balance');
        }
       
    
    }
     
 
   
}