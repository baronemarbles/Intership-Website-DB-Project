

<?php
#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificador = $_POST["identificador"];
    $valor_identificador = $_POST["valor_identificador"];

    strtolower($identificador);
    strtolower($valor_identificador);

           
    

try{
    require "dbh.inc.php";
    
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
        <link rel="stylesheet" href="css/search_correct.css">
    </head>
 
<body>
    <img id="logo_on_page"src="imgs\logo.png" alt="Logotipo da SBT">
        <h1 class="bebas-neue-regular ">Dispositivos vtv</h1>
        
        
        <!-- Criando o menu de navegação-->

        <div class="navmenu" id="firstnavmenu">
            <a class=".bebas-neue-regular" href="index.php" class="active" id="registrar">Registrar</a>
            <a class=".bebas-neue-regular" href="update.php" id="atuaizar">Atualizar</a>
            <a class=".bebas-neue-regular" href="delete.php" id="deletar">Deletar</a>
            <a class=".bebas-neue-regular" href="search.php" id="buscar">Buscar</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>



        <!--Resultados-->
    <br>
   
        <!-- <#?php
            $con = mysqli_connect("127.0.0.1","root","","vtdb_controle","3306");

            
        ?> 
-->

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

    </body>
    
    <footer></footer>
</html>