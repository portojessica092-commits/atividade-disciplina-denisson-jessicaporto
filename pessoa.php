<?php
require_once 'conexao.php';
 
class Pessoa {
    private $nome;
    private $user;
    private $email;  

    public function _construct ($nome,$user,$email) {
        $this->nome = $nome;
        $this->user = $user;
        $this->email = $email;
    }        
      
    public function inserir() 
    try {(
        $pdo = conexao::getConexa();
        $sql = "INSERT INTO pessoa (nome, user, email) values (:nome, :user, :email)";
        $stmt =$pdo->execute([
            
    