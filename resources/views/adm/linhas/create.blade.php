<form method="POST" action="/adm/cidade/{{$cidade[0]->slug}}/linhas" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="cidade_id" value="{{$cidade[0]->id}}" required>
<input type="hidden" name="slug" value="{{$cidade[0]->slug}}" required>
<input type="text" name="nome" placeholder="Nome da Linha" required> </br>
<button type="submit" >Cadastrar</button>
</form>