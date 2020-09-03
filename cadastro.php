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
 <form  style="margin-top:15%;color:black" action="gravar.php" method="post">
    <p class="font-weight-bolder" style="font-size: 2rem;text-align:center">Tela de Cadastro</p><br>
      
                     
    <div class="form-group">
    <label for="exampleInputEmail1">Nome completo</label>
    <input maxlength="30" type="name" class="form-control" id="exampleInputName" aria-describedby="NameHelp" placeholder="Seu nome" name="nome">
    </div> 

    <div class="form-group">
    <label for="telefone">Celular</label>
    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00)00000-0000">           
    </div>                                                                               
                     
  <div class="form-group">
    <label for="exampleInputEmail1">Endereço de email</label>
    <input  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="usuario@gmail.com" name="email" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" class="form-control" id="senha1" placeholder="Senha" name="senha" minlength="6">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Confirmar Senha</label>
    <input type="password" class="form-control" id="senha22" placeholder="Confirmar Senha" name="senha2" minlength="6" >
  </div>
 
  
  <br><br>  
  <button  type="submit" class="btn btn-secondary col-5"><a href="index.php">Cancelar</a></button>
  <button style="margin-left: 15%" type="submit" class="btn col-5 btn-primary" >Cadastrar</button>

</form>
<br>
<p>Já é um usuário ? <a href="login.php">Entrar</a></p>

</div> 
 
   
   </main>
    
      <?php
     include_once 'footer.php';
     ?>  
</body>
