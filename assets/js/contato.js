var confirma = function(){
 if (!confirm("Confirma a exclusão?")){
  return false;
 }else{
  return true;
 }
};

var addNovoContato = function(){ 
 window.location.href="agenda/novoContato";
 };
 
 
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