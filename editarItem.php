<?php 
include_once 'connecao.php';
session_start();
$cliente = $_SESSION['email'];

$IDproduto = filter_input(INPUT_POST, 'IDproduto', FILTER_SANITIZE_NUMBER_INT);
$nome_produto = filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_STRING);

  $sql = "UPDATE produto SET nome_produto = '$nome_produto' WHERE IDproduto = '$IDproduto' ";

 $result = mysqli_query($con, $sql) or die(mysqli_error($con));
 
 $row = mysqli_affected_rows($con);
if( $row == 1){
    $_SESSION['msg'] ="<div class='alert alert-success' role='alert'>"
                     . "Produto editado com sucesso!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
      header("location:produto.php");
      	
}else{

    $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Erro ao editar o produto!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
      header("location:produto.php");
    	
}
?>