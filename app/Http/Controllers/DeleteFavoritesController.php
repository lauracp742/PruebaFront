<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class DeleteFavoritesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $id = $request->input('id');
        // dd($id);
        //Favorite::destroy($id);

        Favorite::where('id', $id)->delete();
        // $favorite = Favorite::find($id);

        // $favorite->delete();
        return back();
    }
}
