<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artesao;
use App\Models\Postagem;
use App\Models\User;

class SiteController extends Controller
{
    // Exibe a página inicial
    public function index() {
        $artesaos = Artesao::orderBy('nome', 'ASC')->paginate(6);
        $postagens = Postagem::with(['artesao', 'autor'])->orderBy('created_at', 'DESC')->paginate(6);

        return view('welcome', compact('artesaos', 'postagens'));
    }

public function PostagemByArtesaoId($id)
{
    // Busca o artesão pelo ID
    $artesao = Artesao::findOrFail($id);

    // Busca as postagens relacionadas ao artesão
    $postagens = Postagem::with(['artesao', 'autor'])
        ->where('artesao_id', $id)
        ->orderBy('created_at', 'DESC')
        ->paginate(6);

    // Retorna a view com o artesão e suas postagens
    return view('welcome', [
        'artesaos' => collect([$artesao]), // Apenas o artesão selecionado
        'postagens' => $postagens,
        'artesao' => $artesao, // Para exibir biografia no topo
    ]);
}

}
