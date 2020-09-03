<body>
    <?php
     include_once 'navbar.php';
    session_start();
     ?> 
       <?php if(isset($_SESSION["mensagem"])):
   print $_SESSION["mensagem"];
   unset($_SESSION["mensagem"]);
endif; ?>  
   <main class="total">
       <div class="container col-3">   

          <form style="margin-top:15%;color:black" role="form" action="verificar_login.php" method="POST">
           <p class="font-weight-bolder" style="font-size: 2rem;text-align:center">Tela de Login</p><br>
            <div class="form-group">
             
              <label for="email"><span class="glyphicon glyphicon-user"></span>Email</label>
              <input type="email" class="form-control" name="email" placeholder="Insira seu email" required>
              
            </div>
            <div class="form-group">
             
              <label><span class="glyphicon glyphicon-eye-open"></span> Senha</label>
              <input type="password" class="form-control" name="senha" placeholder="Insira a Senha" required>
              <br>
            </div>
             
              <button type="submit" class="btn btn-dark btn-block"><span class="glyphicon glyphicon-off"></span>Entrar</button>
          </form>
       </div>
   </main>
    <?php
     include_once 'footer.php';
     ?>
</body>
