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
                <label for="yearSelect">Selecione o ano:</label>
                <select id="yearSelect" name="yearSelect" class="border p-1 rounded">
                    @foreach ($availableYears as $year)
                        <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                            {{ $year }}</option>
                    @endforeach
                </select>
                <h3 class="text-lg font-semibold mb-4">Despesas por Mês (mock)</h3>
                <canvas id="monthlyExpensesChart" class="mb-8"></canvas>

                <h3 class="text-lg font-semibold mb-4">Categorias de Gasto (mock)</h3>
                <canvas id="expenseCategoryChart"></canvas>
            </div>
        </div>
    </div>

    <script type="module">
        const monthlyExpenses = @json($monthlyExpenses);
        const byCategory = @json($byCategory);

        const barColors = [
            '#ef4444', '#f59e0b', '#10b981', '#6366f1', '#ec4899', '#22d3ee', '#8b5cf6',
            '#f97316', '#14b8a6', '#a855f7', '#e11d48', '#14aaf5'
        ];

        const monthsMap = {
            '1': 'Jan',
            '2': 'Fev',
            '3': 'Mar',
            '4': 'Abr',
            '5': 'Mai',
            '6': 'Jun',
            '7': 'Jul',
            '8': 'Ago',
            '9': 'Set',
            '10': 'Out',
            '11': 'Nov',
            '12': 'Dez'
        };

        const keys = Object.keys(monthlyExpenses);
        const labels = keys.map(key => monthsMap[key] ?? key);
        const backgroundColors = keys.map((_, i) => barColors[i % barColors.length]);

        const monthlyCtx = document.getElementById('monthlyExpensesChart').getContext('2d');
        new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Gasto (R$)',
                    data: Object.values(monthlyExpenses),
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Despesas por Mês'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const categoryCtx = document.getElementById('expenseCategoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: Object.keys(byCategory),
                datasets: [{
                    label: 'Gastos por Categoria',
                    data: Object.values(byCategory),
                    backgroundColor: [
                        '#ef4444', '#f59e0b', '#10b981', '#6366f1', '#ec4899', '#22d3ee', '#8b5cf6'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Distribuição por Categoria'
                    }
                }
            }
        });

        document.getElementById('yearSelect')?.addEventListener('change', function() {
            const year = this.value;
            window.location.href = `?year=${year}`;
        });
    </script>
@endsection
