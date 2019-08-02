<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;

class PublicationController extends Controller
{
    public function index()
    {
        return Publication::all();
    }

    public function show(Publication $publication)
    {
        return $publication;
        // return $publication->load(['people:last_name']);
        // return Publication::with(['thesisType', 'publicationType', 'institution', 'habitatTypes', 'dataTypes', 'locations', 'persons', 'species'])->get();
    }
}
