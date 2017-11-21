<?php

namespace App\Http\Controllers;

use App\Bpi_data;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IndexController extends Controller
{
    public function index(){
        $data=Bpi_data::paginate(10);
        //dd($data);
        $client = new Client(['base_uri' => 'https://api.coindesk.com/v1/bpi/currentprice.json']);
        $response = $client->request('GET');
        if ($response){
            $bpi= new Bpi_data();
            $body= $response->getBody();
            $req=\GuzzleHttp\json_decode($body);
           $bpi->usd=round($req->bpi->USD->rate_float, 2);
            $bpi->gbp=round($req->bpi->GBP->rate_float, 2);
            $bpi->eur=round($req->bpi->EUR->rate_float, 2);
            $bpi->save();
        }

        return view('welcome')->with([
            'rates'=>$data,
        ]);
    }
}
