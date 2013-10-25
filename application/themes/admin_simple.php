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
	<link href="<?php echo assets_url('css/themes/default.css'); ?>" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo assets_url('plugins/uniform/css/uniform.default.css'); ?>" rel="stylesheet" type="text/css"/>
	<!-- // Feuilles de style -->
	
	<!-- Scripts -->
	<script src="<?php echo assets_url('plugins/jquery-1.10.1.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo assets_url('plugins/jquery-migrate-1.2.1.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo assets_url('plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js'); ?>" type="text/javascript"></script>      
	<script src="<?php echo assets_url('plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo assets_url('plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js'); ?>" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="<?php echo assets_url('excanvas.min.js'); ?>"></script>
	<script src="<?php echo assets_url('respond.min.js'); ?>"></script>  
	<![endif]-->   
	<script src="<?php echo assets_url('plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo assets_url('plugins/jquery.blockui.min.js'); ?>" type="text/javascript"></script>  
	<script src="<?php echo assets_url('plugins/jquery.cookie.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo assets_url('plugins/uniform/jquery.uniform.min.js'); ?>" type="text/javascript" ></script>
	<!-- Script -->
</head>
<!-- // Head -->

<!-- Body -->
<body class="page-header-fixed">
	<!-- Top bar -->   
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="brand" href="<?php echo base_url() . 'dashboard'; ?>">
				<?php echo img('logo-mini.gif', 'logo'); ?>
				</a>
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<?php echo img('menu-toggler.png'); ?>
				</a>          
			</div>
		</div>
	</div>
	<!-- // Top bar -->
	
	<!-- Wrapper -->   
	<div class="page-container row-fluid">
		<!-- Menu -->
		<?php $this->load->view('menu'); ?>
		<!-- // Menu -->
		
		<!-- Conteneur -->
		<div class="page-content">
			<div class="container-fluid">
				<!-- Output-->
				<?php echo $output; ?>
				<!-- // Output-->
			</div>
		</div>
		<!-- // Conteneur -->    
	</div>
	<!-- // Wrapper -->
	
	<!-- Pied-de-page -->
	<div class="footer">
		<div class="footer-inner">
			2013&nbsp;&copy;&nbsp;SLA.Team4TonyVaucelleProject
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- // Pied-de-page -->
	
	<!-- Scripts -->
	<script src="<?php echo assets_url('scripts/app.js'); ?>"></script>      
	<script>
		jQuery(document).ready(function() {    
		   App.init();
		});
	</script>
<?php foreach($js as $url): ?>
	<script src="<?php echo $url; ?>" type="text/javascript"></script> 
<?php endforeach; ?>
	<!-- // Scripts -->
	
</body>
<!-- // Body -->
</html>