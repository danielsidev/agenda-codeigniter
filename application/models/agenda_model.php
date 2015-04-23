<?php
/**
 *@author Daniel Siqueira
 *Developed by Daniel Mello Siqueira: http://danielsiqueira.net
 *Classe modelo para a agenda contatos. DAO da agenda.
 */
class agenda_model extends CI_Model{

 function __construct()
 {
  parent::__construct();
 }


/**
 *Método responsável por listar todos os contatos em ordem descrescente por id
 */
 public function listaContatos()
 {
     $sql="select * from agenda_contato order by id desc";
     
     $stmt = $this->db->query($sql);

     return $stmt; 
     
 }
/**
 *Método responsável por listar os dados do contato para edição deste
 */
 public function listaContatoId($id)
 {
     $sql="select * from agenda_contato where id={$id}";
     
     $stmt = $this->db->query($sql);

     return $stmt; 
     
 }
/**
 *Método responsável por excluir o contato com base no id
 */
 public function excluirContato($id)
 {
        try{

        $this->db->where("id", $id);
	    $this->db->delete("agenda_contato");
        return true;

        }catch(Exception $e){
	
	return $e->getMessage();

	}
	  
 }
/**
 *Método responsável por cadastrar e editar o contato mediante a passagem de id >=0
 */
 public function salvar_dados($dados)
 {  

   $id = $this->input->post("id");

    if($id!=0){
      $this->db->where("id", $id);
      $query[0] = $this->db->update("agenda_contato",$dados);
      $query[1] = $dados;
    }else{

      $query[0] = $this->db->insert("agenda_contato",$dados);
      $query[1] = $dados;

    }
   
   return $query;

 }



}
