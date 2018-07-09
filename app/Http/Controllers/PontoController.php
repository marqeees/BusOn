<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Ponto;
use File;

class PontoController extends Controller
{
    public function index(Request $request)
    {
        $cidade = DB::table('cidades')->where('slug', $request->slug)->get();
        $pontos = DB::table('pontos')->where('cidade_id', $cidade[0]->id)->get();

        return view('adm.pontos.index', compact('pontos','cidade'));
    }

    public function create(Request $request)
    {
        $cidade = DB::table('cidades')->where('slug', $request->slug)->get();
        return view('adm.pontos.create', compact('cidade')); 
    }

    public function store(Request $request)
    {
        $imagem = time().'.'.$request->imagem->getClientOriginalExtension();
        $request->imagem->move(public_path('pontosImagem'), $imagem);


        $pontos = new Ponto;
        $pontos->cidade_id = $request->cidade_id;
        $pontos->nome = $request->nome;
        $pontos->endereco = $request->endereco;
        $pontos->maps = $request->maps;
        $pontos->imagem = $imagem;
        $pontos->save();
        Session::flash('flash_message', 'Cidade cadastrada com sucesso.');
        return redirect('adm/cidade/'.$request->slug.'/pontos');
    }

    public function edit(Request $request)
    {
        $cidade = DB::table('cidades')->where('slug', $request->slug)->get();
        $pontos = Ponto::find($request->ponto);
        return view('adm.pontos.edit', compact('pontos','cidade')); 
    }

    public function update(Request $request)
    {
        if($request->imagem == null){
            $pontos = Ponto::find($request->id);
            $pontos->cidade_id = $request->cidade_id;
            $pontos->nome = $request->nome;
            $pontos->endereco = $request->endereco;
            $pontos->maps = $request->maps;
            $pontos->save();
        } else {
            $imagem = time().'.'.$request->imagem->getClientOriginalExtension();
            $request->imagem->move(public_path('pontosImagem'), $imagem);

            $pontos = Ponto::find($request->id);
            $pontos->cidade_id = $request->cidade_id;
            $pontos->nome = $request->nome;
            $pontos->endereco = $request->endereco;
            $pontos->maps = $request->maps;
            File::delete('pontosImagem/'.$pontos->imagem);
            $pontos->imagem = $imagem;
            $pontos->save();
        }
         
    Session::flash('flash_message', 'Cidade editada com sucesso.');
    return redirect('adm/cidade/'.$request->slug.'/pontos');
    }

    public function destroy(Request $request)
    {
        $pontos = Ponto::find($request->id);
        File::delete('pontosImagem/'.$pontos->imagem);
        $pontos->delete();
        return redirect('adm/cidade/'.$request->slug.'/pontos');
        
    }
}
