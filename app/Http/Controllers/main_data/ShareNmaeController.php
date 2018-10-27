<?php

namespace App\Http\Controllers\main_data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\tb_bank ;
use App\model\tb_baby_share ;
use App\model\tb_name_shares ;
use App\model\tb_style_share ;
use App\Http\Requests\NameShareRequest;

class ShareNmaeController extends Controller
{
    public function index()
    {
        
        $data['name_share'] = tb_name_shares::join('tb_style_share', 'tb_style_share.sts_id', '=', 'tb_name_shares.ns_style_share')->get();
        $data['style_share'] = tb_style_share::get();
        return view('main_data/share_name',$data);
    }
    public function insert(NameShareRequest $request)
    {
     
        if( !empty($request->ns_id) ){

        $insert_img =  tb_name_shares::where('ns_id',$request->ns_id)->update([
            'ns_name' => $request->ns_name,
            'ns_style_share' => $request->ns_style_share,
            'ns_money_fund' => $request->ns_money_fund,
            'ns_installment' => $request->ns_installment,
            'sn_supervise' => $request->sn_supervise,
            'sn_number_share' => $request->sn_number_share,
            'sn_note' => $request->sn_note,
            'sn_play_share' => $request->sn_play_share,
       
            'sn_play_share_date' => $request->sn_play_share_date,
            'updated_at' =>  date('Y-m-d H:i:s'),
        ]);
        }else{
        $insert_img =  tb_name_shares::insert([
            'ns_name' => $request->ns_name,
            'ns_style_share' => $request->ns_style_share,
            'ns_money_fund' => $request->ns_money_fund,
            'ns_installment' => $request->ns_installment,
            'sn_supervise' => $request->sn_supervise,
            'sn_number_share' => $request->sn_number_share,
            'sn_note' => $request->sn_note,
            'sn_play_share' => $request->sn_play_share,
          
            'sn_play_share_date' => $request->sn_play_share_date,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        }
        if($insert_img){
            return redirect()->route('share_name');
        }else{
            echo "!Error ";
        }
    }
}
