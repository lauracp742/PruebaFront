<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();


        return view('dashboard', [
            'user' => $user
        ]);
    }

    /*
    function getSearch(Request $request)
    {
        $search = $request->input('search');


        $response = Http::get("https://www.thecocktaildb.com/api/json/v1/1/search.php?s=$search");

        $response = json_decode($response->body(), true);

        return view(
            'dashboard',
            $response->drinks
        );
    }*/
}
