<?php
session_start();
include_once'connecao.php';
$IDproduto = $_GET["IDproduto"];

$sql = "DELETE from produto where IDproduto = '".$IDproduto."';";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
 $row = mysqli_affected_rows($con);
if( $row == 1){
    $_SESSION['msg'] ="<div class='alert alert-success' role='alert'>"
                     . "Produto deletado com sucesso!!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
      header("location:produto.php?msg");	
}else{
    $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Produto não pode ser deletado!!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
      header("location:produto.php?msg");
   
}