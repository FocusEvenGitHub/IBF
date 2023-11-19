<?php
defined('BASEPATH') or exit('No direct script access allowed');
$nome = $this->session->userdata('nome');

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
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo (base_url ('assets/css/homeInicial.css' )) ?>"> -->
    <style>
        body{
            display: flex;
            flex-direction: row;
        }
        main{
            width: 100%;
        }
        header{
            display:flex;
            flex-direction:row;
            justify-content: space-around;
            align-items: center;
        }
        .aside{
            width: 355px;
            min-width: 5vw;
            height: 100%;
            background-color: #d5d0e1;
        }
        .logo-header{
            display: flex;
            flex-direction:column;
            gap: 0;
            overflow: hidden;
        }
        .logout{
            background-color: lightgray;
            padding: 0.5rem;
            border-radius: 0.8rem;
            transition: all 1s;
            border:1px solid transparent;
        }
        .logout:hover{
            border: 1px solid black;
        }
        span{
            display: flex;
            width: 100%;
            align-items: center;
        }
        span img, span i{
            margin-right: 1rem;
        }
        .nav{
            width:100%;
            padding: 2rem;
            background-color: #1a4f69;
            color: #dcf8ff;
            transition: all 0.5s;
        }
        .nav:hover{
            color: white;
            background-color: #6783df;
        }
        .active{
            color: #000;
            background-color: #fff;
        }
        span i{
            font-size: 16pt;
        }
    </style>
</head>

<body>
    <main>
    
    <header class="boas-vindas">
        <div>
            <p>Ministérios</p>
        </div>
        <div>
        <a class="logout" href="<?php echo (base_url ('logout')) ?>" style="margin-right: 1rem;">
            <i class="fa-solid fa-right-from-bracket"></i>
            <b>Deslogar</b>
        </a>
            <i class="fas fa-cog"  data-toggle="tooltip" data-placement="bottom" title="Configuração"></i>
        </div>

    </header>

    <div class="miolo">

        <section class="destaques">
            
        <p>Ministérios que participa</p>
            
        </section>

        <section class="contribui">
        
            <div>
                <img class="icone" src="<?php echo (base_url('assets/img/icone noticia.png'))?>" alt="ícone de notícias">
                <p>Louvor</p>
            </div>
            
            <div>
                <img class="icone" src="<?php echo (base_url('assets/img/icone oracao.png'))?>" alt="ícone de oração">
                <p>Comunicação</p>
            </div>
            
            <div>
                <img class="icone" src="<?php echo (base_url('assets/img/icone doacao.png"'))?>" alt="ícone de Doação">
                <p>Recepção</p>
            </div>
        </section>

        <section class="destaques">
            
            <p>Ministérios que pode participar</p>
            
            <div class="contribui">
            <div>
                <img class="icone" src="<?php echo (base_url('assets/img/icone noticia.png'))?>" alt="ícone de notícias">
                <p>Louvor</p>
            </div>
            
            <div>
                <img class="icone" src="<?php echo (base_url('assets/img/icone oracao.png'))?>" alt="ícone de oração">
                <p>Comunicação</p>
            </div>
            
            <div>
                <img class="icone" src="<?php echo (base_url('assets/img/icone doacao.png"'))?>" alt="ícone de Doação">
                <p>Recepção</p>
            </div>
            </div>

        </section>
      

    </div>
    </main>
</body>
</html>