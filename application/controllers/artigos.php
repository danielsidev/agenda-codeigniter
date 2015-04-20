<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Agenda extends CI_Controller {

   function index()
   {
      //echo 'Bem vindo ao meu primeiro controlador em CodeIgniter';
	$this->load->view('meuscontatos');
   }
}

?>
