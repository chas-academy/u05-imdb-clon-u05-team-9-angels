<?php

namespace App\Http\Controllers;

use App\Models\Cast;

class CastController extends Controller
{
    public function getCast($id)
    {
        $cast = Cast::where('id', $id)->first();
        return $cast;
    }
}
