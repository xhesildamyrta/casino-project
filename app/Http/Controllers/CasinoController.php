<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clicks;
use GuzzleHttp\Client;

class CasinoController extends Controller
{
    public function index(){

        $casinos = [
            [
                'image' => 'playzee.png',
                'badge' => 'Player Favourite',
                'title' => 'PlayZee',
                'info' => '100% Up to + $1500 + 150 Zee Spins',
                'stars' => 4,
                'rating' => 2589,
                'fill' => 'bg-purple-800',
                'rgb' => '#7906B9',
            ],
            [
                'image' => 'machance.png',
                'badge' => 'Trending',
                'title' => 'Machance',
                'info' => '200% Up to + $500 + 20 Free Spins',
                'stars' => 3,
                'rating'=> 2063,
                'fill' => 'bg-black',
                'rgb' => '#000000',
            ],
            [
                'image' => 'intense.png',
                'badge' => 'Number 1 In Europe',
                'title' => 'Intense',
                'info' => '200% Up to + $3,000 + 30 FREE SPINS',
                'stars' => 2,
                'rating'=> 1158,
                'fill' => 'bg-blue-200',
                'rgb' => '#C2EEF9',
            ],
            [
                'image' => 'leovegas.png',
                'badge' => 'Exclusive',
                'title' => 'Leovega',
                'info' => '200% Up to + $200 + 25 Free Spins on Book of Dead',
                'stars' => 4,
                'rating'=> 1900,
                'fill' => 'bg-teal-600',
                'rgb' => '#45C0A5',
            ],
            [
                'image' => 'casumo.png',
                'badge' => null,
                'title' => 'Casumo',
                'info' => 'Welcome Bonus + $50 + 20 Free Spins',
                'stars' => 4,
                'rating'=> 1652,
                'fill' => 'bg-gray-200',
                'rgb' => '#D1D7D5',
            ],
        ];

        return view('pages.casino',compact('casinos'));
    }

    public function saveLogAndDB(Request $request){

        $ip =$this->getIPAddress();
        $buttonId = $request->input('button_id');
        $datetime = date('Y-m-d H:i:s', strtotime($request->input('datetime')));

        $logFileName = now()->format('Y-m-d') . '-click.log';
        $logData = "Ip: {$ip}, datetime: {$datetime}, button_id: {$buttonId}\n";
        file_put_contents(storage_path("logs/{$logFileName}"), $logData, FILE_APPEND);

        Clicks::create([
            'user_ip' => $ip,
            'button_id' => $buttonId,
            'datetime' => $datetime,
        ]);

        return response()->json(['message' => 'Action logged and saved!']);

    }

    public function getIPAddress()
    {
        $client = new Client();
        try {
            $response = $client->get('https://api.ipify.org?format=json');
            $data = json_decode($response->getBody(), true);
            $publicIPAddress = $data['ip'];

            return $publicIPAddress;
        } catch (\Exception $e) {
            return 'Error occurred while retrieving public IP address.';
        }
    }
}
