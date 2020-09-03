<?php
session_start();
include_once'connecao.php';

$data = $_POST['data'];
$hora = $_POST['hora'];
$IDcliente = $_POST['IDcliente'];
$IDproduto = $_POST['IDproduto'];
$IDagenda = $_POST['IDagenda'];


$sql = "INSERT INTO agenda (data, hora, IDcliente, IDproduto, IDagenda, situacao_atual) VALUES ('".$data."', '".$hora."', '".$IDcliente."', '".$IDproduto."', NULL, 'Em aberto');";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
 $row = mysqli_affected_rows($con);
if( $row == 1){
    $_SESSION['msg'] ="<div class='alert alert-success' role='alert'>"
                     . "Produto comprado com sucesso!!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
      header("location:produto.php?msg");	
}else{
    $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Não foi possível comprar o produto!!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
      header("location:produto.php?msg");
   
}



