<h3 class="page-title">Tableau de bord</h3>
<div class="row-fluid">
  <div class="span12">
    <div class="portlet box green">
      <div class="portlet-title">
        <div class="caption">
          <i class="icon-cogs"></i>
          Analyse des logs
        </div>
        <div class="tools">
          <a class="collapse" href="javascript:;"></a>
        </div>
      </div>
      <div class="portlet-body form">
        <?php
        echo form_open(
                current_url(), array('class' => 'form-horizontal no-margin', 'id' => 'form-analysis')
        );
        ?>
        <div class="control-group no-margin">
          <div class="span10" style="padding-top:3px;">Votre dernière analyse date du <span id="last-analysis"><?php echo str_replace(' ', ' à ', $configuration->value); ?></span>. Vous pouvez en lancer une nouvelle en cliquant sur le bouton ci-contre.</div>
          <div class="span2">
            <input type="submit" value="Lancer" class="btn green" style="float:left;" />
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<ul class="breadcrumb">
  <li>
    <i class="icon-calendar-empty "></i>
    <span>Aujourd'hui</span>
  </li>
</ul>
<div class="row-fluid">
  <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
    <div class="dashboard-stat blue">
      <div class="visual">
        <i class="icon-bar-chart"></i>
      </div>
      <div class="details">
        <div class="number">239</div>
        <div class="desc">Visites <br/> de GoogleBot </div>
      </div>
      <a class="more" href="#">
        Voir le détail
        <i class="m-icon-swapright m-icon-white"></i>
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
    <div class="dashboard-stat purple">
      <div class="visual">
        <i class="icon-bar-chart"></i>
      </div>
      <div class="details">
        <div class="number">88</div>
        <div class="desc">Visites <br/> de BingBot </div>
      </div>
      <a class="more" href="#">
        Voir le détail
        <i class="m-icon-swapright m-icon-white"></i>
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
    <div class="dashboard-stat yellow">
      <div class="visual">
        <i class="icon-dashboard"></i>
      </div>
      <div class="details">
        <div class="number">23,023ms</div>
        <div class="desc">Chargement <br/> moyen des pages </div>
      </div>
      <a class="more" href="#">
        Voir le détail
        <i class="m-icon-swapright m-icon-white"></i>
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
    <div class="dashboard-stat red">
      <div class="visual">
        <i class="icon-medkit"></i>
      </div>
      <div class="details">
        <div class="number">20</div>
        <div class="desc">Pages 404 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        Voir le détail
        <i class="m-icon-swapright m-icon-white"></i>
      </a>
    </div>
  </div>
</div>
<ul class="breadcrumb">
  <li>
    <i class="icon-calendar-empty "></i>
    <span>30 derniers jours</span>
  </li>
</ul>
<div class="row-fluid">
  <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
    <div class="dashboard-stat blue">
      <div class="visual">
        <i class="icon-bar-chart"></i>
      </div>
      <div class="details">
        <div class="number">23123</div>
        <div class="desc">Visites <br/> de GoogleBot </div>
      </div>
      <a class="more" href="#">
        Voir le détail
        <i class="m-icon-swapright m-icon-white"></i>
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
    <div class="dashboard-stat purple">
      <div class="visual">
        <i class="icon-bar-chart"></i>
      </div>
      <div class="details">
        <div class="number">11023</div>
        <div class="desc">Visites <br/> de BingBot </div>
      </div>
      <a class="more" href="#">
        Voir le détail
        <i class="m-icon-swapright m-icon-white"></i>
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
    <div class="dashboard-stat yellow">
      <div class="visual">
        <i class="icon-dashboard"></i>
      </div>
      <div class="details">
        <div class="number">45,343ms</div>
        <div class="desc">Chargement <br/> moyen des pages </div>
      </div>
      <a class="more" href="#">
        Voir le détail
        <i class="m-icon-swapright m-icon-white"></i>
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
    <div class="dashboard-stat red">
      <div class="visual">
        <i class="icon-medkit"></i>
      </div>
      <div class="details">
        <div class="number">240</div>
        <div class="desc">Pages 404 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        Voir le détail
        <i class="m-icon-swapright m-icon-white"></i>
      </a>
    </div>
  </div>
</div>
<script>
  //Form : period
  listenerSubmit('form-analysis', 'launchAnalysis');

  function launchAnalysis() {
    disableSubmit('form-analysis');
    $.get("<?php echo base_url(); ?>logger/analysis.php",
            function(data) {
              enableSubmit('form-analysis');
              if (data == '') {
                addMessage('error', "Erreur!", "Une erreur est apparue");
              } else {
                $('#last-analysis').empty().html(data);
                addMessage('success', "Succès", "Analyse terminée!");
              }
            }
    );
  }
</script>