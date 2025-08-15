CREATE DATABASE usuario;
USE usuario;

CREATE TABLE usuario(

id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
email VARCHAR(150),
senha VARCHAR(32)

);

INSERT INTO usuario SET nome = 'admin', senha = '123', email = 'admin@gmail.com';

SELECT * FROM usuario;