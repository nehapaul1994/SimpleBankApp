<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    protected $table = 'transaction_type';
    
    protected $fillable = [
        'trans_type'
    ];
    
    /**************************
     * RELATIONS
     **************************/
    
    public function Account(){
        return $this->hasMany('App\Account');
    }
}
