<form method="POST" action="{!! asset('adm/epontos') !!}/{{$pontos->id}}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="cidade_id" value="{{$cidade[0]->id}}" required>
<input type="hidden" name="slug" value="{{$cidade[0]->slug}}" required>
<input type="text" name="nome" placeholder="Nome do Ponto" value="{{$pontos->nome}}"required> </br>
<input type="text" name="endereco" placeholder="Endereço" value="{{$pontos->endereco}}" required> </br>
<input type="text" name="maps" placeholder="Maps" value="{{$pontos->maps}}" required> </br>
Imagem atual:</br> <img src="http://127.0.0.1:8000/pontosImagem/{{$pontos->imagem}}" width="200px"></br>
Trocar imagem: <br/> <input type="file" name="imagem"> </br>
<button type="submit" >Cadastrar</button>
</form>