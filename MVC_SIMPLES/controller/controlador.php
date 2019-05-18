<?php

require_once 'model/modelo.php'; 

class Controlador {
	public function index() {
		$modelo = new Modelo(); 
		$mensagem = $modelo->getMensagem();
		require_once 'view/view.php'; 
	   }
    }
?>