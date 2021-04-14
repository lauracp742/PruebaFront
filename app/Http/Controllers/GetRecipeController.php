<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GetRecipeController extends Controller
{
    public function index($idDrink)
    {
        $user = Auth::user();

        $response = Http::get("https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=$idDrink");

        $response = json_decode($response->body(), true);

        $drinks  = $response['drinks'][0];


        $ingredients = [];

        if ($response !== null) {
            for ($i = 1; $i <= 15; $i++) {
                $ingredient = $drinks['strIngredient' . $i];
                $measurements = $drinks['strMeasure' . $i];

                if (
                    $ingredient !== null &&
                    $measurements !== null
                ) {
                    $ingredients[] = [
                        'ingredient' => $ingredient,
                        'measurements' => $measurements
                    ];
                }
            }

            return view('recipe', [
                'user' => $user,
                'drink' => $drinks,
                'ingredients' => $ingredients
            ]);
        }


        return redirect('/dashboard')->withErrors('Whoops! Please try something else.');
    }
}
