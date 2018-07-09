<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    public function cidade()
    {
        return $this->belongsTo('App\Cidade');
    }
    public function linha()
    {
        return $this->belongsTo('App\Linha');
    }

    public function ponto()
    {
        return $this->belongsTo('App\Ponto');
    }
}
