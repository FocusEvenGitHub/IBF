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

</head>

<body>
    <main>

    <div class="miolo">

        <section class="destaques">
            
            <p>Resumo das suas atividades</p>
            
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