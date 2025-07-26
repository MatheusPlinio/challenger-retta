@extends('layouts.main')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-6">
        <div class="flex gap-6 items-start">
            <div class="w-1/4">
                <img src="{{ $deputy->urlFoto }}" alt="{{ $deputy->nome }}" class="rounded shadow mb-4">
                <h2 class="text-xl font-bold">{{ $deputy->nome }}</h2>
                <p class="text-gray-700">{{ $deputy->siglaUf }} - {{ $deputy->siglaPartido }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ $deputy->email ?? 'Sem e-mail disponível' }}</p>
            </div>

            <div class="w-3/4 bg-white shadow rounded p-6">
                <h3 class="text-lg font-semibold mb-4">Despesas por Mês (mock)</h3>
                <canvas id="monthlyExpensesChart" class="mb-8"></canvas>

                <h3 class="text-lg font-semibold mb-4">Categorias de Gasto (mock)</h3>
                <canvas id="expenseCategoryChart"></canvas>
            </div>
        </div>
    </div>
@endsection
