<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importação adicionada

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('sala')->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $salas = Sala::all();
        return view('reservas.create', compact('salas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sala_id' => 'required|exists:salas,id',
            'data' => 'required|date',
            'horario' => 'required',
        ]);

        Reserva::create([
            'sala_id' => $request->sala_id,
            'usuario' => Auth::user()->name, // Pega o nome do usuário logado
            'data' => $request->data,
            'horario' => $request->horario,
        ]);

        return redirect()->route('reservas.index')->with('success', 'Reserva criada com sucesso!');
    }
}
