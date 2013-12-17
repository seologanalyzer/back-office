<div class="page-sidebar nav-collapse collapse">
  <ul class="page-sidebar-menu">
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
      <ul class="sub-menu">
        <li <?php echo get_class_item('mastering/loadingtime'); ?>>
          <a href="<?php echo base_url() . 'mastering/loadingtime'; ?>">Temps de chargement</a>
        </li>
        <li <?php echo get_class_item('mastering/responsecode'); ?>>
          <a href="<?php echo base_url() . 'mastering/responsecode'; ?>">Codes réponses</a>
        </li>
        <li <?php echo get_class_item('mastering/responsecode404'); ?>>
          <a href="<?php echo base_url() . 'mastering/responsecode404'; ?>">Codes réponses 404</a>
        </li>
        <li <?php echo get_class_item('mastering/keywords'); ?>>
          <a href="<?php echo base_url() . 'mastering/keywords'; ?>">Mots clés</a>
        </li>
      </ul>
    </li>
    <li <?php echo get_class_item('ranking'); ?>>
      <a href="<?php echo base_url() . 'ranking'; ?>">
        <i class="icon-bar-chart"></i>
        <span class="title">Web Ranking</span>
      </a>
      <ul class="sub-menu">
        <li <?php echo get_class_item('ranking/addkeyword'); ?>>
          <a href="<?php echo base_url() . 'ranking/addkeyword'; ?>">Ajouter un mot clé</a>
        </li>
        <li <?php echo get_class_item('ranking/waiting'); ?>>
          <a href="<?php echo base_url() . 'ranking/waiting'; ?>">Mots clés en cours</a>
        </li>
        <li <?php echo get_class_item('ranking/done'); ?>>
          <a href="<?php echo base_url() . 'ranking/done'; ?>">Mots clés terminés</a>
        </li>
      </ul>
    </li>
    <li <?php echo get_class_item('parameters', FALSE, TRUE); ?>>
      <a href="javascript:;">
        <i class="icon-cogs"></i>
        <span class="title">Paramètres</span>
        <span class="arrow "></span>
      </a>
      <ul class="sub-menu">
        <li <?php echo get_class_item('parameters/index'); ?>>
          <a href="<?php echo base_url() . 'parameters/index'; ?>">Paramètrages</a>
        </li>
        <li>
          <a href="<?php echo base_url() . 'authentification/disconnect'; ?>">Déconnexion</a>
        </li>
      </ul>
    </li>
  </ul>
</div>