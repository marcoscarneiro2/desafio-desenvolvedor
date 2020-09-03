<?php 
session_start();

$nome_produto = $_POST['nome_produto'];


include_once'connecao.php';

$db = mysqli_select_db($con, 'oliveiratrust');

$sql = "SELECT nome_produto FROM produto WHERE nome_produto = '$nome_produto'";

$select = mysqli_query($con, $sql);

$array = mysqli_fetch_array($select);

$logarray = $array['nome_produto'];
 
  if($nome_produto == "" || $nome_produto == null){
       $_SESSION['mensagem'] ="<div class='alert alert-danger' role='alert'>"
                     . "O campo nome deve ser preenchido!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
           header("location:cadastrarItem.php");
    }else{
        if($logarray == $nome_produto){
            $_SESSION['mensagem'] ="<div class='alert alert-warning' role='alert'>"
                     . "Esse produto já existe!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
           header("location:cadastrarItem.php");
        }else{
                
            $sql = "insert into produto (IDproduto,nome_produto) values(null,'".$nome_produto."')";

            $inserir = mysqli_query($con, $sql);
                
            if($inserir){
                $_SESSION['mensagem'] ="<div class='alert alert-success' role='alert'>"
                     . "Produto cadastrado com sucesso!!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
           header("location:index.php");            
            }else{
                $_SESSION['mensagem'] ="<div class='alert alert-danger' role='alert'>"
                     . "Não foi possível cadastrar esse produto!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
           header("location:cadastrarItem.php"); 
            }
         }
      }  
    
        mysqli_close($con);
?>