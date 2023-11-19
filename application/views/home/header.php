<?php
defined('BASEPATH') or exit('No direct script access allowed');
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

	<title>IBF Oficial</title>
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

		require_once('aside.php');
    ?>
	<!-- DataTables js  -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

	<!-- Bootstrap 4.0 -->
	<link rel="stylesheet" href="<?php echo base_url("assets/plugins/bootstrap4/dist/css/bootstrap.min.css");?>">
	<script src="<?php echo base_url("assets/plugins/bootstrap4/dist/js/bootstrap.min.js");?>"></script>
	<script src="<?php echo base_url("assets/plugins/bootstrap4/dist/js/bootstrap.bundle.min.js");?>"></script>

