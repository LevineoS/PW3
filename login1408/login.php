<?php

session_start();

    require'Usuario.class.php';

    $usuario = new Usuario();
    $con = $usuario->conecta();


if(isset($_POST["cadastrar"])) {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];


    if($con){

        $teste = $usuario->procurarEmail($email);

        if(!$teste){

            $sucesso = $usuario->cadastraUsuario($nome, $email, $senha);
            
            if($sucesso){

                echo "<script>
                    alert ('Usuario cadastrado')
                    </script>";

            }else{

                echo "<script>
                alert ('Nao consegui cadastrar o Usuario')
                </script>";

            }

        }else{

            echo "<script>
            alert ('Esse usuario ja existe')
            </script>";

        }

    }else{

        echo "<script> 
        alert ('Não foi possivel conectar ao banco.') 
        </script>";

        exit;

    }
}elseif(isset($_POST['entrar'])){

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if($con){

        $user = $usuario -> procurarEmail($email);
        if($user){

            $pass = $usuario->procuraSenha($senha);

            if($pass){

                $_SESSION['nome'] = $nome;
                echo header('location:home.php');

            }else{

                echo "<script> 
                alert ('Senha Incorreta')
                </script>";

            }

        }else{

            echo "<script>
            alert('Usuario Incorreto')
            </script>";

        }
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tela de Login </title>

</head>
<body>
        
    <form action="" method="POST">

        Nome: <br>
        <input type="text" name="nome"> <br><br>
        Email: <br>
        <input type="email" name="email"> <br><br>
        Senha: <br> 
        <input type="password" name="senha"> <br><br>
        <input type="submit" name="cadastrar" value="Cadastrar Usuario">
        <input type="submit" name="entrar" value="Entrar">

    </form>

</body>
</html>

