<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import model suplier
use App\M_Suplier;

//import lib session
use Illuminate\Support\Facades\Session;

//import model pengadaan
use App\M_Pengadaan;

class Home extends Controller
{
    //function index

    public function index(){
    	//echo "fungsi index home";

    	$token = Session::get('token');

    	$tokenDb = M_Suplier::where('token', $token)->count();
    	if($tokenDb > 0){
    		$data['token'] = $token;
    	}else{
    		$data['token'] = "kosong";
    	}
        $data['pengadaan'] = M_Pengadaan::where('status', '1')->paginate(1);
    	return view('utama.home',$data);
    }
}
