<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<script src="<?php echo (base_url('assets/js/login.js')) ?>" type="text/javascript"></script>
<!-- <link rel="stylesheet" type="text/css" href="<?php //echo (base_url('assets/css/defaultHome.css')) ?>" /> -->
<style>

    :root{
        --azul: #129BDB;
    }

	.row {
		display: flex;
		flex-direction: row;
		margin: 0 auto;
	}

	.loginBg {
		position: fixed;
		top: 0;
		left: 0;
		background: linear-gradient(180deg, rgba(255, 255, 255, 1) 0%, rgba(189, 228, 255, 1) 100%);
		width: 100%;
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		overflow: hidden;
	}

	.loginBx {
		width: 500px;
		height: 600px;
		background-color: #f4f4f4;
		/* border: 1px solid lightgray; */
		border-radius: 1rem;
		box-shadow: 0px 10px 10px #0000003b;
		display: flex;
		flex-direction: column;
	}

	.loginBx img {
		width: 150px;
		height: 150px;
		margin: 30px auto;
	}

	.loginBx input {
		margin: 0px 40px 20px 40px;
		background-color: rgba(100, 100, 100, 0.1);
		padding: 1rem;
		border-radius: .75rem;
		border: none;
	}

	.loginBx span {
		margin: 0px 50px 4px 50px;
		font-size: 10pt;
	}

	.loginBx h1 {
		font-weight: 600;
		color: #000;
	}

	.loginBx p {
		color: #7d7d7d;
		font-size: .9rem;
		margin-bottom: 1.25rem;
	}

	.btn {
		border-radius: 2rem;
		font-weight: 800;
		padding: 1rem 2rem;
		margin: 1rem;
	}

	.userlog {
        border:none;
		background-color: var(--azul);
		color: white;
        cursor:pointer;
        transition: 0.3s;
	}
    .userlog:hover{
        filter:brightness(1.25);
    }

	.uservisit {
		border: 1px solid var(--azul);
		color: var(--azul);
	}
</style>
<script>

</script>
<section class="loginBg">
	<div class="loginBx" name="form_login" id="form_login">
		
        <img src="<?php echo (base_url('assets/IBF-Logo.png')) ?>">
		
        <div style="margin:0 40px;">
			<h1>Login</h1>
			<p>Crie sua conta <a href="#">aqui</a></p>
		</div>
		
        <span> E-mail </span>
		
        <input class="campo-usuario" id="email" name="email" type="email" placeholder="Insira seu E-mail">

		<span> Senha </span>

		<input class="campo-usuario" id="senha" name="senha" type="password" placeholder="Insira sua Senha">
		
        <div class="row">
			
			<button id="btn-logar" class="btn userlog">Entrar</button>
			
		</div>
	</div>
</section>