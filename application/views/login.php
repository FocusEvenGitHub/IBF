<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('header.php');
?>
<script src="<?php echo (base_url('assets/js/login.js')) ?>" type="text/javascript"></script>
<!-- <link rel="stylesheet" type="text/css" href="<?php //echo (base_url('assets/css/defaultHome.css')) ?>" /> -->
<style>
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
		border: 1px solid lightgray;
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
		padding: 8px;
		border-radius: 1rem;
		border: 1px solid gray;
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
		font-size: 10pt;
		margin-bottom: 20px;
	}

	.btn {
		border-radius: 2rem;
		font-weight: 800;
		padding: 8px 24px;
		margin: 16px;
	}

	.userlog {
		border: 1px solid black;
		background-color: #1162ff;
		color: white;
	}

	.uservisit {
		border: 1px solid #1162ff;
		color: #1162ff;
	}
</style>
<script>

</script>
<section class="loginBg">
	<div class="loginBx" name="form_login" id="form_login">
		<img src="<?php echo (base_url('assets/IBF_logo.png')) ?>">
		<div style="margin:0 40px;">
			<h1>Login</h1>
			<p>Crie sua conta <a href="#">aqui</a></p>
		</div>
		<span> E-mail </span>
		<input id="email" name="email" type="email" placeholder="Insira seu E-mail">
		<span> Senha </span>
		<input id="senha" name="senha" type="password" placeholder="Insira sua Senha">
		<div class="row">
			<a style="cursor:pointer">
				<button id="btn-logar" class="btn userlog">Entrar<br>como usuário</button>
			</a>
			<a href="<?= base_url('convidado') ?>">
				<button id="btn-visita" class="btn uservisit">Entrar<br>como visitante</button>
			</a>
		</div>
	</div>
</section>