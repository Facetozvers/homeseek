<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ListingController extends Controller
{
    public function show($id){
        $response = Http::get('http://localhost:8080/api/properti/'. $id);
        $listing = json_decode($response, true);

        return view('listing', ['listing' => $listing]);
    }
}
