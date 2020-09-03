<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Oliveira Trust</title>
    <link rel="stylesheet" href="style.css">
    <!--Bootstrap-->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!---Font Awesome--->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Oliveira Trust Teste</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="produto.php">Produtos</a>
      </li>
    </ul>
  </div>
                
            <?php
                        session_start();         

            ?>             
              
              <?php
              if(!isset($_SESSION['email'])):
                      
              ?>
              
              <a style="margin-right:5%" href="cadastro.php"><i style="color:red; font-size:40px" class="fas fa-user-secret"></i></a>
              
               <?php
             endif;
            ?> 
              
        
                      
            <?php
            if(isset($_SESSION['email'])): 
            ?>
             <div class="dropdown show" style="margin-right:5%">
          <i style="color:green; font-size:40px" class="fas fa-smile btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                 
 

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#" id="btnPerfil">Perfil</a>
     <?php 
            if($_SESSION['nivel'] == 1){ 
            ?>
    <a class="dropdown-item" href="logUser.php">Log de Usuário</a>
     <a class="dropdown-item" href="logProduto.php">produtos e cliente</a>
     <a class="dropdown-item" href="cadastrarItem.php">Criar Produtos</a>
    <?php }
            ?>
    <a class="dropdown-item" href="logout.php">Sair</a>
  </div>
</div>
            <?php
             endif;
            ?> 
                 
                          
  <!-- Modal -->
  <div class="modal fade" id="myModalPerfil" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div  class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button style="margin-left:-8px" type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Informações Pessoais</h4>
        </div>
        <div class="modal-body" style="padding:10px 40px;">
         
          <form role="form" action="perfil.php" method="GET">
            <div class="form-group">
             <br>
             <ul class="nav nav-pills">
              <li><h2 style="color:black;font-size:18px"><b>Nome:</b> <?php echo $_SESSION["nome"]; ?></h2> <span class="caret"></span></li>
             </ul><br>
             <ul class="nav nav-pills">
              <li><h2 style="color:black;font-size:18px"><b>Email:</b> <?php echo $_SESSION["email"]; ?></h2> <span class="caret"></span></li>
             </ul><br>
             <ul class="nav nav-pills">
              <li><h2 style="color:black;font-size:18px"><b>Telefone: </b> <?php echo $_SESSION["telefone"]; ?></h2> <span class="caret"></span></li>
             </ul>
            </div>
          </form>
      </div>
      
    </div>
  </div> 
       </div>
<script>
$(document).ready(function(){
  $("#btnPerfil").click(function(){
    $("#myModalPerfil").modal();
  });
});
</script>                                            
                  
</nav>
</html>