 <?php
     include_once 'navbar.php';
     ?> 

<body>
   <main class="total"> 
         <?php if(isset($_SESSION["mensagem"])):
   print $_SESSION["mensagem"];
   unset($_SESSION["mensagem"]);
endif; ?> 
<div class="container col-3">   
 <form  style="margin-top:50%;color:black" action="addItem.php" method="post">
    <p class="font-weight-bolder" style="font-size: 1.5rem;text-align:center">Cadastro de Produto</p><br>
      
                     
    <div class="form-group">
    <label>Nome do Produto</label>
    <input maxlength="30" type="name" class="form-control" id="exampleInputName" aria-describedby="NameHelp" placeholder="nome" name="nome_produto">
    </div> 
 
  
  <br><br>  
  <button  type="submit" class="btn btn-secondary col-5"><a href="index.php">Cancelar</a></button>
  <button style="margin-left: 15%" type="submit" class="btn col-5 btn-primary" >Cadastrar</button>

</form>
</div> 
 
   
   </main>
    
      <?php
     include_once 'footer.php';
     ?>  
</body>
