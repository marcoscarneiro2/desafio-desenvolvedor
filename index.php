
<body>
    <?php
     include_once 'navbar.php';
     ?> 
       <?php if(isset($_SESSION["mensagem"])):
   print $_SESSION["mensagem"];
   unset($_SESSION["mensagem"]);
endif; ?>  
   <main class="total">
     
   </main>
    <?php
     include_once 'footer.php';
     ?>
</body>
