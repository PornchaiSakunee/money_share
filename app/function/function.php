<?php
use App\model\industrial_park\news;
use App\model\industrial_park\park;
use App\model\industrial_park\images;
//ตรวจสอบว่าได้สร้างข่าว ภาษาไทย หรือไม่
function check_lang_th($id_sub){
	
	$lang_s = news::where('id_news_sub',$id_sub)->where('lang','TH')->count();
	return $lang_s;
}
//ตรวจสอบว่าได้สร้างข่าว ภาษาอังกฤษ หรือไม่
function check_lang_EN($id_sub){

	$lang_s = news::where('id_news_sub',$id_sub)->where('lang','EN')->count();
	return $lang_s;
}

function folder_img($id_news)
{
	$lang_s = news::where('id_news',$id_news)->get();
	$lang_fol = news::where('id_news_sub',$lang_s[0]->id_news_sub)->get();
	$name_fol = "";
	foreach ($lang_fol as $key => $value) {
		if($value->folder_img != ''){
			$name_fol = $value->folder_img;
		}
	}

	return $name_fol ;

}
function img($id_news_sub)
{
	
	$lang_fol = images::where('id_news',$id_news_sub)->get();
	return $lang_fol ;
}
//หาไอดี ข่าว  
function news_id_lang($id_news_sub,$lang)
{
	$sql_new = news::where('id_news_sub',$id_news_sub)
	->where('lang','!=',$lang)
	->get();
}

//news footer  
function news_footer()
{
	$sql_new = news::limit(2)
	->orderBy('created_at','desc')
	->get();
	return $sql_new ;

}
//check lang
function check_lang()
{

	if (\App::getLocale() == 'en') {
		return "en";
	}else{
		return "th";
	}
}
//link park
function park_link($park_id='1')
{

	if($park_id == 1){
		$data_park = array(
			'menu' => 'main.industrial_park.header', 
			'park_link' =>  "branch/sr", 
			'park' =>  @trans('home.industial_park_sr'), 
			'open_dir'=>'sr',
		);
	}
	else if($park_id == 2){
		$data_park = array(
			'menu' => 'main.industrial_park.header', 
			'park_link' =>  "branch/kb", 
			'park' =>  @trans('home.industial_park_kb'), 
			'open_dir'=>'kb',
		);

	}
	else if($park_id == 3){
		$data_park = array(
			'menu' => 'main.industrial_park.header', 
			'park_link' =>  "branch/lp", 
			'park' =>  @trans('home.industial_park_lp'), 
			'open_dir'=>'lp',
		);

	}
	else if($park_id == 5){
		$data_park = array(
			'menu' => 'main.industrial_park.header', 
			'park_link' =>  "branch/ms", 
			'park' =>  @trans('home.industial_park_ms'), 
			'open_dir'=>'ms',
		);

	}
	else if($park_id == 6){
		$data_park = array(
			'menu' => 'main.industrial_park.header', 
			'park_link' =>  "branch/rb", 
			'park' =>  @trans('home.industial_park_rb'), 
			'open_dir'=>'rb',
		);
	}

	return $data_park ;
}
function park_name($park_id='1'){
	$park_name = park::where('park_id',$park_id)->get();
	return $park_name[0]->park_nameTH ;
}

function date_sp($date_time)
{
	$date = explode(" ",$date_time);
	$s_date = explode("-",$date[0]);
	$Y = $s_date[0];
	$m = $s_date[1];
	$d = $s_date[2];
	switch($m){
		case "01":$m = @trans('home.month1'); break;
		case "02":$m = @trans('home.month2'); break;
		case "03":$m = @trans('home.month3'); break;
		case "04":$m = @trans('home.month4'); break;
		case "05":$m = @trans('home.month5'); break;
		case "06":$m = @trans('home.month6'); break;
		case "07":$m = @trans('home.month7'); break;
		case "08":$m = @trans('home.month8'); break;
		case "09":$m = @trans('home.month9'); break;
		case "10":$m = @trans('home.month10'); break;
		case "11":$m = @trans('home.month11'); break;
		case "12":$m = @trans('home.month12'); break;
	}
	return 	['m'=>$m,'d'=>$d,'y'=>$Y] ;	
}
function date_sp2($date_time)
{
	$date = explode(" ",$date_time);
	$s_date = explode("-",$date[0]);
	$Y = $s_date[0];
	$m = $s_date[1];
	$d = $s_date[2];
	switch($m){
		case "01":$m = @trans('home.month_1'); break;
		case "02":$m = @trans('home.month_2'); break;
		case "03":$m = @trans('home.month_3'); break;
		case "04":$m = @trans('home.month_4'); break;
		case "05":$m = @trans('home.month_5'); break;
		case "06":$m = @trans('home.month_6'); break;
		case "07":$m = @trans('home.month_7'); break;
		case "08":$m = @trans('home.month_8'); break;
		case "09":$m = @trans('home.month_9'); break;
		case "10":$m = @trans('home.month_10'); break;
		case "11":$m = @trans('home.month_11'); break;
		case "12":$m = @trans('home.month_12'); break;
	}
	return 	['m'=>$m,'d'=>$d,'y'=>$Y] ;	
}

function news_num_date($date,$newsId)
{
           //$locale = \App::getLocale();
	$locale = check_lang() == "th" ? "TH" : "EN" ;
	
	$data_news = news::where('news.lang','=',$locale)
	->where('news.status_news',$newsId)
	->where('created_at', 'like', $date.'%')
	// ->orwhere('news.status_news','=',2)
	->orderBy('created_at', 'desc')
	->count();
	


	return $data_news;
}

?>