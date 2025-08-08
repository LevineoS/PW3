<?php

require'Usuario.class.php';

$usuario = new Usuario();

$conn = $usuario -> conecta();

if ($conn) {

    $email = "gin10@gmail.com";
    $teste = $usuario -> verificaEmail( $email );

    if (!$teste) {

        echo "<script>
            alert('Usuario cadastrado.')
            </script>";

    }else{

        echo "<script>
            alert('Erro. Email já cadastrado.')
            </script>";
        
    }

    $sucesso = $usuario -> cadastrarUsuario("Cleiton", "gin10@gmail.com", "123");

    if ($sucesso) {

        echo "<script>
            alert('Usuario cadastrado.')
            </script>";

    }else{

        echo "<script>
            alert('Erro. Email já cadastrado.')
            </script>";

    }
    


}

?>