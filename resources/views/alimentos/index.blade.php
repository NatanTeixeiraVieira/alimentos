@extends('layouts.app')

@section('content')
<h1>Lista de Alimentos</h1>

@if(session('sucesso'))
<p style="color: green;">{{ session('sucesso') }}</p>
@endif

<a href="{{ route('alimentos.create') }}">Adicionar Novo Alimento</a>
<br>
<a href="{{ route('alimentos.validadeProxima') }}">Alimentos com validade próxima</a>


<ul>
@foreach($alimentos as $alimento)
<li>
<strong>{{ $alimento->nome }}</strong> -
Quantidade: {{ $alimento->quantidade }} -
Validade: {{ $alimento->validade ?? 'Sem validade' }}

<a href="{{ route('alimentos.edit', $alimento) }}">Editar</a>

<form action="{{ route('alimentos.destroy', $alimento) }}" method="POST"
style="display:inline;">
@csrf
@method('DELETE')
<button type="submit">Excluir</button>
 @if($alimento->quantidade <= 5)
            <span style="color: red; font-weight: bold;">
                (Estoque Baixo!)
            </span>
        @endif
</form>
</li>
@endforeach
</ul>

@endsection
