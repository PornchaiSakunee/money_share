<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\tb_province  ;
use App\model\tb_amphures  ;
use App\model\tb_districts  ;



class BuildingController extends Controller
{
    public function index()
    {
        $data = $this->tb_province->sect_province();
        return view('building',['province'=>$data]);
    }
    public function amphures(Request $request )
    {
        $data = tb_amphures::where('PROVINCE_ID',$request->PROVINCE_ID)
        ->select('AMPHUR_ID','AMPHUR_NAME','AMPHUR_NAME_ENG')
        ->get();
        return json_encode($data);
    }
    public function districts(Request $request )
    {
        
        $data_districts = tb_districts::where('AMPHUR_ID',$request->AMPHUR_ID)
        ->select('DISTRICT_ID','DISTRICT_NAME','DISTRICT_NAME_EN')
        ->get();

        $data_postcode = tb_amphures::select('POSTCODE')->where('AMPHUR_ID',$request->AMPHUR_ID)->get();
        return json_encode(['DISTRICT' => $data_districts , 'POSTCODE' => $data_postcode[0]->POSTCODE ]);
    }
}
