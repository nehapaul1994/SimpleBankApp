<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    
    protected $fillable = [
        'from_act',
        'to_act',
        'trans_type',
        'amount'
    ];
    
    public function FromAccount()
    {
        return $this->belongsTo('\App\Account' , 'from_act', 'id');  
    }
    
    public function ToAccount()
    {
        return $this->belongsTo('\App\Account'), 'to_act','id');
    }
    
    public function TransactionType()
    {
        return $this->belongsTo('\App\TransactionType', 'trans_type', 'id');
    }
}


