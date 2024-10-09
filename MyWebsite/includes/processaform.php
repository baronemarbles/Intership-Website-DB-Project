
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

            $patrimonio=$results['patrimonio'];
            $numero_de_serie=$results['numero_de_serie'];
            $marca=$results['marca'];
            $modelo=$results['modelo'];
            $categoria=$results['categoria'];
            $localização=$results['localização'];
            $status_device=$results['status_device'];
            $observacao=$results['observacao'];

    echo $identificador;
    echo $valor_identificador;

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
        <title>Resultados</title>
        <link rel="stylesheet" href="../css/resultados.css">
    </head>
 
<body>
    <img id="logo_on_page"src="../imgs\logo.png" alt="Logotipo da SBT">
        <h1 class="bebas-neue-regular ">Resultados: </h1>

        <!--Resultados-->
    <br>
   


        <h3>Dispositivo encontrado</h3>

        <!--patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao -->
        <div class="centralized">
            <form action = "includes/dispositivo.inc.php" class ="form"method = "POST">
                    <label for="patrimonio">Patrimonio:</label>    
                    <input type = "text" name="patrimonio" id="patrimonio" placeholder="Patrimônio" value="<?php echo $patrimonio; ?>">
                    
                    <label for="numero_de_serie">Numero de Série:</label>    
                    <input type ="text" name="numero_de_serie" id= "numero_de_serie" placeholder="Número de Série" value="<?php echo $numero_de_serie;?>">
                    
                    <label for="marca">Marca:</label>    
                    <input type ="text" name="marca" id="marca" placeholder="Marca" value="<?php echo $marca; ?>">
                    
                    <label for="modelo">Modelo:</label>    
                    <input type ="text" name="modelo" id= "modelo" placeholder="Modelo" value="<?php echo $modelo;  ?>">
                    
                    <label for="categoria">Categoria:</label>    
                    <input type ="text" name="categoria" id="categoria" placeholder="Categoria" value="<?php echo $categoria; ?>">
                    
                    <label for="localizacao">Localização:</label>    
                    <input type ="text" name="localizacao" id="localizacao" placeholder="Localização" value="<?php echo $localizacao; ?>">
                    
                    <label for="status_device">Estado do dispositivo:</label>    
                    <input type ="text" name="status_device" id="status_device" placeholder="Estado do dispositivo" value="<?php echo $status_device ;?>">
                    
                    <label for="observacao">observacao:</label>    
                    <input type ="text" name="observacao" id="observacao" placeholder="Observação" value="<?php echo $observacao ?>">

                    <div id="buttns_container">
                    <button class="buttn"id="bttn_update">Atualizar</button>
                    <button class="buttn" id="bttn_deletar"></button>
                    </div>
            </form>
        </div>


        <br>

        
            <br>
            <div id="back_buttn"><a href="../index.php"><button id="bk_buttn">Voltar</button></a></div>
            

    </body>
    
    <footer></footer>
</html>
