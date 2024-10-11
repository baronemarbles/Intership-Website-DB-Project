<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8-br">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Dispositivos VTV</title>
        <link rel="logo" href="/imgs/logo.png" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="css/index.css">
        <script src="/javascript/navmenu.js"></script>
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


        <!--Criando o formulário de registro -->

        <h3>Registre o dispositivo</h3>

        <!--patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao -->
         <div class="centralized">
            <form action = "includes/dispositivo.inc.php" class ="form"method = "POST">
                <input type = "text" name="patrimonio" placeholder="Patrimônio" required>
                <input type ="text" name="numero_de_serie" placeholder="Número de Série" required>
                <input type ="text" name="marca" placeholder="Marca" required>
                <input type ="text" name="modelo" placeholder="Modelo" required>
                <input type ="text" name="categoria" placeholder="Categoria" required>
                <input type ="text" name="localizacao" placeholder="Localização" required>
                <input type ="text" name="status_device" placeholder="Estado do dispositivo" required>
                <input type ="text" name="observacao" placeholder="Observação" required>
                <button class="buttn">Registrar</button>
               
            </form>
        </div>
   

        <br>


        <?php
            $con = mysqli_connect("127.0.0.1","root","","vtdb_controle","3306");
            

        ?> 

    <!-- Criação do Script para não permitir--->
    <!-- que não envie o formulário váizio. -->     
        <script>
                    const form = document.querySelector('form');
                    const input =  document.querySelector('input');

                    form.addEventListener('submit',function(event) {
                        event.preventDefault();

                        if(input.value.trim()===''){
                            alert('Por favor preencha os campos!');
                        } else {
                            form.submit();
                        }
                        
                    });
                </script>
    </body>
    
    <footer></footer>
</html>