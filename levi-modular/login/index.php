<?php

require'usuario.class.php';

$usuario = new Usuario();
$usuario -> setNome('Levi');
$usuario -> setEmail('levi@gmail.com');
$usuario -> setSenha('123');

$nome = $usuario -> getNome();
$email = $usuario -> getEmail();
$senha = $usuario -> getSenha();

echo"Nome: $nome <br>";
echo"Email: $email <br>";
echo"Senha: $senha";

?>