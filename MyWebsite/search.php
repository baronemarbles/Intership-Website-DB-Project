<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8-br">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="css/search_correct.css">
    </head>
 
<body>
    <img id="logo_on_page"src="imgs\logo.png" alt="Logotipo da SBT" >
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



        <!--Criando o menu de busca-->
    <br>


    <div class="centralized">
       <form action = "includes/search_h.php" method = "POST">
            <p>Insira o filtro que você deseja e valor dele. <br> <a id="Highlights">Os filtros devem ser passados exatamente como listados abaixo!</a></p>
            <pre><a id="highlight_search_example">patrimonio | numero_de_serie | marca | modelo | categoria | localizacao | status_device | observacao</a></pre> 

            </p>
            <div id=box_form>
            <br>
            <input type ="text" name="identificador" placeholder="Identificador">
            <input type ="text" name="valor_identificador" placeholder="Valor,ou número,ou sérial etc">
            <div class="checkbox_container"></div>
            <input type="checkbox" name="check_tudo" value="1" id="check_tabela_toda"> <label for="check_tabela_toda">Exibir a tabela inteira sem filtro</label>
            </div>
            
            <button class= "buttn">Buscar</button>
            
        </form>
    </div>

                
               
       


    </body>
    
    <footer></footer>
</html>