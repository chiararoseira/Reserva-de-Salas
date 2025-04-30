@extends('layouts.app')

@section('title', 'Reservas')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Reservas</h1>
        <a href="{{ route('reservas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Nova Reserva</a>
        <div class="mt-4">
            <ul class="list-disc pl-5">
                @foreach($reservas as $reserva)
                    <li class="mb-2">
                        <strong>Sala:</strong> {{ $reserva->sala->nome ?? 'Sala não encontrada' }} - 
                        <strong>Usuário:</strong> {{ $reserva->usuario }} - 
                        <strong>Data:</strong> {{ $reserva->data }} - 
                        <strong>Horário:</strong> {{ $reserva->horario }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
