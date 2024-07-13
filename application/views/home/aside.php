<?php require_once('header.php'); ?>
<aside class="aside">
    <div class="logo-header cabecalho-esquerdo">
            <a href="<?php echo (base_url()) ?>" style="color: inherit; text-decoration: none;" >
                <span style="height:3rem; margin: 1rem; margin-left: 2rem; width: -webkit-fill-available;">
                    <img class="logo" src="<?php echo (base_url('assets/img/IBF-Logo.png'))?>" alt="Logo da IBF">
                    <p>Igreja Batista Filadélfia</p>
                </span>
            </a>
            <a id="nav_home" href="<?php echo (base_url ('home_user')) ?>" class="nav">
                <span>
                    <i class="fas fa-home"></i>Início
                </span>
            </a>
            <a id="nav_minis" href="<?php echo (base_url ('user/ministerios')) ?>" class="nav">
                <span>
                    <i class="fas fa-user-friends"></i>Ministérios
                </span>
            </a>
            <a id="nav_ebd" href="#" class="nav">
                <span>
                    <i class="fas fa-book-open"></i>EBD
                </span>
            </a>
            <a id="nav_cursos" href="#" class="nav">
                <span>
                    <i class="fas fa-graduation-cap"></i>Cursos
                </span>
            </a>
            <a id="nav_mif" href="#" class="nav">
                <span>
                    <i class="fas fa-child"></i>MIF
                </span>
            </a>
    </div>
    </aside>
<?php require_once('boasvindas.php'); ?>