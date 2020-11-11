<?php

require_once 'ServicoDao.class.php';

class Servico{
    
    private $idServico;
    private $preco;
    private $descricao;
    private $barbeiro;
    private $nome;
    private $equipamento;
    private $foto;
    
    function __construct($idServico, $preco, $descricao, $barbeiro, $nome, $equipamento, $foto){
        $this->idServico = $idServico;
        $this->preco     = $preco;
        $this->descricao = $descricao;
        $this->barbeiro  = $barbeiro;
        $this->nome      = $nome;
        $this->equipamento = $equipamento;
        $this->foto      = $foto;
    }
    
    public function getIdServico(){
        return $this->idServico;
    }
    
    public function setIdServico($idServico){
        $this->idServico = $idServico;
        return $this;
    }
    
    public function getPreco(){
        return $this->preco;
    }
    
    public function setPreco($preco){
        $this->preco = $preco;
        return $this;
    }
    
    public function getDescricao(){
        return $this->descricao;
    }
    
    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }
    
    public function getBarbeiro(){
        return $this->barbeiro;
    }
    
    public function setBarbeiro($barbeiro){
        $this->barbeiro = $barbeiro;
        return $this;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
    
    public function getEquipamento(){
        return $this->equipamento;
    }
    
    public function setEquipamento($equipamento){
        $this->equipamento = $equipamento;
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
        $dao = new ServicoDao();
        return ($dao->select("")); //Cria uma nova instância e seleciona todos os seus atributos.
    }
    
    public function delete( $id ) {
        $dao = new ServicoDao();
        return ($dao->delete($id));
    }
    
    public function insert() {
        $dao = new ServicoDao();
        return ($dao->insert($this->idServico, $this->preco, $this->descricao, $this->barbeiro, $this->nome, $this->equipamento, $this->foto));
    } //Insere dados recebidos no objeto.
    
    public function update() {
        $dao = new ServicooDao();
        return ($dao->update($this->idServico, $this->preco, $this->descricao, $this->barbeiro, $this->nome, $this->equipamento, $this->foto));
    } //Atualiza para que dados modificados apareçam e sejam usados corretamente.
    
    public function save(){
        $dao = new ServicoDao();
        $dao->insert( );
    }

}

?>