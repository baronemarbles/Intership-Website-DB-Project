<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8-br">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Dispositivos VTV</title>
        <link rel="logo" href="/imgs/logo.png" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="css/teste_atualizar.css">
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

        
    <br>

 <!--Criando o menu de busca-->
        <div class="centralized">
        <form action = "includes/processaform_update.php" method = "POST">
                <p>Encontre o dispositivo a ser alterado  <a id="Highlights"></a><br>
                <pre id="highlight_search_example" >E depois faça suas alterações.</pre> 
                </p>
                <div id=box_form>
                <input type ="text" name="patrimonio" placeholder="Patrimônio" required>
                <button class= "buttn">Encontrar</button>
            </form>
        </div>


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