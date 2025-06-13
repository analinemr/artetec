<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Inclui o model de Artesão
use App\Models\Artesao;

class ArtesaoController extends Controller
{

    //Página principal de artesao
    public function index()
    {
        $artesaos = Artesao::orderBy('nome', 'ASC')->get();
        return view ('artesao.artesao_index', compact('artesaos'));
    }

    //Criar nova artesao
    public function create()
    {
        return view ('artesao.artesao_create');
    }


    //Retorna dados
    public function store(Request $request)
 {

    // Mensagens personalizadas
    $messages = [
        'nome.required' => 'O nome da artesao é um campo obrigatório!',
        'nome.min' => 'O nome deve ter pelo menos 5 caracteres.',
        'nome.max' => 'O nome não pode ter mais de 10 caracteres.',
        'nome.unique' => 'Já existe uma artesao com esse nome.',
];

    // Regras de validação com as mensagens personalizadas
    $validated = $request->validate([
        'nome' => 'required|min:5|max:10|unique:artesaos,nome',
    ], $messages);

    // Criar e salvar a artesao
    $artesao = new Artesao();
    $artesao->nome = $request->nome;
    $artesao->save();

    // Redirecionar ou retornar uma resposta, se necessário
    return redirect()->route('artesao.index')->with('success', 'Artesao cadastrado com sucesso!');


    }

    //Visualizar artesao
    public function show(string $id)
    {
        $artesao = Artesao::find($id);
        return view('artesao.artesao_show', compact('artesao'));
    }

    //Editar artesao
    public function edit(string $id)
    {
        $artesao=Artesao::find($id);
        return view('artesao.artesao_edit', compact('artesao'));
    }

    //Alterar artesao
    public function update(Request $request, string $id)
    {
        $messages = [
            'nome.required' => 'O nome é um campo obrigatório!',
        ];

        $validated = $request->validate([
            'nome' => 'required|min:5',
        ], $messages);

        $artesao = Artesao::find($id);
        $artesao->nome = $request->nome;
        $artesao->save();

        return redirect()->route('artesao.index')->with('message', 'Artesao atualizada com sucesso!');
    }

    //Deletar artesao
    public function destroy(string $id)
    {
        $artesao = Artesao::find($id);
        $artesao->delete();

        return redirect()->route('artesao.index')->with('message', 'artesao excluído com sucesso!');
    }
}
