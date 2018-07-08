<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Cidade;

class CidadeController extends Controller
{
    public function index()
    {
        $cidades = Cidade::paginate(10);
       
        return view('adm.cidades.index', compact('cidades'));
    }

    public function create()
    {
        return view('adm.cidades.create');
    }

    public function store(Request $request)
    {
        $cidades = new Cidade;
        $cidades->cidade = $request->cidade;
        $cidades->slug = $request->slug;
        $cidades->save();
        Session::flash('flash_message', 'Cidade cadastrada com sucesso.');
        return redirect('adm/cidades');
    }

    public function unicaCidade(Request $request)
    {
        $cidade = DB::table('cidades')->where('slug', $request->slug)->get();
        return view('adm.cidades.unicacidade', compact('cidade'));
    }

    public function edit(Cidade $cidade)
    {
        $cidades = Cidade::find($cidade);
        return view('adm.cidades.edit', compact('cidade')); 
    }

    public function update(Request $request, Cidade $cidade)
    {
        $cidades = Cidade::find($cidade->id);
        $cidades->cidade = $request->cidade;
        $cidades->slug = $request->slug;
        $cidades->save();
        Session::flash('flash_message', 'Cidade editada com sucesso.');
        return redirect('adm/cidades');
    }

    public function destroy(Cidade $cidade)
    {
        
        $cidades = Cidade::find($cidade->id);
        $cidades->delete();
        return redirect('adm/cidades');
        
    }
}
