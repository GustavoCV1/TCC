<?php

require_once 'BarbeiroDao.class.php';

class Barbeiro{
    
    private $idBarbeiro;
    private $email;
    private $senha;
    private $telefone;
    private $nome;
    private $nascimento;
    private $genero;
    private $foto;
    private $descricao;
    
    function __construct($idBarbeiro, $email, $senha, $telefone, $nome, $nascimento, $genero, $foto, $descricao){
        $this->idBarbeiro = $idBarbeiro;
        $this->email     = $email;
        $this->senha     = $senha;
        $this->telefone  = $telefone;
        $this->nome      = $nome;
        $this->nascimento = $nascimento;
        $this->genero    = $genero;
        $this->foto      = $foto;
        $this->descricao = $descricao;
    }
    
    public function getIdBarbeiro(){
        return $this->idBarbeiro;
    }
    
    public function setIdBarbeiro($idBarbeiro){
        $this->idBarbeiro = $idBarbeiro;
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
    
    public function getDescricao(){
        return $this->descricao;
    }
    
    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }
    
    public function selectAll(){
        $dao = new BarbeiroDao();
        return ($dao->select("")); //Cria uma nova instância e seleciona todos os seus atributos.
    }
    
    public function delete( $id ) {
        $dao = new BarbeiroDao();
        return ($dao->delete($id));
    }
    
    public function insert() {
        $dao = new BarbeiroDao();
        return ($dao->insert($this->idBarbeiro, $this->email, $this->senha, $this->telefone, $this->nome, $this->nascimento, $this->genero, $this->foto, $this->descricao));
    } //Insere dados recebidos no objeto.
    
    public function update() {
        $dao = new BarbeiroDao();
        return ($dao->update($this->idBarbeiro, $this->email, $this->senha, $this->telefone, $this->nome, $this->nascimento, $this->genero, $this->foto, $this->descricao));
    } //Atualiza para que dados modificados apareçam e sejam usados corretamente.
    
    public function save(){
        $dao = new BarbeiroDao();
        $dao->insert( );
    }

}

?>