<?php

namespace App\Http\Controllers\main_data;

use Illuminate\Http\Request;
use App\Http\Requests\BabyShareRequest;
use App\Http\Controllers\Controller;
use App\model\tb_bank ;
use App\model\tb_baby_share ;
use App\model\tb_province ;
use App\model\tb_amphures ;
use App\model\tb_districts ;

class Baby_shareController extends Controller
{
    public function index()
    {
        $data['baby_share'] = tb_baby_share::get();
        $data['bank'] = tb_bank::get();
        $data['province'] = tb_province::orderBy('PROVINCE_NAME','ASC')->get();
        return view('main_data/baby_share',$data);
    }
    public function add(Type $var = null)
    {
        # code...
    }
    public function insert(BabyShareRequest  $request)
    {

      $images = "";
      $images_copy_id_card = "";
      $images_copy_register_home = "";
      if ($request->hasFile('picture'))
        {
            $file = $request->file('picture');
            $path = 'images/uploads';
            $filename = time().$file->getClientOriginalName();
            $new_name = explode('.',$filename);
            $name = time()."1.".$new_name[1];
            $file->move('images/uploads',$name);

            $images = $name;
           // array_push($images,['picture'=>$name]);
        }
        if ($request->hasFile('copy_of_id_card'))
          {
              $file = $request->file('copy_of_id_card');
              $path = 'images/uploads';
              $filename = $file->getClientOriginalName();
              $new_name = explode('.',$filename);
              $name = time()."2.".$new_name[1];
              $file->move('images/uploads',$name);

              $images_copy_id_card = $name;
             // array_push($images,['copy_of_id_card'=>$name]);
          }
          if ($request->hasFile('copy_register_home'))
            {
                $file = $request->file('copy_register_home');
                $path = 'images/uploads';
                $filename = time().$file->getClientOriginalName();
                $new_name = explode('.',$filename);
                $name = time()."3.".$new_name[1];
                $file->move('images/uploads',$name);

                $images_copy_register_home = $name;
               // array_push($images,['copy_register_home'=>$name]);
            }

        $address = array(
          'bs_address' => $request->bs_address,
          'bs_district' => $request->district_id,
          'bs_amphur' => $request->amphur_id,
          'bs_province' => $request->province_id,
          'bs_postcode' => $request->postcode
        );

        if( !empty($request->bs_bank_number) ){
          $bs_bank_number = str_replace('-','',$request->bs_bank_number);
        }else{
          $bs_bank_number = 0;
        }

if( !empty($request->baby_share_id) ){
  $get_img = tb_baby_share::where('bs_id',$request->baby_share_id)->first();

  if(empty($images) && !empty($get_img->bs_images)){
    $images = $get_img->bs_images;
  }
  if(empty($images_copy_id_card) && !empty($get_img->bs_copy_images_id_card)){
    $images_copy_id_card = $get_img->bs_copy_images_id_card;
  }
  if(empty($images_copy_register_home) && !empty($get_img->bs_copy_images_register_home)){
    $images_copy_register_home = $get_img->bs_copy_images_register_home;
  }

  $insert_img =  tb_baby_share::where('bs_id',$request->baby_share_id)->update([
      'bs_Fname' => $request->bs_Fname,
      'bs_Lname' => $request->bs_Lname,
      'bs_nickname' => $request->bs_nickname,
      'bs_email' => $request->email != null ? $request->email : '',
      'bs_phone' => $request->phone_number != null ? $request->phone_number : '',
      'bs_line_id' => $request->line_id != null ? $request->line_id : '',
      'bs_address' => json_encode($address),
      'bank_id' => $request->bank_id,
      'bs_bank_number' => $bs_bank_number,
      'bs_note' => $request->bs_note != null ? $request->bs_note : '',
      'bs_images' => $images,
      'bs_copy_images_id_card' => $images_copy_id_card,
      'bs_copy_images_register_home' => $images_copy_register_home
    ]);
}else{
  $insert_img =  tb_baby_share::insert([
      'bs_Fname' => $request->bs_Fname,
      'bs_Lname' => $request->bs_Lname,
      'bs_nickname' => $request->bs_nickname,
      'bs_email' => $request->email != null ? $request->email : '',
      'bs_phone' => $request->phone_number != null ? $request->phone_number : '',
      'bs_line_id' => $request->line_id != null ? $request->line_id : '',
      'bs_address' => json_encode($address),
      'bank_id' => $request->bank_id,
      'bs_bank_number' => $bs_bank_number,
      'bs_note' => $request->bs_note != null ? $request->bs_note : '',
      'bs_images' => $images,
      'bs_copy_images_id_card' => $images_copy_id_card,
      'bs_copy_images_register_home' => $images_copy_register_home,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s')
    ]);
}


        return redirect()->route('baby_share');
    }
    public function update(Type $var = null)
    {
        # code...
    }
    public function delet(Type $var = null)
    {
        # code...
    }
    public function get_amphur(Request $request)
    {
        # code...
        $data = array();
        $tb_amphures = tb_amphures::where('PROVINCE_ID',$request->id)->orderBy('AMPHUR_NAME','ASC')->get();
        foreach ($tb_amphures as $key => $value) {
          // code...
          $AMPHUR_ID = $value->AMPHUR_ID;
          $AMPHUR_NAME = $value->AMPHUR_NAME;
          array_push($data,[$AMPHUR_ID,$AMPHUR_NAME]);
        }

        return response()->json($data);
    }
    public function get_districts(Request $request)
    {
        # code...
        $data = array();
        $tb_districts = tb_districts::leftjoin('tb_amphures','tb_amphures.AMPHUR_ID','=','tb_districts.AMPHUR_ID')
                ->where('tb_districts.AMPHUR_ID',$request->id)
                ->orderBy('tb_districts.DISTRICT_NAME','ASC')->get();
        foreach ($tb_districts as $key => $value) {
          // code...
          $DISTRICT_ID = $value->DISTRICT_ID;
          $DISTRICT_NAME = $value->DISTRICT_NAME;
          $POSTCODE = $value->POSTCODE;
          // dd($value);
          array_push($data,[$DISTRICT_ID,$DISTRICT_NAME,$POSTCODE]);
        }

        return response()->json($data);
    }
    public function edit_get_babyshare(Request $request)
    {
        # code...
        $tb_baby_share = tb_baby_share::where('bs_id',$request->id)->get();
        foreach ($tb_baby_share as $key => $value) {
          // code...
          $address = json_decode($value->bs_address);

          $tb_baby_share[$key]->address = $address->bs_address;
          $tb_baby_share[$key]->district = $address->bs_district;
          $tb_baby_share[$key]->amphur = $address->bs_amphur;
          $tb_baby_share[$key]->province = $address->bs_province;
          $tb_baby_share[$key]->postcode = $address->bs_postcode;
        }
        return response()->json($tb_baby_share);
    }
}
