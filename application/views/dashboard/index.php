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
<!-- b -->
<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption"><i class="icon-reorder"></i>Statistiques des logs</div>
    <div class="tools">
      <a class="collapse" href="javascript:;"></a>
    </div>
  </div>
  <div class="portlet-body" style="display: block;">
    <div id="accordion1" class="accordion in collapse" style="height: auto;">
      <div class="accordion-group">
        <div class="accordion-heading">
          <a href="#collapse_1" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
            <i class="icon-angle-left"></i>&nbsp;
            <i class="icon-calendar-empty "></i>&nbsp;
            Aujourd'hui
          </a>
        </div>
        <div class="accordion-body in collapse" id="collapse_1" style="height: auto;">
          <div class="accordion-inner">
            <!-- contenu accordéon : aujourd'hui -->
            <div class="row-fluid">
              <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
                <div class="dashboard-stat blue">
                  <div class="visual2">
                    <i class="icon-bar-chart"></i>
                  </div>
                  <div class="details">
                    <div class="number"><?php echo($crawl_day[1]->value); ?></div>
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
                  <div class="visual2">
                    <i class="icon-bar-chart"></i>
                  </div>
                  <div class="details">
                    <div class="number"><?php echo($crawl_day[2]->value); ?></div>
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
                  <div class="visual2">
                    <i class="icon-dashboard"></i>
                  </div>
                  <div class="details">
                    <div class="number"><?php echo number_format((($crawl_day[1]->loading_time + $crawl_day[2]->loading_time) / 2)); ?>ms</div>
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
                  <div class="visual2">
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
            <!-- // contenu accordéon : aujourd'hui -->
          </div>
        </div>
      </div>
      <div class="accordion-group">
        <div class="accordion-heading">
          <a href="#collapse_2" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
            <i class="icon-angle-left"></i>&nbsp;
            <i class="icon-calendar-empty "></i>&nbsp;
            30 derniers jours
          </a>
        </div>
        <div class="accordion-body collapse" id="collapse_2" style="height: 0px;">
          <div class="accordion-inner">
            <!-- contenu accordéon : 30 derniers jours -->
            <div class="row-fluid">
              <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
                <div class="dashboard-stat blue">
                  <div class="visual2">
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
                  <div class="visual2">
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
                  <div class="visual2">
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
                  <div class="visual2">
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
            <!-- // contenu accordéon : 30 derniers jours -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="portlet box red">
  <div class="portlet-title">
    <div class="caption"><i class="icon-reorder"></i>Temps réel</div>
    <div class="tools">
      <a class="collapse" href="javascript:;"></a>
    </div>
  </div>
  <div class="portlet-body" style="display: block;">
    <div id="load_statistics_content" class="span6">
      <div id="load_statistics" style="height:108px;"></div>
    </div>
  </div>
</div>
<!-- e -->

<script src="<?php echo assets_url('plugins/flot/jquery.flot.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets_url('plugins/flot/jquery.flot.resize.js'); ?>" type="text/javascript"></script>
<script>
  //Form : analysis
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
                window.location.href = '<?php echo base_url(); ?>dashboard/index';
              }
            }
    );
  }

  var temp;

  function update(_data) {
    //remove first item of array
    cpu.shift();
    cpuCore.shift();
    disk.shift();

    now += updateInterval

    //add the data retrieve from backend to array
    temp = [now, _data.cpu];
    cpu.push(temp);

    temp = [now, _data.core];
    cpuCore.push(temp);

    temp = [now, _data.disk];
    disk.push(temp);

    //update legend label so users can see the latest value in the legend
    dataset = [
      {label: "CPU:" + _data.cpu + "%", data: cpu, lines: {fill: true, lineWidth: 1.2}, color: "#00FF00"},
      {label: "Disk:" + _data.disk + "KB", data: disk, color: "#0044FF", bars: {show: true}, yaxis: 2},
      {label: "CPU Core:" + _data.core + "%", data: cpuCore, lines: {lineWidth: 1.2}, color: "#FF0000"}
    ];

    //redraw the chart
    $.plot($("#flot-placeholder1"), dataset, options);

    //prepare for next update
    setTimeout(GetData, updateInterval);
  }

  function GetData() {
    //set no cache
    $.ajaxSetup({cache: false});

    $.ajax({
      url: "<?php echo base_url(); ?>service/realtimegoogle",
      dataType: 'json',
      success: update, //if success, call update()
      error: function() {
        //if fail, prepare next update
        setTimeout(GetData, updateInterval);
      }
    });
  }

</script>