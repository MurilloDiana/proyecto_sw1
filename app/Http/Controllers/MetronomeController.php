<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetronomeController extends Controller
{
    private $isRunning = false;
    private $tempo = 120; // Valor por defecto del tempo (120 BPM)

    public function start(Request $request)
    {
        $this->isRunning = true;
        // Aquí puedes iniciar el metrónomo en tu aplicación
        return response()->json(['message' => 'Metrónomo iniciado']);
    }

    public function stop(Request $request)
    {
        $this->isRunning = false;
        // Aquí puedes detener el metrónomo en tu aplicación
        return response()->json(['message' => 'Metrónomo detenido']);
    }

    public function setTempo(Request $request)
    {
        $this->tempo = $request->input('tempo');
        // Aquí puedes actualizar el tempo del metrónomo en tu aplicación
        return response()->json(['message' => "Tempo actualizado a {$this->tempo} BPM"]);
    }
}
