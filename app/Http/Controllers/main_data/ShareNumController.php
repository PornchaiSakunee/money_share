<?php

namespace App\Http\Controllers\main_data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShareNumController extends Controller
{
    public function index()
    {

        // $data['name_share'] = tb_name_shares::join('tb_style_share', 'tb_style_share.sts_id', '=', 'tb_name_shares.ns_style_share')->get();
        $data['ns_name'] = "test";
        return view('main_data/share_num',$data);
    }
    public function insert()
    {
        echo "insert";
    }
}
