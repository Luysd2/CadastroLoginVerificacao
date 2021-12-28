<?php
//conexao local
define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'login');
// definindo o banco de dados com seus campos

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die("Não foi possivel conectar");
//fazendo a conexão com o banco de dados 

?>