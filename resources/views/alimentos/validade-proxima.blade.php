@extends('layouts.app')

@section('content')
<h1>Alimentos com Validade Próxima (7 dias)</h1>

@if($alimentos->isEmpty())
    <p>Nenhum alimento com validade próxima.</p>
@else
    <ul>
        @foreach($alimentos as $alimento)
            <li>
                <strong>{{ $alimento->nome }}</strong> -
                Quantidade: {{ $alimento->quantidade }} -
                Validade: {{ \Carbon\Carbon::parse($alimento->validade)->format('d/m/Y') }}
            </li>
        @endforeach
    </ul>
@endif

<a href="{{ route('alimentos.index') }}">Voltar para lista completa</a>
@endsection
