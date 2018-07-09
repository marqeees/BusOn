<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linha extends Model
{
    public function cidade()
    {
        return $this->belongsTo('App\Cidade');
    }
    public function horarios()
    {
        return $this->hasMany('App\Horario');
    }
}
