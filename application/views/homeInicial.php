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

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,500;0,700;0,900;1,100;1,300;1,500;1,700;1,900&display=swap');
    </style>

    <!-- CSS PRINCIPAL -->

    <style>
        
        body{
            font-family: 'Poppins';
        }

        *{
            margin: 0;
            padding: 0;
        }

        :root{
            --azul-destaque: #129bdb;
            --azul-hover: #0f75a4;
        }
        


        .cabecalho{
            padding: 0 1rem ;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1rem ;
        }

        .cabecalho-esquerdo{
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .cabecalho-esquerdo .logo{
            max-width: 3rem;
            filter: saturate(0);
            filter: brightness(0);

        }

        .cabecalho-esquerdo p{
            font-size: 1rem;
        }

        .cabecalho-direito p{
            font-size: 1rem;
            font-weight: 500;
            color: var(--azul-destaque);
        }

        .boas-vindas{
            width: auto;
            text-align: center;
            background-color: #f2f2f2;
            padding: 1rem 0;
        }

        .boas-vindas p{
            color: var(--azul-destaque);
            font-weight: 600;
            font-size: 1.5rem;
        }

        .destaques{
            width: auto;
            margin: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .destaques p{
            font-size: 1.75rem;
        }

        .destaques-carrossel{
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            overflow: auto;
            white-space: nowrap;
            scroll-behavior: smooth;
        }

        ::-webkit-scrollbar {
            width: .75rem;

        }
        ::-webkit-scrollbar-track {
            border-radius: 100px;
            transition: 0.3s;
            width: 0.25rem;
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #727272; 
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #525252;
             
        }
        ::-webkit-scrollbar:horizontal {
            height: .75rem;
             /* Altura da barra de rolagem horizontal */
        }

        ::-webkit-scrollbar-thumb:horizontal {
            background-color: var(--azul-destaque); 
            border-radius: 5rem; 
        }
        ::-webkit-scrollbar-thumb:hover:horizontal {
            background-color: var(--azul-hover);
        }    
        ::-webkit-scrollbar-track:horizontal {
            background-color: #f1f1f1; 
        }

        .destaques-carrossel img{
            border-radius: 1rem;
            width: 40%;
        }

        .contribui{
            margin: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.5rem;
        }

        .contribui div{
            margin: 1rem 0;
            padding: 1.5rem 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 1rem;
            gap: 1rem;
            box-shadow: 0px 0px 25px #727272;
        }

        .contribui div p{
            font-size: 1rem;
        }

        .icone{
            width: 3rem;
        }

        .info-cultos{
            margin: 1rem 0;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: .75rem;
        }

        .fundo-cultos{
            max-width: 100%;
            padding: 1.25rem 6rem;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            box-shadow: 0px 0px 8px #a0a0a0;
            border-radius: .25rem;
        }

        .fundo-cultos div{
            font-size: 1rem;
        }

        .fundo-cultos img{
            aspect-ratio: 1/1;
            object-fit: contain;
            max-width: 4rem;
        }
        .horarios-cultos {
            justify-content: space-between;
            display: flex;
            width: 40vw;
            max-width: 30rem;
        }

    </style>

    <!-- CSS RESPONSIVO -->

    <style>
        
        body{
            font-family: 'Poppins';
        }
        
        @media(min-width: 290px) and (max-width: 514px){

            .cabecalho{
                display: flex;
                justify-content: space-between;
                margin: 1rem 1.2rem;
            }

            .cabecalho-esquerdo{
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .cabecalho-esquerdo .logo{
                width: 1.5rem;
                filter: saturate(0);
                filter: brightness(0);

            }

            .cabecalho-esquerdo p{
                font-size: 0.85rem;
            }

            .cabecalho-direito p{
                font-size: .85rem;
                font-weight: 500;
                color: var(--azul-destaque);
            }

            .boas-vindas{
                width: auto;
                text-align: center;
                background-color: #f2f2f2;
                padding: 1rem 0;
            }

            .boas-vindas p{
                color: var(--azul-destaque);
                font-weight: 600;
            }

            .destaques p{
                font-size: 1.25rem;
            }

            .destaques-carrossel{
                overflow: auto;
                white-space: nowrap;
            }

            .destaques-carrossel img{
                width: 90%;
            }

            .contribui{
                display: flex;
                gap: 1rem;
            }

            .contribui div{
                padding: 1rem 1.1rem;
                box-shadow: 0px 5px 10px #929292;
            }

            .contribui div img{
                width: 2rem;
            }

            .contribui div p{
                font-size: 1rem;
            }

            .info-cultos{
                margin: 1rem 0;
                width: 100%;
                display: flex;
                flex-direction: column;
                gap: .5rem;
        }

        .horarios-cultos{
            padding: 1rem 3rem;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 0px 8px #a0a0a0;
            border-radius: .75rem;
            min-width: 14rem;
        }

        .horarios-cultos div{
            font-size: .75rem;
        }

        .horarios-cultos img{
            max-width: 3.5rem;
        }
        }

    </style>
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