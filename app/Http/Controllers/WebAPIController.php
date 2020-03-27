<?php

namespace App\Http\Controllers;

use Httpful\Client;
use Illuminate\Http\Request;

class WebApiController extends Controller
{
    public $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'api_key' => env('APP_KEY')
            ]
        ]);
    }

    public function index($line)
    {
        try {
            $response = $this->client->get("https://api.wmata.com/Rail.svc/json/{$line}");
            $stations = json_decode((string)$response->getBody(), true);
            $stations = $stations['Stations'];
            return response()->json($stations);
        } catch (\Throwable $exception) {
            return response()->json(['Sorry' => "No data available: {$exception->getMessage()}"]);
        }
    }

    public function show($station)
    {
        $response = $this->client->get("https://api.wmata.com/StationPrediction.svc/json/GetPrediction/{$station}");
        $stations = json_decode((string)$response->getBody(), true);
        $stations = $stations['Trains'];
        return response()->json($stations);
    }
}
