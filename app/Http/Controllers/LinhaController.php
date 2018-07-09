<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Linha;

class LinhaController extends Controller
{
    public function index(Request $request)
    {
        $cidade = DB::table('cidades')->where('slug', $request->slug)->get();
        $linhas = DB::table('linhas')->where('cidade_id', $cidade[0]->id)->get();
       
        return view('adm.linhas.index', compact('linhas','cidade'));
    }

    public function create(Request $request)
    {
        $cidade = DB::table('cidades')->where('slug', $request->slug)->get();
        return view('adm.linhas.create', compact('cidade')); 
    }

    public function store(Request $request)
    {
        $linhas = new Linha;
        $linhas->nome = $request->nome;
        $linhas->cidade_id = $request->cidade_id;
        $linhas->save();
        Session::flash('flash_message', 'Cidade cadastrada com sucesso.');
        return redirect('adm/cidade/'.$request->slug.'/linhas');
    }

    public function edit(Request $request)
    {
        $cidade = DB::table('cidades')->where('slug', $request->slug)->get();
        $linhas = Linha::find($request->linha);
        return view('adm.linhas.edit', compact('linhas','cidade')); 
    }

    public function update(Request $request)
    {
        $linhas = Linha::find($request->id);
        $linhas->nome = $request->nome;
        $linhas->cidade_id = $request->cidade_id;
        $linhas->save();
        Session::flash('flash_message', 'Cidade editada com sucesso.');
        return redirect('adm/cidade/'.$request->slug.'/linhas');
    }

    public function destroy(Request $request)
    {
        $linhas = Linha::find($request->id);
        $linhas->delete();
        return redirect('adm/cidade/'.$request->slug.'/linhas');
        
    }
}
