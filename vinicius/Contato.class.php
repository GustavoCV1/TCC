<?php

	class Contato{
		private $nome;
		private $email;
		private $assunto;
		private $data;

		public function __construct($nome, $email, $assunto, $data){
			$this->nome = $nome;
			$this->email = $email;
			$this->assunto = $assunto;
			$this->data = $data;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome(){
			$this->nome = $nome;
			return $this;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail(){
			$this->email= $email;
			return $this;
		}

		public function getData(){
			return $this->data;
		}

		public function setData(){
			$this->data = $data;
			return $this;
		}


		public function getAssunto(){
			return $this->assunto;
		}

		public function setAssunto(){
			$this->assunto = $assunto;
			return $this;
		}



	}













?>