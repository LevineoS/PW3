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

        }catch (Exception $e){

            echo "Erro ao conectar";
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

  
    public function cadastraUsuario($nome, $email, $senha){

        $sql = "INSERT INTO usuario SET nome = :n, email = :e, senha = :s";

        $sql = $this->pdo->prepare($sql);

        $sql-> bindValue(":n", $nome);
        $sql-> bindValue(":e", $email);
        $sql-> bindValue(":s", $senha);

        return $sql->execute();
    }
 public function procurarEmail($email){
        $sql = "SELECT * FROM usuario WHERE email = :e";

        $sql = $this->pdo->prepare($sql);

        $sql-> bindValue(":e", $email);
        
        return $sql->rowCount() > 0;


    }

    public function procuraSenha($senha){

        $sql = "SELECT * FROM usuario WHERE senha = :s";

        $sql = $this->pdo->prepare($sql);

        $sql->bindValue(":s", $senha);

        return $sql -> rowCount() > 0;

    }


}