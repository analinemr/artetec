<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artesao;
use App\Models\Postagem;
use App\Models\User;

class SiteController extends Controller
{
    public function index () {
        $artesaos = Artesao::orderBy('nome', 'ASC')->get();
        $autores = User::orderBy('name', 'ASC')->get();
        
        $postagens = Postagem::with(['artesao', 'autor']) // Carrega os relacionamentos
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        
        return view('welcome', compact('artesaos', 'postagens', 'autores'));
    }

    public function PostagemByArtesaoId ($id) {
        $artesaos = Artesao::orderBy('nome', 'ASC')->get();
        $autores = User::orderBy('name', 'ASC')->get();

        $postagens = Postagem::with(['artesao', 'autor']) // também aqui
            ->where('artesao_id', $id)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        
        return view('welcome', compact('artesaos', 'postagens', 'autores'));
    }

    public function PostagemByAutorId ($id) {
        $artesaos = Artesao::orderBy('nome', 'ASC')->get();
        $autores = User::orderBy('name', 'ASC')->get();

        $postagens = Postagem::with(['artesao', 'autor']) // também aqui
            ->where('user_id', $id)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        
        return view('welcome', compact('artesaos', 'postagens', 'autores'));
    }
}