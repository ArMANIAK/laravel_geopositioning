<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Response;

class SearchedAddresses extends Controller
{
    //
    public function index()
    {
        return json_encode(Response::all()->all());
    }

    public function searchedByRegion($id)
    {
        $region = Region::find($id);
        // var_dump($region->response()->get());
        return json_encode($region->response()->get());
    }
}
