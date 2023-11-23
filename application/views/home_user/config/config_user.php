<style >
    main{
        padding: 5rem;
    }
    .column{
        display: flex;
        flex-direction: column;
    }
    .title{
        border-radius: 4rem;
        padding: 5rem;
        background-color: lightgrey;
        margin-bottom: 1rem;
    }
    .title span, .title span i{
        font-size: 3rem;
    }
    .card{
        border-radius: 1rem;
        padding: 2rem;
        background-color: lightgray;
        border: none;
        width: 30%!important;
    }
    .fa-arrow-circle-right{
        font-size: 3rem;
    }
    .hover-fa:hover{
        color: #129bdb;
    }
</style>
<main>
    <div class="mt-4 row">
        <div class="m-auto card user_card" data-toggle="tooltip" data-placement="top" title="Gerenciar dados da sua conta">
            <span><i class="fas fa-user"></i> Dados da conta</span>
            <div class="mt-4" style="justify-content:center; display:flex;">
                <a href="config_conta">
                    <i class="m-auto hover-fa fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="m-auto card user_card" data-toggle="tooltip" data-placement="top" title="Gerenciar Permissões dos Usuários">
            <span><i class="fas fa-user-plus"></i> Permissões</span>
            <div class="mt-4" style="justify-content:center; display:flex;">
                <a href="config_perm">
                    <i class="m-auto hover-fa fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>


    <div class="mt-4 row">
        <div class="m-auto card user_card" data-toggle="tooltip" data-placement="top" title="Gerenciar configurações dos Ministérios">
            <span><i class="fas fa-layer-group"></i> Ministérios</span>
            <div class="mt-4" style="justify-content:center; display:flex;">
                <a href="config_minsterios">
                    <i class="m-auto hover-fa fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="m-auto card user_card" data-toggle="tooltip" data-placement="top" title="Gerenciar configurações dos Cursos da Universidade da Familia">
            <span><i class="fas fa-graduation-cap"></i> Cursos UDF</span>
            <div class="mt-4" style="justify-content:center; display:flex;">
                <a href="config_udf">
                    <i class="m-auto hover-fa fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>    
    <div class="mt-4 row">
        <div class="m-auto card user_card" data-toggle="tooltip" data-placement="top" title="Gerenciar configurações dos Ministério Infantil Filadélfia">
            <span><i class="fas fa-baby"></i> MIF</span>
            <div class="mt-4" style="justify-content:center; display:flex;">
                <a href="config_mif">
                    <i class="m-auto hover-fa fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</main>