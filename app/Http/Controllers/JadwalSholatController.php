<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class JadwalSholatController extends Controller
{
    // API untuk jadwal sholat
    public function getJadwal($city = 'Pekanbaru', $country = 'Indonesia')
    {
        try {
            $client = new Client(['base_uri' => 'https://api.aladhan.com/v1/']);
            $response = $client->get("timingsByCity", [
                'query' => [
                    'city' => $city,
                    'country' => $country,
                    'method' => 2,
                    'timezone' => 'Asia/Jakarta'
                ]
            ]);

            $json = json_decode($response->getBody(), true);

            if ($json['code'] !== 200) {
                return null;
            }

            return [
                'timings'       => $json['data']['timings'],
                'date_readable' => $json['data']['date']['readable'],
                'hijriah'         => $json['data']['date']['hijri']['date'],
                'city'          => $city,
                'country'       => $country
            ];
        } catch (\Exception $e) {
            return null;
        }
    }
}
