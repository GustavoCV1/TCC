<?php

require_once 'ClientesDao.class.php';

class Clientes{
    
    private $idCliente;
    private $email;
    private $senha;
    private $telefone;
    private $nome;
    private $nascimento;
    private $genero;
    private $foto;
    
    function __construct($idCliente, $email, $senha, $telefone, $nome, $nascimento, $genero, $foto) {
        $this->idCliente = $idCliente;
        $this->email     = $email;
        $this->senha     = $senha;
        $this->telefone  = $telefone;
        $this->nome      = $nome;
        $this->nascimento = $nascimento;
        $this->genero    = $genero;
        $this->foto      = $foto;
    }
    
    public function getIdCliente(){
        return $this->idCliente;
    }
    
    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
        return $this;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
    
    public function getSenha(){
        return $this->senha;
    }
    
    public function setSenha($senha){
        $this->senha = $senha;
        return $this;
    }
    
    public function getTelefone(){
        return $this->telefone;
    }
    
    public function setTelefone($telefone){
        $this->telefone = $telefone;
        return $this;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
    
    public function getNascimento(){
        return $this->nascimento;
    }
    
    public function setNascimento($nascimento){
        $this->nascimento = $nascimento;
        return $this;
    }
    
    public function getGenero(){
        return $this->genero;
    }
    
    public function setGenero($genero){
        $this->genero = $genero;
        return $this;
    }
    
    public function getFoto(){
        return $this->foto;
    }
    
    public function setFoto($foto){
        $this->foto = $foto;
        return $this;
    }
    
    public function selectAll(){
        $dao = new ClientesDao();
        return ($dao->select("")); //Cria uma nova instância e seleciona todos os seus atributos.
    }
    
    public function delete( $id ) {
        $dao = new ClientesDao();
        return ($dao->delete($id));
    }
    
    public function insert() {
        $dao = new ClientesDao();
        return ($dao->insert($this->idCliente, $this->email, $this->senha, $this->telefone, $this->nome, $this->nascimento, $this->genero, $this->foto));
    } //Insere dados recebidos no objeto.
    
    public function update() {
        $dao = new ClientesDao();
        return ($dao->update($this->idCliente, $this->email, $this->senha, $this->telefone, $this->nome, $this->nascimento, $this->genero, $this->foto));
    } //Atualiza para que dados modificados apareçam e sejam usados corretamente.
    
    public function save(){
        $dao = new ClientesDao();
        $dao->insert( );
    }

}

?>