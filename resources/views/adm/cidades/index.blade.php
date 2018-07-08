Lista de cidades - <a href="{!! asset('adm/cidades/create') !!}">Adicionar</a> </br></br>

@foreach($cidades as $cidade)


 <a href="{!! asset('adm/cidade') !!}/{{$cidade->slug}}">{{$cidade->cidade}}</a> - 

<form style="display: inline;" action="{{route('cidades.destroy', $cidade->id)}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="delete">
          <button type="submit" class="btn btn-danger">Excluir</button>
</form>
 - 
 <a href="{!! asset('adm/cidades') !!}/{{$cidade->id}}/edit">Editar</a> </br>





@endforeach