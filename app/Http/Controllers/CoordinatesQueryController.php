<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\CoordinatesQuery;
use App\Models\Region;
use App\Models\Response;

class CoordinatesQueryController extends Controller
{
    //
    public function getReverseGeocoding(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $requestedCoords = CoordinatesQuery::create([
            'longitude' => $longitude,
            'latitude' => $latitude
        ]);
        $uri = '/geocoding/v5/mapbox.places/' . $longitude . ',' . $latitude . '.json?types=poi&access_token=' . 
            getenv('GEO_API_TOKEN');
        $response = Http::get(getenv('GEO_API') . $uri);
        if (empty($response->json()['features']))
        {
            echo 'Nothing is here';
            $fullAddress = $city['text'] = $region['text'] = $country['text'] = 'Undefined';
        } else {
            $fullAddress = $response->json()['features'][0]['place_name'];
            $address_array = $response->json()['features'][0]['context'];
            [$city, $region, $country] = array_slice($address_array, -3);
            echo "$fullAddress<br/>Country: {$country['text']}, State: {$region['text']}, City: {$city['text']}<br/>";
        }
        $requestedRegion = Region::firstOrNew([
            'country' => $country['text'],
            'region' => $region['text'],
            'city' => $city['text']
        ]);
        $requestedRegion->save();
        $responseAddress = Response::firstOrNew([
            'region_id' => $requestedRegion->id,
            'address' => $fullAddress
        ]);
        $responseAddress->save();
    }
}
