Pontos da cidade de {{$cidade[0]->slug}} -  <a href="{!! asset('adm/cidade') !!}/{{$cidade[0]->slug}}/pontos/create">Adicionar</a> </br><br/><br/>

@foreach($pontos as $ponto)


{{$ponto->nome}} - 

<form style="display: inline;" action="{!! asset('adm/dpontos') !!}/{{$ponto->id}}" method="post">
         {{csrf_field()}}
         <input type="hidden" name="_method" value="delete">
         <input type="hidden" name="slug" value="{{$cidade[0]->slug}}">
         <button type="submit" class="btn btn-danger">Excluir</button>
</form>
- 
<a href="{!! asset('adm/cidade') !!}/{{$cidade[0]->slug}}/pontos/{{$ponto->id}}/edit">Editar</a> </br>





@endforeach