@extends('layouts.main')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Despesas Mensais - Deputado Exemplo</h2>
        <form action="{{ route('deputies.search') }}" method="GET" class="max-w-4xl mx-auto mb-6">
            <input type="text" name="name" placeholder="Buscar deputado por nome ou ID" value="{{ request('name') }}"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Buscar
            </button>
        </form>
        @if (isset($deputies) && $deputies->count())
            <div class="max-w-4xl mx-auto mt-6 bg-white rounded-lg shadow p-4">
                <h3 class="text-lg font-semibold mb-3">Resultados da pesquisa:</h3>
                <ul class="space-y-2">
                    @foreach ($deputies->dados as $deputy)
                        <li class="border-b pb-2">
                            <a href="{{ route('deputies.show', $deputy->id) }}" class="text-blue-600 hover:underline">
                                {{ $deputy->nome }} (ID: {{ $deputy->id }})
                            </a>
                            <img src="{{ $deputy->urlFoto }}" class="w-16 h-16 rounded-full mt-2" alt="{{ $deputy->nome }}">
                        </li>
                    @endforeach
                </ul>
            </div>
        @elseif(request('name'))
            <div class="max-w-4xl mx-auto mt-6 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4"
                role="alert">
                Nenhum deputado encontrado com o termo "{{ request('name') }}".
            </div>
        @endif
    </div>
@endsection
