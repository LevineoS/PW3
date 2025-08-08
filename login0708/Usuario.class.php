<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    public function conecta(){

    $dns  = "mysql:dbname=usuario;host=localhost";
    $user = "root";
    $pass = "";


        try{

            $this->pdo = new PDO($dns, $user, $pass);
            return true;

        }catch(PDOException $e){

            echo 'Erro: ' . $e->getMessage();
            return false;

        }    
    }

    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function cadastrarUsuario($nome, $email, $senha){

        $sql = 'INSERT INTO usuario SET nome = :n, email = :e, senha = :s';

        $sql = $this->pdo->prepare($sql);

        $sql -> bindParam(':n', $nome);
        $sql -> bindParam(':e', $email);
        $sql -> bindParam(':s', $senha);

        return $sql -> execute();

    }

    public function verificaEmail($email){

        $sql = 'SELECT * FROM usuario WHERE email = :e';

        $sql = $this->pdo->prepare($sql);

        $sql -> bindValue(':e', $email);

        $sql -> execute();

        return $sql-> rowCount() > 0;
    }

}