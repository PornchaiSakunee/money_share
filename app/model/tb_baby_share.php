<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class tb_baby_share extends Model
{
    // protected $table = "tb_baby_share" ;
    protected $fillable = [
        'bs_id', 'bs_Fname', 'bs_Lname','bs_address','bank_id','bs_bank_number','bs_note',
    
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
