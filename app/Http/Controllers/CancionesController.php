<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cancion;

class CancionesController extends Controller
{
    //
    public function create(Request $request){
        $musica=new Cancion();
        $musica->NombreCancion = $request->input({'NombreCancion'}),
        $musica->NombreCancion = $request->input({'NombreCancio'}),
        return $musica;
    }

    public function show(){
        $musica=new Cancion();
        $musica=Cancion::all();
        return $musica;
    }
}
