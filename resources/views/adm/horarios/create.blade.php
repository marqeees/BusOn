<form method="POST" action="/adm/cidade/{{$cidade[0]->slug}}/horarios" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="cidade_id" value="{{$cidade[0]->id}}" required>
<input type="hidden" name="slug" value="{{$cidade[0]->slug}}" required>
Selecione o ponto:</br>
<select name="ponto_id">
@foreach($pontos as $ponto)
  <option value="{{$ponto->id}}">{{$ponto->nome}}</option>

@endforeach
</select> </br>

Selecione uma linha:</br>
<select name="linha_id">
@foreach($linhas as $linha)
  <option value="{{$linha->id}}">{{$linha->nome}}</option>

@endforeach
</select> </br>

<select name="dia">
<option value="1">Seg - Sex</option>
<option value="2">Sabado</option>
<option value="3">Dom - Feriados</option>
</select> </br>

Horario:</br> <input type="time" name="horario"> </br>


<button type="submit" >Cadastrar</button>
</form>