<?php 	
		
		header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0', FALSE);
		header('Pragma: no-cache');
				
		echo doctype('html5');
?>
<!--[if IE 8]> <html lang="<?php echo $this->lang->line('meta_language'); ?>" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="<?php echo $this->lang->line('meta_language'); ?>" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="<?php echo $this->lang->line('meta_language'); ?>"> <!--<![endif]-->
<!-- Head -->
<head>
	<!-- Metas -->
	<title><?php echo $titre; ?></title>
	<meta name="Language" content="<?php echo $this->lang->line('meta_language'); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>" />
	<!-- // Metas -->

	<!-- Feuilles de style -->
<?php foreach($css as $url): ?>
	<link rel="stylesheet" href="<?php echo $url; ?>" />
<?php endforeach; ?>
	<link href="<?php echo assets_url('plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo assets_url('plugins/bootstrap/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo assets_url('plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo assets_url('css/style-metro.css" rel="stylesheet'); ?>" type="text/css"/>
	<link href="<?php echo assets_url('css/style.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo assets_url('css/style-responsive.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo assets_url('plugins/uniform/css/uniform.default.css'); ?>" rel="stylesheet" type="text/css"/>
	<!-- // Feuilles de style -->
	
		<!-- Scripts -->
	<script src="<?php echo assets_url('plugins/jquery-1.10.1.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo assets_url('plugins/jquery-migrate-1.2.1.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo assets_url('plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<?php foreach($js as $url): ?>
	<script src="<?php echo $url; ?>" type="text/javascript"></script> 
<?php endforeach; ?>
	<!-- // Scripts -->
</head>
<!-- // Head -->
<!-- Body -->
<body class="page-header-fixed">
	<!-- Wrapper -->   
	<div class="page-container row-fluid">
		<!-- Conteneur -->
		<div class="page-content">
			<div class="container-fluid">
				<!-- Message -->
				<?php
					foreach($message_error as $message)
					{
						echo '<div class="alert alert-error"><a class="close" data-dismiss="alert"></a>' . $message . "</div>";
					}
					foreach($message_warning as $message)
					{
						echo '<div class="alert alert-warning"><a class="close" data-dismiss="alert"></a>' . $message . "</div>";
					}
					foreach($message_success as $message)
					{
						echo '<div class="alert alert-success"><a class="close" data-dismiss="alert"></a>' . $message . "</div>";
					}
					foreach($message_info as $message)
					{
						echo '<div class="alert alert-info"><a class="close" data-dismiss="alert"></a>' . $message . "</div>";
					}
					
					echo validation_errors();
				?>
				<!-- // Message -->
				<!-- Output-->
				<?php echo $output; ?>
				<!-- // Output-->
			</div>
		</div>
		<!-- // Conteneur -->    
	</div>
	<!-- // Wrapper -->
</body>
<!-- // Body -->
</html>