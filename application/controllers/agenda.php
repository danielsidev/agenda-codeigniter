<?php
/**
 *@author Daniel Siqueira
 *Developed by Daniel Mello Siqueira: http://danielsiqueira.net
 */
/**
 *Classe de controle para as operações de crud dos contatos.
 */
session_start();
class Agenda extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
 }
/**
 *Método índice/raiz(/index.php) do projeto que retorna a lista de contatos
 */
 

   public function index()
   {	
       
     if($this->session->userdata('logged_in'))
     {
     $session_data = $this->session->userdata('logged_in');
     $dados['login'] = $session_data['usuario'];
     

     /**
      *Carrega as opções para criar urls, links(href/anchor) etc
      **/       
      $this->load->helper('url');
     /**
      *Carrega o modelo passado como parâmetro, instancia a classe
      *criando uma propriedade de mesmo nome da classe:
      *(class = agenda_model -> variável = private $agenda_model)
      **/   
      $this->load->model('agenda_model');

      $dados['titulo'] = 'Meus Contatos';	
      $dados['descricao'] = 'Página dos meus contatos';
      $dados['labelBotao'] = 'Novo Contato';
      $dados['contatos'] = $this->agenda_model->listaContatos();
      /**
       *Carrega a view(html) da lista de contatos e
       *envia-os para serem impressos na tela
      **/
      $this->load->view('meus_contatos', $dados);
      }
      else
      {
     //Se não tiver sessão redireciona para o login
     redirect('login', 'refresh');
     }
   }
   
    function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('login', 'refresh');
 }
/**
 *Método de controle para identificar se será feito uma exclusão ou
 *o carregamento dos dados para gerar uma edição.
 */
   public function controle($acao, $id)
   {
        /**
         *Carrega a library url para opções de criar urls, links(href/anchor) etc
         **/ 
        $this->load->helper('url');
        /**
         *Carrega o modelo passado como parâmetro, instancia a classe
	     *criando uma propriedade de mesmo nome da classe:
	     *(class = agenda_model -> variável = private $agenda_model)
         **/
        $this->load->model('agenda_model');
	
	if($acao=="excluir"){
	    /**
         *Chama o método responsável pela exclusão através do objeto criado em $this->agenda_model
         **/
	$this->agenda_model->excluirContato($id);
	    /**
         *Redireciona para o controlador index( raiz do projeto: agenda/)
         **/		
        redirect('agenda', 'refresh');

	}else{
	    /**
         *Recupera os dados do banco pelo id
         **/
	$editar =$this->agenda_model->listaContatoId($id);
	    /**
         *Monta um map/hashmap de dados com os valores retornados
         **/
	$contato["id"]        = $id;
	$contato["nome"]      = $editar->row()->nome;
	$contato["sobrenome"] = $editar->row()->sobrenome;
	$contato["genero"]    = $editar->row()->genero;
	$contato["telefone"]  = $editar->row()->telefone;
	$contato["celular"]   = $editar->row()->celular;
	$contato["email"]     = $editar->row()->email;
	$contato["titulo"]     = "Editar";
	    /**
         *Carrega a library de form para criar forms html
         **/
    $this->load->helper('form');
	    /**
         *Carrega a view(html) do formulário enviando os dados para serem setados no form
         **/
	$this->load->view("form-contato", $contato);

	}

   }
/**
 *Método para exibir o form de cadastrar um novo contato
 **/
    public function novoContato()
    {
	$contato["titulo"] = "Cadastrar";
       /**
        *Carrega as opções para criar urls, links(href/anchor) etc
        **/       
        $this->load->helper('url');
	    /**
         *Carrega a view(html) do formulário enviado os dados para serem setados no form
         **/
        $this->load->helper('form');
       /**
        *Carrega a view(html) com o form para o cadastro
        **/       
	$this->load->view("form-contato", $contato);
    }
/**
 *Método para cadastrar / editar os dados
 **/
    public function salvar()
    {
        /**
          *Monta o objeto para ser inserido,
          *recuperando os campos do formulário 
        **/
        $dados = array(
            "nome"      =>$this->input->post("nome"),
            "sobrenome" =>$this->input->post("sobrenome"),
            "genero"    =>$this->input->post("genero"),
            "telefone"  =>$this->input->post("telefone"),
            "celular"   =>$this->input->post("celular"),
            "email"     =>$this->input->post("email")
            );
     /**
       *Carrega as opções para criar urls, links(href/anchor) etc
      **/      
      $this->load->helper('url');
     /**
      *Carrega o modelo passado como parâmetro, instancia a classe
      *criando uma propriedade de mesmo nome da classe:
      *(class = agenda_model -> variável = private $agenda_model)
      **/    
      $this->load->model('agenda_model');
     /**
      *Chama o método responsável por cadastrar/editar os dados
      **/
      $result = $this->agenda_model->salvar_dados($dados);

      if($result[0]){
     /**
      *Carrega a view(html) com a tela de sucesso
      **/               
	//$this->load->view("sucesso");	
          echo json_encode($result[1]);
          
      }else{
     /**
      *Carrega a view(html) com a tela de erro
      **/   	
	$this->load->view("erro");	
      }

    }

	
}

?>
