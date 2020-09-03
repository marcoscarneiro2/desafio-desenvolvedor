<?php 
session_start();

$nome = $_POST['nome'];
@$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);
$senha2 = MD5($_POST['senha2']);


include_once'connecao.php';

$db = mysqli_select_db($con, 'oliveiratrust');

$sql = "SELECT email FROM cliente WHERE email = '$email'";

$select = mysqli_query($con, $sql);

$array = mysqli_fetch_array($select);

$logarray = $array['email'];
 
  if($email == "" || $email == null){
       $_SESSION['mensagem'] ="<div class='alert alert-danger' role='alert'>"
                     . "O campo email deve ser preenchido!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
           header("location:cadastro.php");
    }else{
        if($logarray == $email){
            $_SESSION['mensagem'] ="<div class='alert alert-warning' role='alert'>"
                     . "Esse email já existe!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
           header("location:cadastro.php");
        }else{
            
           
                $_SESSION['mensagem'] ="<div style='background:Tomato;color:white' class='alert alert-danger' role='alert'>"
                     . "Senha não confere!!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
                       header("location:cadastro.php"); 
            
            if($senha == $senha2){
                
            $sql = "insert into cliente (IDcliente,nome,email,senha,telefone) values(null,'".$nome."','".$email."','".$senha."','".$telefone."')";

            $inserir = mysqli_query($con, $sql);
                
            if($inserir){
                $_SESSION['mensagem'] ="<div class='alert alert-success' role='alert'>"
                     . "Usuário cadastrado com sucesso!!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
           header("location:index.php");            
            }else{
                $_SESSION['mensagem'] ="<div class='alert alert-danger' role='alert'>"
                     . "Não foi possível cadastrar esse usuário!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
           header("location:cadastro.php"); 
            }
         }else{
                 $_SESSION['mensagem'] ="<div class='alert alert-danger' role='alert'>"
                     . "Senha não confere!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
           header("location:cadastro.php"); 
            }
      }  
    }
        mysqli_close($con);
?>