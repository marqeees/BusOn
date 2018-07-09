<form method="POST" action="{!! asset('adm/ehorarios') !!}/{{$horarios->id}}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="cidade_id" value="{{$cidade[0]->id}}" required>
<input type="hidden" name="slug" value="{{$cidade[0]->slug}}" required>
Selecione o ponto:</br>
<select name="ponto_id">
@foreach($pontos as $ponto)
  <option value="{{$ponto->id}}" @if($ponto->id == $horarios->ponto_id) selected @endif>{{$ponto->nome}}</option>

@endforeach
</select> </br>

Selecione uma linha:</br>
<select name="linha_id">
@foreach($linhas as $linha)
  <option value="{{$linha->id}}" @if($linha->id == $horarios->linha_id) selected @endif>{{$linha->nome}}</option>

@endforeach
</select> </br>

<select name="dia">
<option value="1" @if(1 == $horarios->dia) selected @endif>Seg - Sex</option>
<option value="2" @if(2 == $horarios->dia) selected @endif>Sabado</option>
<option value="3" @if(3 == $horarios->dia) selected @endif>Dom - Feriados</option>
</select> </br>

Horario:</br> <input type="time" name="horario" value="{{$horarios->horario}}"> </br>


<button type="submit" >Editar</button>
</form>