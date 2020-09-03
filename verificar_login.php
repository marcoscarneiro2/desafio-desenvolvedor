<?php
session_start();
include('connecao.php');

if(empty($_POST['email']) || empty($_POST['senha'])){
    header('Location: index.php');
    exit();

}


$email = mysqli_real_escape_string($con, $_POST['email']);
$senha = mysqli_real_escape_string($con, $_POST['senha']);
$nivel = mysqli_real_escape_string($con, $_POST['nivel']);

$query = ("select IDcliente,nome,telefone,email,senha,nivel from cliente where email = '{$email}' and senha = md5('{$senha}')");

$result = mysqli_query($con,$query);

$numrow = mysqli_num_rows($result);

$row = mysqli_fetch_array($result);

echo $row["IDcliente"];
echo $row["nome"];
echo $row["telefone"];
echo $row["email"];
echo $row["senha"];
echo $row["nivel"];


if($numrow == 1){
    $_SESSION['IDcliente'] = $row["IDcliente"];
    echo $_SESSION['id'];
    
    $_SESSION['nome'] = $row["nome"];
    echo $_SESSION['nome'];
    
    $_SESSION['telefone'] = $row["telefone"];
    echo $_SESSION['telefone'];
    
    $_SESSION['email'] = $email;
    
    $_SESSION['senha'] = $row["senha"];
    echo $_SESSION['senha'];
    
    $_SESSION['nivel'] = $row["nivel"];
    echo $_SESSION['nivel'];
    
    header('Location: index.php');
    exit();
}else{
     $_SESSION['mensagem'] ="<div style='background:Tomato;color:white' class='alert alert-danger' role='alert'>"
                     . "Usuário não encontrado, por favor cadastre-se!!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
                       header("location:cadastro.php");
    
    $_SESSION['nao_autenticado'] = true;
    header('Location: cadastro.php');
    exit();
}

?>