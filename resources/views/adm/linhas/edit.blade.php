<form method="post" action="{!! asset('adm/elinhas') !!}/{{$linhas->id}}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="cidade_id" value="{{$cidade[0]->id}}" required>
<input type="hidden" name="slug" value="{{$cidade[0]->slug}}" required>
<input type="hidden" name="id" value="{{$linhas->id}}" required>
<input type="text" name="nome" placeholder="Nome da Linha" value="{{$linhas->nome}}" required> </br>
<button type="submit" >Editar</button>
</form>