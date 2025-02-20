<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddFavoriteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Validar los datos del request
        $this->validate($request, [
            'name' => 'required|string',
            'image' => 'required|string',
            'drink_id' => 'string',
        ]);

        try {
            // Crear un nuevo favorito
            $favorite = new Favorite();
            $favorite->user_id = Auth::id();
            $favorite->name = $request->input('name');
            $favorite->image = $request->input('image');
            $favorite->drink_id = $request->input('drink_id');
            $favorite->save();

            // Si el cóctel se guardó correctamente, pasamos el mensaje de éxito
            return back()->with('success', 'El cóctel ha sido guardado en favoritos.');
        } catch (\Exception $e) {
            // Si hay un error, pasamos un mensaje de error
            return back()->with('error', 'Hubo un problema al guardar el cóctel. Por favor, comuníquese con el proveedor.');
        }
    }
}
