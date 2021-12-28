<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function beli(Request $request){
        $response = Http::get('http://localhost:8080/api/search?'. parse_url(url()->full(), PHP_URL_QUERY));
        $listings = json_decode($response, true);
        
        return view('search', ['listings' => $listings]);
    }
}
