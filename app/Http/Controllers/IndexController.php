<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\BpiData;
use Carbon\Carbon;
use GuzzleHttp\Client;


class IndexController extends Controller
{
    public function index(){
        $data=BpiData::orderBy('created_at','desc')->paginate(10);

        return view('welcome')->with([
            'rates'=>$data,
        ]);
    }
}
