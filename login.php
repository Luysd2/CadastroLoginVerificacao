<?php
session_start();
include('conexao.php');
if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header('Location: index.php');
/* aqui esta fazendo a verificação, se os campos usuario e senha não tiverem sido feito um post
ele n ter acesso pelo link colocando direto (http://localhost/CidadeEstado/index.php).
se alguem tentar fazer isso ele vai ser redirecionado para a pagina do index.php(header('location: index.php');)*/
    exit();
}
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
//$conexao é a variavel que passa a instancia da conexao(aquivo conexao.php)com o bd
/* essa função do mysqli_real_escape_string serve para fazer algumas ferificações e evitar 
ataque de sql injection*/

$query = "select usuario_id, usuario from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";
/* essa variavel esta vefificando o banco de dados e vendo se o os dados digitados no 
campo usuario e senha são os mesmo do banco de dados para poder prosseguir 
 */
$result = mysqli_query($conexao, $query);
// mysqli_query ele vai retorna 0 para falha e 1 para consulta bem sucedidas no bd
$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: painel.php');
    exit();
}else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
exit();
}
?>