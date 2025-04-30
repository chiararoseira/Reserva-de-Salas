@extends('layouts.app')

@section('title', 'Nova Reserva')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Nova Reserva</h1>
        <form action="{{ route('reservas.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="sala_id" class="block text-gray-700 text-sm font-bold mb-2">Sala:</label>
                <select name="sala_id" id="sala_id" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach($salas as $sala)
                        <option value="{{ $sala->id }}">{{ $sala->nome }} (Capacidade: {{ $sala->capacidade }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="data" class="block text-gray-700 text-sm font-bold mb-2">Data:</label>
                <input type="date" name="data" id="data" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="horario" class="block text-gray-700 text-sm font-bold mb-2">Horário:</label>
                <input type="time" name="horario" id="horario" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Reservar
                </button>
            </div>
        </form>
    </div>
@endsection
