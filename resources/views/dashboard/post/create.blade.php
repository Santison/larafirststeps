@extends('dashboard.master')

@section('content')
    <form action="{{ route ('post.store') }}" method="POST">
        @csrf

        <label for="CODPROFESOR">Profesor</label>
        <select name="CODPROFESOR" id="CODPROFESOR">
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->CODPROFESOR }}">{{ $profesor->NOMBRE }}</option>
            @endforeach
        </select>

        <label for="DIA_INICIO">Día Inicio</label>
        <input type="date" name="DIA_INICIO" id="DIA_INICIO">

        <label for="DIA_FIN">Día Fin</label>
        <input type="date" name="DIA_FIN" id="DIA_FIN">

        <label for="MOTIVO">Motivo</label>
        <select name="MOTIVO" id="MOTIVO">
            @foreach($motivos as $motivo)
                <option value="{{ $motivo->id }}">{{ $motivo->DESCRIPCION }}</option>
            @endforeach
        </select>

        <button type="submit">Registrar Falta</button>
    </form>
@endsection
