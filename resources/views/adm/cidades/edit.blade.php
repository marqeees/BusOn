<form method="POST" action="{{ route('cidades.update', $cidade->id)}}" enctype="multipart/form-data">
{{csrf_field()}}
<input name="_method" type="hidden" value="PATCH">
<input type="text" name="cidade" placeholder="Nome da Cidade" value="{{$cidade->cidade}}" required> </br>
<input type="text" name="slug" placeholder="Slug" value="{{$cidade->slug}}" required> </br>
<button type="submit" >Editar</button>
</form>