<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CocktailController extends Controller
{
    public function __invoke()
    {
        // Obtener los cócteles populares de la API
        $response = Http::get("https://www.thecocktaildb.com/api/json/v1/1/popular.php");
        $cocktails = json_decode($response->body(), true)['drinks'] ?? [];

        // Retornar la vista con los cócteles populares
        return view('dashboard', [
            'cocktails' => $cocktails,
        ]);
    }
}
