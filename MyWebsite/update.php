<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8-br">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Dispositivos VTV</title>
        <link rel="logo" href="/imgs/logo.png" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="css/update.css">
        <script src="/javascript/navmenu.js"></script>
    </head>
    
    <body>
        
        <img id="logo_on_page"src="imgs\logo.png" alt="Logotipo da SBT">
        <h1 class="bebas-neue-regular ">Dispositivos vtv</h1>
        
        
        <!-- Criando o menu de navegação-->

        <div class="navmenu" id="firstnavmenu">
            <a class=".bebas-neue-regular" href="index.php" class="active" id="registrar">Registrar</a>
            <a class=".bebas-neue-regular" href="update.php" id="atualizar">Atualizar</a>
            <a class=".bebas-neue-regular" href="delete.php" id="deletar">Deletar</a>
            <a class=".bebas-neue-regular" href="search.php" id="buscar">Buscar</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>

        <br>

        <h3>Atualize o Dispostivo</h3>

        <div class="centralized">
            <form action = "includes/dispositivoupdate.inc.php" method = "POST">
                <input type = "text" name="campo" placeholder="Coluna do campo">
                <input type ="text" name="patrimonio" placeholder="Patrimônio">
                <input type ="password" name="val_atual" placeholder="Valor Atual">
                <input type ="text" name="val_novo" placeholder="Novo valor">
                <button class="buttn">Atualizar</button>
            </form>

        </div>

        <?php
            $con = mysqli_connect("127.0.0.1","root","","vtdb_controle","3306");
            

        ?> 
    </body>
    
    <footer></footer>
</html>