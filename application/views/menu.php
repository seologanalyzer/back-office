<div class="page-sidebar nav-collapse collapse">
	<ul class="page-sidebar-menu">
		<li>
			<div class="sidebar-toggler hidden-phone"></div>
		</li>
		<li <?php echo get_class_item('dashboard', TRUE); ?>>
			<a href="<?php echo base_url() . 'dashboard'; ?>">
			<i class="icon-home"></i>
			<span class="title">Tableau de bord</span>
			</a>
		</li>
		<li <?php echo get_class_item('mastering'); ?>>
			<a href="<?php echo base_url() . 'mastering'; ?>">
			<i class="icon-file-text"></i>
			<span class="title">Web Mastering</span>
			</a>					
		</li>
		<li <?php echo get_class_item('ranking'); ?>>
			<a href="<?php echo base_url() . 'ranking'; ?>">
			<i class="icon-bar-chart"></i>
			<span class="title">Web Ranking</span>
			</a>
		</li>
		<li <?php echo get_class_item('paramaters', FALSE, TRUE); ?>>
			<a href="javascript:;">
			<i class="icon-cogs"></i>
			<span class="title">Paramètres</span>
			<span class="arrow "></span>
			</a>
			<ul class="sub-menu">
				<li >
					<a href="<?php echo base_url(). 'authentification/disconnect'; ?>">
					Déconnexion</a>
				</li>
			</ul>
		</li>
	</ul>
</div>