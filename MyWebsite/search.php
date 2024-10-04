<?php

#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao

if($_SERVER["REQUEST_METHOD"] == "POST") {
        $identificador = $_POST["identificador"];
        $valor_identificador = $_POST["valor_identificador"];

        strtolower($identificador);
        strtolower($valor_identificador);

               
        

    try{
        require "includes/dbh.inc.php";
        
        $query = "SELECT * FROM `testedb` WHERE :identificador = :valor_identificador;";
        
        $stmt= $pdo->prepare($query);
        
        $stmt->bindParam(":identificador",$identificador);
        $stmt->bindParam(":valor_identificador",$valor_identificador);
        


        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

        
    }   catch(PDOException $e) {
        die("Query falhou: " .$e->getMessage());

    }
} else {
    header("Location: ../index.php");
}

?>



<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8-br">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="css/search.css">
    </head>
 
    <img id="logo_on_page"src="imgs\logo.png" alt="Logotipo da SBT">
    <br>
        <h3>Resultados</h3>


       <form action = "includes/dispositivo_busca.inc.php" method = "POST">
            <p>Insira o identificador que você tem e valor dele. Exemplo, tenho apenas o patrimonio do dispositivo. 
            "patrimonio" e "548622"
            </p>
            <div id=box_form>
            <input type ="text" name="identificador" placeholder="Identificador">
            <input type ="text" name="valor_identificador" placeholder="Valor,ou número,ou sérial etc">
            <button class= "buttn">Buscar</button>
            </div>
        </form>
        
    
        
        
        <?php
        if(empty($results)){
            echo "<div>";
            echo "<p>Não há dados sobre o dispositivo especificado</p>";
            echo "<div>";
        } else{
            foreach($results as $row){
                echo "<div class='bloco_resultados>";
                
                echo "<h4>".htmlspecialchars($row["patrimonio"])."</h4>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["numero_de_serie"])."</p>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["marca"])."</p>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["modelo"])."</p>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["categoria"])."</p>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["localizacao"])."</p>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["status_device"])."</p>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["observacao"])."</p>";
                echo "<br>";
                

                echo "</div>";
#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao                
            }
        }
        ?>
         
         <?php
            $con = mysqli_connect("127.0.0.1","root","","vtdb_controle","3306");
            

        ?> 
    </body>
    
    <footer></footer>
</html>