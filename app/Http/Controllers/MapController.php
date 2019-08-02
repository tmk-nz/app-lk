<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class MapController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        return view('map.index', compact('locations'));
    }
}
