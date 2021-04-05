<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SearchDrinkController extends DashboardController
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
        $search = $request->input('search');
        $response = Http::get("https://www.thecocktaildb.com/api/json/v1/1/search.php?s=$search");
        $response = json_decode($response->body(), true);

        if ($response != null)
            return view('dashboard', [
                'user' => $user,
                'response' => $response
            ]);

        return back()->withErrors('Whoops! Please try something else.');
    }
}

/* foreach (json_decode($response) as $area)
{
 print_r($area); // this is your area from json response
}
*/
