<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clicks;
use GuzzleHttp\Client;

class CasinoController extends Controller
{
    public function index(){
        return view('pages.casino');
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
    
        return response()->json(['message' => 'Action logged and saved sucessfully']);

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
