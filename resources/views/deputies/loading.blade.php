@extends('layouts.main')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow text-center">
        <h2 class="text-xl font-semibold mb-4">Carregando dados do deputado...</h2>
        <p class="text-gray-700">Por favor, aguarde enquanto os dados são carregados.</p>
        <div class="mt-6">
            <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mx-auto"></div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "{{ route('deputies.show', $id) }}";
        }, 1500);
    </script>
@endsection
