<form method="POST" action="/adm/cidade/{{$cidade[0]->slug}}/pontos" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="cidade_id" value="{{$cidade[0]->id}}" required>
<input type="hidden" name="slug" value="{{$cidade[0]->slug}}" required>
<input type="text" name="nome" placeholder="Nome do Ponto" required> </br>
<input type="text" name="endereco" placeholder="Endereço" required> </br>
<input type="text" name="maps" placeholder="Maps" required> </br>
<input type="file" name="imagem" required> </br>
<button type="submit" >Cadastrar</button>
</form>