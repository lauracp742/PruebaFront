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
        $favorite = new Favorite();
        $favorite->user_id = Auth::id();
        $favorite->name = $request->input('name');
        $favorite->image = $request->input('image');
        $favorite->save();

        return back();
    }
}
