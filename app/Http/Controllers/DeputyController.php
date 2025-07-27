<?php

namespace App\Http\Controllers;

use App\DTOs\OpenData\DeputadoByIdRequestDTO;
use App\DTOs\OpenData\DeputadosRequestDTO;
use App\DTOs\OpenData\DeputadosResponseDTO;
use App\Jobs\FetchAndStoreDeputyData;
use App\Jobs\FetchOthersDataDeputy;
use App\Models\Deputado;
use App\Services\Contracts\OpenDataInterface;
use Illuminate\Http\Request;

class DeputyController extends Controller
{
    public function __construct(protected OpenDataInterface $openDataInterface)
    {
    }
    public function index()
    {
        return view('deputies.index');
    }

    public function show(Request $request, $id)
    {
        $deputy = Deputado::find($id);

        $selectedYear = request('year') ?? date('Y');

        $availableYears = $deputy->despesas()
            ->select('ano')
            ->groupBy('ano')
            ->orderByDesc('ano')
            ->pluck('ano')
            ->toArray();

        $monthlyExpenses = $deputy->despesas()
            ->where('ano', $selectedYear)
            ->get()
            ->groupBy('mes')
            ->map(fn($group) => $group->sum('valorDocumento'))
            ->toArray();

        $byCategory = $deputy->despesas()
            ->where('ano', $selectedYear)
            ->get()
            ->groupBy('tipoDespesa')
            ->map(fn($group) => $group->sum('valorDocumento'))
            ->toArray();

        if (
            !$deputy ||
            !$deputy->despesas()->exists() ||
            $deputy->updated_at->diffInDays(now()) > 1
        ) {
            FetchOthersDataDeputy::dispatch(new DeputadoByIdRequestDTO($id));
            return view('deputies.loading', compact('id'));
        }

        return view('deputies.show', compact(
            'deputy',
            'monthlyExpenses',
            'byCategory',
            'availableYears',
            'selectedYear'
        ));
    }

    public function search(Request $request)
    {
        $name = $request->input('name');

        if (!$name) {
            return response()->json(['error' => 'Nome do deputado é obrigatório'], 400);
        }

        $deputies = Deputado::where('nome', 'like', "%{$name}%")->get();
        if ($deputies->isEmpty()) {
            $apiDeputies = $this->openDataInterface->getDeputados(new DeputadosRequestDTO(nome: $name))->dados;
            FetchAndStoreDeputyData::dispatch(new DeputadosResponseDTO($apiDeputies));

            $deputies = collect($apiDeputies);
        }

        return view('deputies.index', compact('deputies'));
    }
}
