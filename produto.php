 <?php
     include_once 'navbar.php';
if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            }   
     ?> 
<script>
function checkDelete(){
    return confirm('Tem certeza que deseja excluir o produto?');
}
</script>
<script>
function checkComprar(){
    return confirm('Tem certeza que deseja comprar o produto?');
}
</script>

<body>
   <main class="total"> 
<div class="container"> 
<div class="container col-11 table-responsive">
<br><br>
       <h2>Produtos</h2>
        <div class="border2"></div>
            <form style="width:300px;margin-bottom:1%;color:white">
             Buscar:
            <input type="text" name="nome_produto" placeholder="Digite o nome do produto" class="form-control"><br>
            <input  style="height:40px;background:#8b4513;color:white" type="submit"  value="Buscar" class="btn btn-default">
        </form>
        
         <!--Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina--> 
          <?php
            
            if(isset($_GET["nome_produto"]))
            {
                $nome_produto = $_GET["nome_produto"];
                include_once 'connecao.php';
                $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                //Selecionar todos os produtos da tabela
                $sql = "SELECT * FROM produto where nome_produto like '%$nome_produto%' order by nome_produto";
                $result = mysqli_query($con, $sql);
                //Contar o total de produtos
                $total = mysqli_num_rows($result);
                //Seta a quantidade de produtos por pagina
                $quantidade_pg = 50;
                //calcular o número de pagina necessárias para apresentar os produtos
                $num_pagina = ceil($total/$quantidade_pg);
                //Calcular o inicio da visualizacao
                $incio = ($quantidade_pg*$pagina)-$quantidade_pg;
                
                
                if($total > 0){
                    echo "<table class='table table-condensed' id='tabela' style='width:100%;border-radius: 15px 15px 15px 15px';
                         <tr>
                            <th>Nome</th>
                         </tr>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>{$row['nome_produto']}</td>";
                       
                        echo "<td><button title='Comprar' class='btn btn-default'><a style='color:green' href='comprar.php? IDproduto=" . $row['IDproduto'] . "'onclick='return checkComprar()'><i class='fas fa-cart-plus'></i></a></button>";
                         
                        if($_SESSION['nivel'] == 1){ 
                        echo "<td><button title='Alterar' class='btn btn-default'><a style='color:orange' href='alterarItem.php?IDproduto=" . $row['IDproduto'] . "'onclick='return'><i class='fas fa-edit'></i></a></button>";
                            
                        echo "<td><button title='Excluir' class='btn btn-default'><a style='color:red' href='deleteItem.php? IDproduto=" . $row['IDproduto'] . "'onclick='return checkDelete()'><i class='fas fa-trash-alt'></i></a></button>";
                        }
                        
                        echo "</tr>";
                        
                    }
                    echo"</table>";
                    echo"<b style='color:black'>Total de Registros encontrados: ".$total."</b>";
                }else{
                    echo "<b style='color:black'>Não há produtos com esse nome</b>";
                }
            }
                             
            ?>                                
       </div>
            </div> 
 
   
   </main>
    
      <?php
     include_once 'footer.php';
     ?>  
</body>