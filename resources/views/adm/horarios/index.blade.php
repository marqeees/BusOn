Horarios da cidade de {{$cidade[0]->slug}} -  <a href="{!! asset('adm/cidade') !!}/{{$cidade[0]->slug}}/horarios/create">Adicionar</a> </br><br/><br/>

@foreach($horarios as $horario  )


{{$horario->horario}} - @if( $horario->dia == 1) Segunda a sexta  @else @if ($horario->dia == 2 ) Sabado @else Domingo e Feriados @endif @endif 

<form style="display: inline;" action="{!! asset('adm/dhorarios') !!}/{{$horario->id}}" method="post">
         {{csrf_field()}}
         <input type="hidden" name="_method" value="delete">
         <input type="hidden" name="slug" value="{{$cidade[0]->slug}}">
         <button type="submit" class="btn btn-danger">Excluir</button>
</form>
- 
<a href="{!! asset('adm/cidade') !!}/{{$cidade[0]->slug}}/horarios/{{$horario->id}}/edit">Editar</a> </br>





@endforeach