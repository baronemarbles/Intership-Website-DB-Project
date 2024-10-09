

<?php
#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificador = $_POST["identificador"];
    $valor_identificador = $_POST["valor_identificador"];

    strtolower($identificador);
    strtolower($valor_identificador);

           
    

try{
    require "dbh.inc.php";
    
    $query = "SELECT * FROM testedb WHERE $identificador = :valor_identificador;";
    
    $stmt= $pdo->prepare($query);
    

    $stmt->bindParam(":valor_identificador",$valor_identificador);
    echo $query;


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

<!--começo html-->

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8-br">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Resultados</title>
        <link rel="stylesheet" href="../css/resultados.css">
    </head>
 
<body>
    <img id="logo_on_page"src="../imgs\logo.png" alt="Logotipo da SBT">
        <h1 class="bebas-neue-regular ">Resultados: </h1>

        <!--Resultados-->
    <br>
   
         <?php
            $con = mysqli_connect("127.0.0.1","root","","vtdb_controle","3306");
            echo "<br>";
            echo $identificador;
            echo $valor_identificador."<br>";
            echo $query;

            
        ?> 


<?php

if(empty($results)){
    echo "<div>";
    echo "<p>Não há dados sobre o dispositivo especificado</p>";
    echo "<div>";
} else{
    foreach($results as $row){
       
        echo"<div class='container'>";
        echo "<p class='p_resultados'><a class='legenda'>Patrimonio</a>    ".htmlspecialchars($row["patrimonio"])."</p>";
        echo "<p class='p_resultados'><a class='legenda'>Número de Série</a>".htmlspecialchars($row["numero_de_serie"])."</p>";
        echo "<p class='p_resultados'><a class='legenda'>Marca<a/>".htmlspecialchars($row["marca"])."</p>";
        echo "<p class='p_resultados'><a class='legenda'>Modelo<a/>".htmlspecialchars($row["modelo"])."</p>";
        echo "<p class='p_resultados'><a class='legenda'>Categoria<a/>".htmlspecialchars($row["categoria"])."</p>";
        echo "<p class='p_resultados'><a class='legenda'>Localização<a/>".htmlspecialchars($row["localizacao"])."</p>";
        echo "<p class='p_resultados'><a class='legenda'>Estado do Dispositivo<a/>".htmlspecialchars($row["status_device"])."</p>";
        echo "<p class='p_resultados' id='ultimo'><a class='legenda'>Observação<a/>".htmlspecialchars($row["observacao"])."</p>";
        echo "</div>";

       
#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao                
    }
}

?>
    <br>
    <div id="back_buttn"><a href="../index.php"><button id="bk_buttn">Voltar</button></a></div>
    

    </body>
    
    <footer></footer>
</html>