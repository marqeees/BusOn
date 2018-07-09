<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    public function pontos()
    {
        return $this->hasMany('App\Pontos');
    }
    public function linhas()
    {
        return $this->hasMany('App\Linha');
    }
    public function horarios()
    {
        return $this->hasMany('App\Horario');
    }
}
