Linhas da cidade de {{$cidade[0]->slug}} -  <a href="{!! asset('adm/cidade') !!}/{{$cidade[0]->slug}}/linhas/create">Adicionar</a> </br><br/><br/>

@foreach($linhas as $linha)


{{$linha->nome}} - 

<form style="display: inline;" action="{!! asset('adm/dlinhas') !!}/{{$linha->id}}" method="post">
         {{csrf_field()}}
         <input type="hidden" name="_method" value="delete">
         <input type="hidden" name="slug" value="{{$cidade[0]->slug}}">
         <button type="submit" class="btn btn-danger">Excluir</button>
</form>
- 
<a href="{!! asset('adm/cidade') !!}/{{$cidade[0]->slug}}/linhas/{{$linha->id}}/edit">Editar</a> </br>





@endforeach