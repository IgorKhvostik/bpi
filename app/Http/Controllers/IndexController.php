<?php

namespace App\Http\Controllers;

use App\Bpi_data;


class IndexController extends Controller
{
    public function index(){
        $data=Bpi_data::orderBy('created_at','desc')->paginate(10);


        return view('welcome')->with([
            'rates'=>$data,
        ]);
    }
}
