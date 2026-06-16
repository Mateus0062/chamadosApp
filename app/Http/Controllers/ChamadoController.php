<?php

namespace App\Http\Controllers;

use App\Enums\Prioridade;
use App\Enums\StatusChamado;
use App\Http\Requests\ChamadoRequest;
use App\Models\Chamado;
use App\Models\Responsavel;
use App\Services\AtribuirResponsavelService;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    public function index() {
        return Inertia::render('Chamados/Index', [
            'chamados' => Chamado::with('responsavel')->latest()->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Chamados/Create', [
            'responsaveis' => Responsavel::orderBy('nome', 'asc')->get(),
        ]);
    }

    public function store(ChamadoRequest $request, AtribuirResponsavelService $atribbuirResponsavelService)
    {
        $data = $request->validated();   // ← isto tem que voltar

        if ($request->boolean('atribuir_auto')) {
            $data['responsavel_id'] = $atribbuirResponsavelService->atribuir()->id;
        }

        Chamado::create($data);

        return redirect()->route('chamados.index')->with('success', 'Chamado criado com sucesso!');
    }

    public function edit(Chamado $chamado)
    {
        return Inertia::render('Chamados/Edit', [
            'chamado'      => $chamado,
            'responsaveis' => Responsavel::orderBy('nome', 'asc')->get(),
        ]);
    }

    public function update(ChamadoRequest $request, Chamado $chamado, AtribuirResponsavelService $atribbuirResponsavelService) 
    {
        $data = $request->validated();

        if ($request->boolean('atribuir_auto')) {
            $data['responsavel_id'] = $atribbuirResponsavelService->atribuir()->id;
        }

        $chamado->update($data);

        return redirect()->route('chamados.index')->with('success', 'Chamado atualizado com sucesso!');
    }

    public function destroy(Chamado $chamado) 
    {
        $chamado->delete();
        return redirect()->route('chamados.index')->with('success', 'Chamado excluído com sucesso!');
    }

    public function show(Chamado $chamado) 
    {
        return Inertia::render('Chamados/Show', [
            'chamado' => $chamado->load('responsavel')
        ]);
    }
}
