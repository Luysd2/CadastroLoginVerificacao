<?php
session_start();
include('verifica_login.php');

session_regenerate_id(); 
//para mudar o id da seção cada vez q atualizar a pagina
//por padrão o id é o msm, msm quando vc atualiza a pagina


?>
<h2>Olá, <?php  echo $_SESSION['usuario'];?></h2>
<h2><a href="sair.php">Sair</a></h2>