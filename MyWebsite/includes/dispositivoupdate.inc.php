<?php

#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao

if($_SERVER["REQUEST_METHOD"] == "POST") {
        $campo = $_POST["campo"];
        $val_atual = $_POST["val_atual"];
        $val_novo = $_POST["val_novo"];
        $patrimonio = $_POST["patrimonio"];
        
       
        

        try{
            require "dbh.inc.php";
            $query = "SELECT :campo from testedb where :patrimonio = :val_atual;";
            #$check_campo_antigo = "SELECT :campo from testedb where :campo = :val_atual AND patrimonio = $get_patrimonio;";
        
            $stmt= $pdo->prepare($query);
            $stmt->bindParam(":campo",$campo);
            $stmt->bindParam(":patrimonio",$patrimonio);
            $stmt->bindParam(":val_atual",$val_atual);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($results as $row){
                echo "<p class='p_resultados'>".htmlspecialchars($row)."</p>";
        
            }
            if(isset($results)==true && $results==$val_atual){
                $update = "UPDATE testedb SET :campo= ':val_novo' where patrimonio=':patrimonio'";
                $updt=$pdo->prepare($update);
                $updt->bindParam(":campo",$campo);
                $updt->bindParam(":val_novo",$val_novo);
                $updt->bindParam(":patrimonio",$patrimonio);
                $updt->execute();
            }
           
            /*
                if($get_patrimonio==$val_atual){
                    $query = "UPDATE testedb SET :valor_atual = :val_novo;";


                    $stmt=$pdo->prepare($query);

                    $stmt->bindParam(":valor_atual", $val_atual);
                    $stmt->bindParam(":val_novo",$val_novo);
        

                    $stmt->execute();

                    $pdo = null;
                    $stmt = null;

                    header("//location:index.php");
                }   else{ die();
                        }
    
        */
        
        
    
    
        
            $pdo = null;
            $stmt = null;

           /* header("Location: ../index.php");  */  
            die();
        } catch(PDOException $e) {
            die("Query falhou: " .$e->getMessage());

                }
} else {
    header("Location: ../index.php");
}