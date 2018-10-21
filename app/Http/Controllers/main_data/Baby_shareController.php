<?php

namespace App\Http\Controllers\main_data;

use App\Http\Requests\BabyShareRequest;
use App\Http\Controllers\Controller;
use App\model\tb_bank ;
use App\model\tb_baby_share ;

class Baby_shareController extends Controller
{
    public function index()
    {
        $data['baby_share'] = tb_baby_share::get();
        $data['bank'] = tb_bank::get();
        return view('main_data/baby_share',$data);
    }
    public function add(Type $var = null)
    {
        # code...
    }
    public function insert(BabyShareRequest  $request)
    {
        // $valid = $this->validate($request,[
        //     'bs_Fname'=>'required|max:10',
        //     'bs_Lname'=>'required'
        //  ]);
        // print_r($valid);
        // $insert_img =  tb_baby_share::create([
        //     'bs_Fname' => $request->bs_Fname,
        //     'bs_Lname' => $request->bs_Lname,
        //     'bs_address' => $request->bs_address,
        //     'bank_id' => $request->bank_id,
        //     'bs_bank_number' => $request->bs_bank_number,
        //     'bs_note' => $request->bs_note,

        //   ]);
     
    }
    public function update(Type $var = null)
    {
        # code...
    }
    public function delet(Type $var = null)
    {
        # code...
    }
}
