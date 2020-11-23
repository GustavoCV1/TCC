<?php

class Contato{

        private $idCont;
        private $nome;
        private $sobrenome;
        private $email;
        private $comentario;

        public function getIdCont()
        {
            return $this->idCont;
        }
        public function setIdCont($idCont)
        {
            $this->idCont = $idCont;
            return $this;
        }

        public function getNome()
        {
            return $this->nome;
        }
        public function setNome($nome)
        {
            $this->nome = $nome;
            return $this;
        }


        public function getSobrenome()
        {
            return $this->sobrenome;
        }
        public function setSobrenome($sobrenome)
        {
            $this->sobrenome = $sobrenome;
            return $this;
        }


        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail($email)
        {
            $this->email = $email;
            return $this;
        }


        public function getComentario()
        {
            return $this->comentario;
        }
        public function setComentario($comentario)
        {
            $this->comentario = $comentario;
            return $this;
        }

}

?>