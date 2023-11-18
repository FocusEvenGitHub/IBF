<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IBF</title>
    
    <!-- CSS DA FONTE -->
    <link rel="stylesheet" type="text/css" href="<?php echo (base_url ('assets/css/main/font.css' )) ?>">

    <!-- CSS PRINCIPAL -->
    <link rel="stylesheet" type="text/css" href="<?php echo (base_url ('assets/css/main/home.css' )) ?>">

    <!-- CSS RESPONSIVO - HomeInicial -->
    <link rel="stylesheet" type="text/css" href="<?php echo (base_url ('assets/css/homeInicial.css' )) ?>">

</head>

<body>
    <header class="cabecalho">
        
        <div class="cabecalho-esquerdo">
        	<link rel="icon" href="<?php echo (base_url ('assets/IBF_logo.png' )) ?>" type="image/x-icon">

            <img class="logo" src="<?php echo (base_url('assets/img/IBF-Logo.png'))?>" alt="Logo da IBF">
            
            <p>Igreja Batista Filadélfia</p>
        </div>

        <div class="cabecalho-direito">
            <a href="<?php echo (base_url ('login')) ?>">
                <p>Login</p>
            </a>
        </div>
    </header>
    
    <div class="boas-vindas">
        <p>Seja bem-vindo(a)</p>
    </div>

    <main class="miolo">

        <section class="destaques">
            
            <p>Os Destaques</p>

            <div class="destaques-carrossel">
                <img src="https://i.ytimg.com/vi/qFKoRVjdFeA/hqdefault.jpg?sqp=-oaymwEcCNACELwBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLBKnIItSPqDdi4Ogl0Yz2gRQ27ipg" alt="Banner ibf news">

                <img src="https://i.ytimg.com/vi/FbJNFfRsV5w/hqdefault.jpg?sqp=-oaymwEcCNACELwBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLAlk4WVC-n4h1sune1t-lOA5PjTig" alt="Banner de cursos">
                
                <img src="https://i.ytimg.com/vi/qFKoRVjdFeA/hqdefault.jpg?sqp=-oaymwEcCNACELwBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLBKnIItSPqDdi4Ogl0Yz2gRQ27ipg" alt="Banner ibf news">

                <img src="https://i.ytimg.com/vi/FbJNFfRsV5w/hqdefault.jpg?sqp=-oaymwEcCNACELwBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLAlk4WVC-n4h1sune1t-lOA5PjTig" alt="Banner de cursos">
                
                <img src="https://i.ytimg.com/vi/qFKoRVjdFeA/hqdefault.jpg?sqp=-oaymwEcCNACELwBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLBKnIItSPqDdi4Ogl0Yz2gRQ27ipg" alt="Banner ibf news">

                <img src="https://i.ytimg.com/vi/FbJNFfRsV5w/hqdefault.jpg?sqp=-oaymwEcCNACELwBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLAlk4WVC-n4h1sune1t-lOA5PjTig" alt="Banner de cursos">
            </div>
            
        </section>

        <section class="contribui">
        
            <div>
                <img class="icone" src="<?php echo (base_url('assets/img/icone noticia.png'))?>" alt="ícone de notícias">
                <p>Notícias</p>
            </div>
            
            <div>
                <img class="icone" src="<?php echo (base_url('assets/img/icone oracao.png'))?>" alt="ícone de oração">
                <p>Oração</p>
            </div>
            
            <div>
                <img class="icone" src="<?php echo (base_url('assets/img/icone doacao.png"'))?>" alt="ícone de Doação">
                <p>Doação</p>
            </div>
        </section>

        <section class="info-cultos">
            
            <div class="fundo-cultos">
                <div class="horarios-cultos">
                    <div>
                        <h3>Cultos</h3>
                        <p>Quarta-feira - 20h</p>    
                        <p>Domingo - 10h e 18h</p>
                    </div>
                
                <img src="<?php echo (base_url('assets/img/IBF-Logo.png"'))?>" alt="logo IBF">
                </div>
            </div>
            <div class="fundo-cultos">
                <div class="horarios-cultos">
    
                    <div>
                        <h3>Culto dos Jovens</h3>
                        <p>Sábado - 20h ás 22h</p>
                    </div>
                    
                    <img src="<?php echo (base_url('assets/img/logo prisma.png"'))?>" alt="logo Prisma">
                
                </div>
            </div>

            <div class="fundo-cultos">
                <div class="horarios-cultos">
                
                    <div>
                        <h3>Culto dos Adolescentes</h3>
                        <p>Sábado - 17h às 19h</p>
                    </div>

                    <img src="<?php echo (base_url('assets/img/logo adolas.png"')) ?>" alt="Logo Adolas">
                
                </div>
            </div>
        </section>
      

    </main>
</body>
</html>