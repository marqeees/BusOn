<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Linha;

class LinhaController extends Controller
{
    public function index()
    {
        //$cidades = Cidade::paginate(10);
       
        return view('adm.linhas.index');
    }

    public function create()
    {
        return view('adm.linhas.create');
    }
}
