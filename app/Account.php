<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';
    
    protected $fillable = [
        'amount',
        'act_type',
        'user_id'
    ];
    
    public function Users()
    {
        return $this->belongsTo('\App\User' , 'user_id', 'id');
    }
    
    public function TransactionType()
    {
        return $this->belongsTo('\App\TransactionType', 'act_type', 'id');
    }
    
    public function Transaction()
    {
        return $this->hasMany('\App\Transaction');
    }
}

