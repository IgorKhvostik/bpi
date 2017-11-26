<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use App\BpiData;
use Illuminate\Support\Facades\Log;

class BpiGet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bpi:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Bitcoin price index';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $start = microtime(true);
        if (env('APP_PROVIDER') == 'coindesk') {
            $client = new Client(['base_uri' => 'https://api.coindesk.com/v1/bpi/currentprice.json']);
            $response = $client->request('GET');

            if ($response) {
                $bpi = new BpiData();
                $body = $response->getBody();
                $req = \GuzzleHttp\json_decode($body);
                $bpi->usd = round($req->bpi->USD->rate_float, 2);
                $bpi->gbp = round($req->bpi->GBP->rate_float, 2);
                $bpi->eur = round($req->bpi->EUR->rate_float, 2);
                $bpi->save();
            }

            $end = microtime(true);
            $time = $end - $start;
            Log::info('Date: ' . Carbon::now() . ' | Provider: ' . env('APP_PROVIDER') . ' | Command: ' . 'bpi:get' . ' | Time to execute command (sec) : ' . $time);

        } elseif (env('APP_PROVIDER') == 'blockchain') {
            $start = microtime(true);
            if (env('APP_PROVIDER') == 'blockchain') {
                $client = new Client(['base_uri' => 'https://blockchain.info/ticker']);
                $response = $client->request('GET');

                if ($response) {
                    $bpi = new BpiData();
                    $body = $response->getBody();
                    $req = \GuzzleHttp\json_decode($body);

                    $bpi->usd = round($req->USD->last, 2);
                    $bpi->gbp = round($req->GBP->last, 2);
                    $bpi->eur = round($req->EUR->last, 2);
                    $bpi->save();
                }

                $end = microtime(true);
                $time = $end - $start;
                Log::info('Date: ' . Carbon::now() . ' | Provider: ' . env('APP_PROVIDER') . ' | Command: ' . 'bpi:get' . ' | Time to execute command (sec) : ' . $time);
            }
        } else {
            die('Error! Wrong provider name at line "APP_PROVIDER" of .env file');
        }

        return true;
    }
}
