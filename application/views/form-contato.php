<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$titulo?></title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}

    input[type="text"], input[type="email"], select{ 
        width: 20%;
        height: 30px;
        padding: 5px;
        border: 1px solid #ccc ;        
        border-radius: 3px;
        box-shadow: 0px 2px 2px #ccc;
    }
    
    input[type="submit"]{
        background: #666;        
        color: #fff;
        width: 100px;
        height: 30px;
        padding: 5px;
        border: 1px solid #ccc ;        
        border-radius: 3px;
        box-shadow: 0px 2px 2px #ccc;
        cursor: pointer;
    }   
    
    input[type="submit"]:hover{
            background: #ccc;        
            color: #333;
    }
    
     hr{ width: 0%; opacity: 0;}
     
     #feedback{
         box-shadow: 0px 0px 10px #ccc;
         border-radius: 3px;
         padding: 5px;
         width: 200px;
         height: 100px;
         position: absolute;
         margin: 20px auto;
         background: #fff;
         top: 20%;
         left: 50%;
         margin-left: -100px;
         display: none;
     }
	</style>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    var novoContato= function(){
        
     var validou = validar(); 
     
     if(validou){
         
      var url      = "http://agenda-codeigniter/agenda/salvar";
      var formData = $("#formContato").serialize();           
            //console.log(formData);
        $('#feedback').html('Cadastrando novo contato... Por favor, Aguarde.');
        $("#feedback").fadeIn();
        $.ajax({
	     url :  url,
	     type: "POST",
         data : formData,
	      success: function(data, textStatus, jqXHR)
	      {	    	
                window.location.href='http://agenda-codeigniter/agenda/';
                console.log(data);       
	      },
	      error: function (jqXHR, textStatus, errorThrown)
	      {
	    	console.log("ERRO!!! Não conseguiu!");
	    	console.log(textStatus);                
	      }
	    }); 
     }else{
         alert("Prencha todos os campos!");
     }
    };
    
    var validar = function(){
      var camposText = $("input[type=text]").val();  
      var camposSelect = $("select").val();  
      var camposEmail = $("input[type=email]").val();  
      
      if(camposText==='' || camposSelect==='' || camposEmail===''){
          return false;
      }else{
          return true;
      }
    };
    </script>
</body>
</html>
