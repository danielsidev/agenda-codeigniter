<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$titulo ?></title>

    <link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/css/contato.css" />
    <script src="<?=site_url()?>assets/js/contato.js" type="text/javascript"></script>

</head>
<body>
<h1 style="float: right; margin-right: 15px;"> <a href="agenda/logout">Sair</a></h1><br/><br/>
<div id="container">
	<h1><?=$titulo." - Olá ".$login ?></h1>
    
    
	<div id="body">
<button onclick="novoContato()"> <?=$labelBotao ?></button>
<br/><br/>
          <?php
          
	  $existe = $contatos->num_rows;	
          if($existe > 0){  ?>
		<table border='1' cellspacing='0'>
		<tr> 
		<td>NOME COMPLETO</td>
		<td>GÊNERO</td>		
		<td>TELEFONE</td>
		<td>CELULAR</td>
		<td>EMAIL</td>
	        <td colspan='2'>Controle</td>
		</tr>
           <?php

		foreach($contatos->result() as $contato)
		{
		echo"
		<tr>
		   <td>{$contato->nome} {$contato->sobrenome}</td>
	           <td>{$contato->genero}</td>
		   <td>{$contato->telefone}</td>
	           <td>{$contato->celular}</td>
	           <td>{$contato->email}</td>
                   <td style='text-align: center'>"
                  .anchor("agenda/controle/editar/{$contato->id}", "Editar")." | "
                  .anchor("agenda/controle/excluir/{$contato->id}", "Excluir", array("onclick" => "return confirma()"))."</td>

		</tr>";
		}
           }else{
	    echo "<p>Ainda não existem registros de contatos.</p><p>Crie um novo contato.</p>";
           }
           ?>
		</table>
<br/><br/>
        </div>

</body>
</html>
