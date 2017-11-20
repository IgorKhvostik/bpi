<?php

namespace App\Http\Controllers;

use App\Bpi_data;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IndexController extends Controller
{
    public function index(){
        $data=Bpi_data::all();
        $client = new Client(['base_uri' => 'https://api.coindesk.com/v1/bpi/currentprice.json']);
// Send a request to https://foo.com/api/test
        $response = $client->request('GET');
       $body= $response->getBody();
        $req=\GuzzleHttp\json_decode($body);
        $usd=$req->bpi->USD->rate;
       // dd(settype($usd, "int"));
        //dd($body->getContents());


    }
}
