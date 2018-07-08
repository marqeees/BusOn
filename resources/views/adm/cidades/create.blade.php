<form method="POST" action="{{ route('cidades.store')}}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="text" name="cidade" placeholder="Nome da Cidade" required> </br>
<input type="text" name="slug" placeholder="Slug" required> </br>
<button type="submit" >Cadastrar</button>
</form>