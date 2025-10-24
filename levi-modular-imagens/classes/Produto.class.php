<?php

class Produto{

    private $pdo;
    function __construct(){

        $dns = "mysql:dbname=modularProduto;host = localhost";
        $user = "root";
        $pass = "";

        try {
            
            $this->pdo = new PDO($dns, $user, $pass);
            

        } catch (PDOException $e) {
            
            

        }
    }    

    public function enviarProduto( $nome, $descricao, $fotos=array()){

        

        $sql = "INSERT INTO produtos SET descricao = :d, nome_produto = :n";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":d", $descricao);
        $sql->bindValue(":n", $nome);
        
        $sql -> execute();

        $id_produto = $this->pdo->LastInsertId();
        
        //inserir Imagens  na tabela imagens
        //==================================

        if(count($fotos) > 0){

            for($i = 0; $i < count($fotos); $i++){

                $nome_foto = $fotos[$i];

                $sql = "INSERT INTO imagens (nome_imagem, fk_id_produto) VALUES (:n, :fk)";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(":n", $nome_foto);
                $sql->bindValue(":fk", $id_produto);

                $sql -> execute();

            }

        }


    }

}