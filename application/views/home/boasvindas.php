<header class="boas-vindas">
        <div>
            <p> <?= $title ?> </p>
        </div>
        <div style="align-items: center; display: flex;">
        <a class="logout" href="<?php echo (base_url ('logout')) ?>" style="margin-right: 1rem;">
            <i class="fa-solid fa-right-from-bracket"></i>
            <b>Deslogar</b>
        </a>
            <a href="<?php echo (base_url ('user/config')) ?>">
                <i class="fas fa-cog"  data-toggle="tooltip" data-placement="bottom" title="Configuração"></i>
            </a>
        </div>

    </header>