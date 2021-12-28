<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Listing;

class HomeController extends Controller
{
    public function index(){
        $response = Http::get('http://localhost:8080/api/properti/best-seller');
        $bestSeller = json_decode($response, true);

        $response = Http::get('http://localhost:8080/api/properti/premium');
        $premium = json_decode($response, true);

        return view('welcome', ['bestSeller' => $bestSeller, 'premium' => $premium]);
    }
}
