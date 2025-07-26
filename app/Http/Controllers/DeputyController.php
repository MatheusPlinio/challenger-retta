<?php

namespace App\Http\Controllers;

use App\DTOs\OpenData\DeputadoByIdRequestDTO;
use App\DTOs\OpenData\DeputadosRequestDTO;
use App\Jobs\FetchAndStoreDeputyData;
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

    public function show($id)
    {
        $deputy = Deputado::find($id);
        if (!$deputy || $deputy->updated_at->diffInDays(now()) > 1) {
            FetchAndStoreDeputyData::dispatch(new DeputadoByIdRequestDTO($id));
            if ($deputy) {
                return view('deputies.show', compact('deputy'));
            }

            return view('deputies.show', compact('deputy'));
        }
        return view('deputies.show', compact('deputy'));
    }

    public function search(Request $request)
    {
        $name = $request->input('name');

        if (!$name) {
            return response()->json(['error' => 'Nome do deputado é obrigatório'], 400);
        }

        $deputies = $this->openDataInterface->getDeputados(new DeputadosRequestDTO(nome: $name));

        return view('deputies.index', compact('deputies'));
    }
}
