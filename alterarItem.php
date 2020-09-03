 <?php
include_once 'navbar.php';
include_once'connecao.php';
$IDproduto = $_GET['IDproduto'];
$sql = "SELECT *  FROM produto WHERE IDproduto = '".$IDproduto."' ";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
?> 

<body>
   <main class="total"> 
   <?php if(isset($_SESSION["msg"])):
   print $_SESSION["msg"];
   unset($_SESSION["msg"]);
   endif; ?> 
   
<div class="container col-3">   
<form style="margin-top:11%;color:black" action="editarItem.php" method="post">
    <h2>Alteração de dados</h2>                      
    <div class="form-group">
     <input type="hidden" class="form-control" id="exampleInputName" aria-describedby="NameHelp" name="IDproduto" value="<?php echo $row['IDproduto']; ?>">
    <label for="exampleInputEmail1">Nome</label>
    <input maxlength="20" type="name" class="form-control" id="exampleInputName" aria-describedby="NameHelp" placeholder="Seu nome" name="nome_produto" value="<?php echo $row['nome_produto']; ?>">
    </div> 
  <button  type="submit" class="btn col-3 btn-primary">Alterar</button>
</form>
</div> 
  
   </main>
    
      <?php
     include_once 'footer.php';
     ?>  
</body>
