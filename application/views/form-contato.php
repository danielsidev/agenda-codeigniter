<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$titulo?></title>
<link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/css/contato.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?=site_url()?>assets/js/contato.js" type="text/javascript"></script>
</head>
<body>

<div id="container">
	<h1><?=$titulo ?> Contato</h1>

	<div id="body">

<?php //form_open('') ?>
<form action="" method="post" accept-charset="utf-8" id="formContato">
<input type="hidden" name="id" id="id" value="<?=isset($id)?$id:0 ?>"/>
Nome:<br/>
<input type="text" name="nome" id="nome" value="<?=isset($nome)?$nome:'' ?>" /><hr/>
Sobrenome:<br/>
<input type="text" name="sobrenome" id="sobrenome" value="<?=isset($sobrenome)?$sobrenome:'' ?>" /><hr/>

Gênero:<br/>
<select name="genero" id="genero">
    <option value="<?=isset($genero)?$genero:'' ?>"><?=isset($genero)?$genero:'' ?></option>
    <option value="F">F</option>
    <option value="M">M</option>
    
</select><hr/>

Telefone:<br/>
<input type="text" name="telefone" id="telefone" value="<?=isset($telefone)?$telefone:'' ?>" /><hr/>

Celular:<br/>
<input type="text" name="celular" id="celular" value="<?=isset($celular)?$celular:'' ?>" /><hr/>

E-mail:<br/>
<input type="email" name="email" id="email" value="<?=isset($email)?$email:'' ?>" /><hr/>

<input type="button" onclick='novoContato();' name="cadastrar" id="cadastrar" value="<?=$titulo ?>" /><br/>
</form>
<?php //form_close() ?>
<hr/>


<?=anchor("agenda/", "<< Voltar") ?>
<hr/>
    </div></div>
    <div id="feedback"></div>
    
</body>
</html>
