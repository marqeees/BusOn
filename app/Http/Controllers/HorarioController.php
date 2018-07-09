<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Horario;
use App\Pontos;
use App\Linhas;

class HorarioController extends Controller
{
    public function index(Request $request)
    {
        $cidade = DB::table('cidades')->where('slug', $request->slug)->get();
        $horarios = DB::table('horarios')->where('cidade_id', $cidade[0]->id)->get();
       
        return view('adm.horarios.index', compact('horarios','cidade'));
    }


    public function create(Request $request)
    {
        $cidade = DB::table('cidades')->where('slug', $request->slug)->get();
        $pontos = DB::table('pontos')->where('cidade_id', $cidade[0]->id)->get();
        $linhas = DB::table('linhas')->where('cidade_id', $cidade[0]->id)->get();
        return view('adm.horarios.create', compact('cidade','pontos','linhas')); 
    }

    public function store(Request $request)
    {
        $horarios = new Horario;
        $horarios->cidade_id = $request->cidade_id;
        $horarios->ponto_id = $request->ponto_id;
        $horarios->linha_id = $request->linha_id;
        $horarios->dia = $request->dia;
        $horarios->horario = $request->horario;
        $horarios->save();
        Session::flash('flash_message', 'Cidade cadastrada com sucesso.');
        return redirect('adm/cidade/'.$request->slug.'/horarios');
    }

    public function edit(Request $request)
    {
        $cidade = DB::table('cidades')->where('slug', $request->slug)->get();
        $pontos = DB::table('pontos')->where('cidade_id', $cidade[0]->id)->get();
        $linhas = DB::table('linhas')->where('cidade_id', $cidade[0]->id)->get();
        $horarios = Horario::find($request->horario);
        return view('adm.horarios.edit', compact('horarios','cidade','pontos','linhas')); 
    }

    public function update(Request $request)
    {
        $horarios = Horario::find($request->id);
        $horarios->cidade_id = $request->cidade_id;
        $horarios->ponto_id = $request->ponto_id;
        $horarios->linha_id = $request->linha_id;
        $horarios->dia = $request->dia;
        $horarios->horario = $request->horario;
        $horarios->save();
        Session::flash('flash_message', 'Cidade editada com sucesso.');
        return redirect('adm/cidade/'.$request->slug.'/horarios');
    }

    public function destroy(Request $request)
    {
        $horarios = Horario::find($request->id);
        $horarios->delete();
        return redirect('adm/cidade/'.$request->slug.'/horarios');
        
    }
}
