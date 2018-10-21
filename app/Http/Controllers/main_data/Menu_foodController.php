<?php

namespace App\Http\Controllers\food;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\tb_list  ;
use App\model\tb_category ;

class Menu_foodController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
         $data = $this->get_menu();
        // echo "eeee";
        return view('food/menu_food',['menu'=>$data]);
    }

    public function add_view()
    {
        $cat = tb_category::get();
        return view('food/menu_food_add',['cat'=>$cat]);
    }

    public function get_menu()
    {
        $data = tb_list::get();
        return $data ;
    }
}
