<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    public function index()
    {
        if (request()->query('geoJSON')) {
            return Location::all()->toGeoJson();
        } else {
            return Location::with('publications')->get();
        };
    }

    public function show(Location $location)
    {
        if (request()->query('geoJSON')) {
            return $location->toGeoJson();
        } else {
            return $location->load('publications');
        };
    }
}
