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
            width: 300px;
            min-width: 5vw;
            height: 100%;
            background-color: #d5d0e1;
        }
        .logo-header{
            padding: 1rem;
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
    </style>
</head>

<body>
    <aside class="aside">
    <div class="logo-header cabecalho-esquerdo">
        	<link rel="icon" href="<?php echo (base_url ('assets/IBF_logo.png' )) ?>" type="image/x-icon">

            <img class="logo" src="<?php echo (base_url('assets/img/IBF-Logo.png'))?>" alt="Logo da IBF">
            
            <p>Igreja Batista Filadélfia</p>
        </div>
    </aside>
    <main>
    
    <header class="boas-vindas">
        <p>Seja bem-vindo(a) <?=$nome?></p> 

        <a class="logout" href="<?php echo (base_url ('logout')) ?>">
            <b>Logout</b>
        </a>
    </header>

    <div class="miolo">

        <section class="destaques">
            
            <p>Ministérios</p>
            
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

      

    </div>
    </main>
</body>
</html>