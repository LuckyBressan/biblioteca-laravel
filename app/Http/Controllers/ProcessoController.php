<?php

namespace App\Http\Controllers;

use App\Enums\ProcessoStatus;
use App\Models\Cliente;
use App\Models\Processo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProcessoController extends Controller
{
     public function index(Cliente $cliente)
    {
        $processos = $cliente->processos;

        return view('processos.index', [
            'processos' => $processos,
            'cliente' => $cliente,
            'title' => 'Processos do Cliente: ' . $cliente->nome
        ]);
    }

    public function create(Cliente $cliente)
    {
        return view('processos.incluir', [
            'cliente' => $cliente,
            'title' => 'Incluir Processo'
        ]);
    }

    public function store(Request $request)
    {
        $dados = $this->validate($request);

        $cliente = Cliente::findOrFail($dados['cliente_id']);

        $cliente->processos()->create($dados);

        return redirect()->route('processos.index', $cliente->id);
    }

    public function edit(Processo $processo)
    {
        return view('processos.edit', [
            'processo' => $processo,
            'title' => 'Processo - ' . $processo->nome
        ]);
    }

    /**
     * @todo desenvolver update de processo
     */
    public function update() {}

    public function destroy(Processo $processo)
    {
        $cliente = $processo->cliente_id;
        $processo->delete();
        return redirect()->route('processos.index', $cliente);
    }

    private function validate(Request $request)
    {
        return $request->validate([
            'observacao' => ['string'],
            'status' => [Rule::enum(ProcessoStatus::class)],
            'data_retirada' => [
                Rule::date()->format('Y-m-d'),
                'required'
            ],
            'data_prevista' => [
                Rule::date()->format('Y-m-d'),
                'required',
                'after:data_retirada'
            ],
            'data_devolucao' => [
                Rule::date()->format('Y-m-d'),
                'after:data_retirada'
            ],
            'cliente_id' => ['required', 'exists:App\Models\Cliente,id']
        ]);
    }
}
