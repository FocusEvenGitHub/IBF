<?php 
if (empty($idUsuario)){
    $idUsuario = $this->session->id_usuario;
}
?>

<header class="boas-vindas" style="height:5rem;">
    <div>
        <p> <?= $title ?> </p>
    </div>
    <div style="align-items: center; display: flex;">
        <a class="logout" href="<?php echo (base_url('logout')) ?>" style="margin-right: 1rem;">
            <i class="fa-solid fa-right-from-bracket"></i>
            <b>Deslogar</b>
        </a>
        <a href="<?php echo (base_url('user/config')) ?>">
            <i class="fas fa-cog" data-toggle="tooltip" data-placement="bottom" title="Configuração"></i>
        </a>
    </div>

</header>