<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (empty($idUsuario)){
    $idUsuario = $this->session->id_usuario;
}

?>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="<?php echo (base_url ('assets/IBF_logo.png' )) ?>" type="image/x-icon">
	<link rel="shortcut icon"  href="<?php echo (base_url ('assets/IBF_logo.png' )) ?>" type="image/x-icon">

	<!-- FONT -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500;800&display=swap" rel="stylesheet">

	<!-- CSS GERAL -->
	<link rel="stylesheet" href="<?php echo (base_url('assets\css\style.css') . VERSION_JS) ?>">

	<title><?=$title?></title>
</head>



	<script type="text/javascript">
		var base_url = '<?= base_url(); ?>';
	</script>
	<?php
		if (isset($links_header)) {
			foreach ($links_header as $item) {
				?>
				<link rel="stylesheet" href="<?= $item ?>">

				<?php
			}
		}

		if (isset($scripts_header)) {
			foreach ($scripts_header as $item) {
				?>
				<script src="<?= $item ?>" type="text/javascript"></script>
				<?php
			}
		}

    ?>
	
	<!-- JQUERY -->
	<script src="<?php echo (base_url('assets\plugins\jquery-master\jquery-3.7.1.min.js') . VERSION_JS) ?>"></script>
	<!-- BOOTSRAP -->
	<link rel="stylesheet" href="<?php echo (base_url('assets\plugins\bootstrap\bootsrap.min.css') . VERSION_JS) ?>">
	<script src="<?php echo (base_url('assets\plugins\bootstrap\bootsrap.min.js') . VERSION_JS) ?>"></script>
	<!-- DATATABLES -->
	<link rel="stylesheet" href="<?php echo (base_url('assets\plugins\DataTables\datatables.min.css') . VERSION_JS) ?>">
	<script src="<?php echo (base_url('assets\plugins\DataTables\datatables.min.js') . VERSION_JS) ?>"></script>
	<!-- AOS -->
	<link rel="stylesheet" href="<?php echo (base_url('assets\plugins\aos-master\dist\aos.css') . VERSION_JS) ?>">
	<script src="<?php echo (base_url('assets\plugins\aos-master\dist\aos.js') . VERSION_JS) ?>"></script>
	<!-- NOTIFY -->
	<script src="<?php echo (base_url('assets\plugins\notify.js\notify.js') . VERSION_JS) ?>"></script>
	<!-- HIGHCHARTS -->
	<script src="<?php echo (base_url('assets\plugins\highcharts.js\highcharts.js') . VERSION_JS) ?>"></script>
	<!-- DARKMODE -->
	<script src="<?php echo (base_url('assets\plugins\darkmode.js-master\dist\darkmode.min.js') . VERSION_JS) ?>"></script>
	<!-- SWEETALERT -->
	<script src="<?php echo (base_url('assets\plugins\sweetalert-js\sweetalert.min.js') . VERSION_JS) ?>"></script>
	<!-- CLEAVE -->
	<script src="<?php echo (base_url('assets\plugins\cleave.js\dist\cleave.min.js') . VERSION_JS) ?>"></script>
	<script src="<?php echo (base_url('assets\plugins\cleave.js\dist\addons\cleave-phone.br.js') . VERSION_JS) ?>"></script>
	<!-- 
	# DataTables js 
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
	# Bootstrap 4.0 
	<link rel="stylesheet" href="<?php //echo base_url("assets/plugins/bootstrap4/dist/css/bootstrap.min.css");?>">
	<script src="<?php // echo base_url("assets/plugins/bootstrap4/dist/js/bootstrap.min.js");?>"></script>
	<script src="<?php //echo base_url("assets/plugins/bootstrap4/dist/js/bootstrap.bundle.min.js");?>"></script>
	 -->


