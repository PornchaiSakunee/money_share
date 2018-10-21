<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class setLangController extends Controller
{
    public function setlang(Request $request ,$locale)
    {
         if ($locale == 'th' || $locale == 'en') {
           $locale_data = $request->session()->put('locale',$locale);
         }
        // echo $locale;
         return redirect()->back();
  }
}
