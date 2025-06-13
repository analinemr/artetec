<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Inclui o modelos:
use App\Models\Artesao;
use App\Models\Postagem;
use App\Models\User;

class SiteController extends Controller
{
    public function index (){
        $artesaos = Artesao::orderBy('nome', 'ASC')->get();
        $autores = User::orderBy('name', 'ASC')->get();
        //PAGINATE = separa o retorno (get) de postagens para
        //não pupular muitos dados na mesma página:
        $postagens = Postagem::orderBy('created_at', 'DESC')->paginate(10);
        return view('welcome', compact('artesaos','postagens', 'autores'));
    }

    public function PostagemByArtesaoId ($id){
        $artesaos = Artesao::orderBy('nome', 'ASC')->get();
        $autores = User::orderBy('name', 'ASC')->get();
        $postagens = Postagem::where('artesao_id', $id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('welcome', compact('artesaos','postagens', 'autores'));
    }

    public function PostagemByAutorId ($id){
        $artesaos = Artesao::orderBy('nome', 'ASC')->get();
        $autores = User::orderBy('name', 'ASC')->get();
        $postagens = Postagem::where('user_id', $id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('welcome', compact('artesaos','postagens', 'autores'));
    }

}
