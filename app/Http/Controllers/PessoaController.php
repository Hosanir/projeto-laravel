<?php
namespace App\Http\Controllers;
use App\Http\Requests\PessoaRequest;
use App\Models\Pessoa;
class PessoaController extends Controller
{
    // LISTAR: busca 10 pessoas por página, em ordem alfabética
    public function index()
    {
        $pessoas = Pessoa::orderBy('name')->paginate(10);
        return view('pessoas.index', compact('pessoas'));
    }
    // CRIAR (1/2): mostra o formulário vazio
    public function create()
    {
        return view('pessoas.create');
    }
    // CRIAR (2/2): recebe o formulário já validado e grava
    public function store(PessoaRequest $request)
    {
        $dados = $request->safe()->only(['nome']);
        // Se enviaram foto, salva em storage/app/public/fotos e guarda o caminho
        if ($request->hasFile('foto')) {
        $dados['foto'] = $request->file('foto')->store('fotos', 'public');
        }     // safe()->only() pega apenas os campos que escolhemos, já validados
        Pessoa::create($request->safe()->only(['name']));
        return redirect()->route('pessoas.index')
            ->with('sucesso', 'Pessoa cadastrada com sucesso!');
    }
    // EDITAR (1/2): mostra o formulário preenchido ($pessoa vem da URL)
    public function edit(Pessoa $pessoa)
    {
        return view('pessoas.edit', compact('pessoa'));
    }
    // EDITAR (2/2): atualiza o registro
    public function update(PessoaRequest $request, Pessoa $pessoa)
    {
        $pessoa->update($request->safe()->only(['name']));
        return redirect()->route('pessoas.index')
            ->with('sucesso', 'Pessoa atualizada com sucesso!');
    }
    // EXCLUIR
    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();
        return redirect()->route('pessoas.index')
            ->with('sucesso', 'Pessoa excluída com sucesso!');
    }
}