 <?php
     include_once 'navbar.php';
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            } 
     ?> 

<body>
   <main class="total"> 
<div class="container"> 
<div class="container col-11 table-responsive">
<br><br>
       <h2>Nomes Cadastrados</h2>
        <div class="border2"></div>
            <form style="width:300px;margin-bottom:1%;color:white">
             Buscar:
            <input type="text" name="nome" placeholder="Digite o nome" class="form-control"><br>
            <input  style="height:40px;background:#8b4513;color:white" type="submit"  value="Buscar" class="btn btn-default">
        </form>
        
         <!--Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina--> 
          <?php
            
            if(isset($_GET["nome"]))
            {
                $nome = $_GET["nome"];
                include_once 'connecao.php';
                $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                $sql = "SELECT * FROM agenda INNER JOIN cliente on agenda.IDcliente=cliente.IDcliente INNER JOIN produto on agenda.IDproduto=produto.IDproduto and nome LIKE '%$nome%' order by data";
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
                            <th>Nome do cliente</th>
                            <th>Produto</th>
                            <th>data</th>
                            <th>hora</th>
                            <th>Situação Atual</th>
                         </tr>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>{$row['nome']}</td>";
                        echo "<td>{$row['nome_produto']}</td>";
                        echo "<td>{$row['data']}</td>";
                        echo "<td>{$row['hora']}</td>";
                        echo "<td>{$row['situacao_atual']}</td>";                          
                        echo "</tr>";
                    }
                    echo"</table>";
                    echo"<b style='color:black'>Total de Registros encontrados: ".$total."</b>";
                }else{
                    echo "<b style='color:black'>Não há cliente com esse nome</b>";
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