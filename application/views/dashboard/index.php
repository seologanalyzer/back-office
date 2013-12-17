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
    <div class="caption"><i class="icon-bar-chart"></i>Statistiques des logs</div>
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
              <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
                <div class="dashboard-stat blue">
                  <div class="visual2">
                    <i class="icon-bar-chart"></i>
                  </div>
                  <div class="details">
                    <div class="number"><?php echo((int)@$crawl_day[1]->value); ?></div>
                    <div class="desc">Visites <br/> de GoogleBot </div>
                  </div>
                  <a class="more" href="<?php echo base_url() . 'mastering/responsecode'; ?>">
                    Voir le détail
                    <i class="m-icon-swapright m-icon-white"></i>
                  </a>
                </div>
              </div>
              <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
                <div class="dashboard-stat yellow">
                  <div class="visual2">
                    <i class="icon-bar-chart"></i>
                  </div>
                  <div class="details">
                    <div class="number"><?php echo((int)@$crawl_day[2]->value); ?></div>
                    <div class="desc">Visites <br/> de BingBot </div>
                  </div>
                  <a class="more" href="<?php echo base_url() . 'mastering/responsecode'; ?>">
                    Voir le détail
                    <i class="m-icon-swapright m-icon-white"></i>
                  </a>
                </div>
              </div>
              <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
                <div class="dashboard-stat purple">
                  <div class="visual2">
                    <i class="icon-dashboard"></i>
                  </div>
                  <div class="details">
                    <div class="number"><?php echo number_format((((int)@$crawl_day[1]->loading_time + (int)@$crawl_day[2]->loading_time) / 2)); ?>ms</div>
                    <div class="desc">Chargement <br/> moyen des pages </div>
                  </div>
                  <a class="more" href="<?php echo base_url() . 'mastering/loadingtime'; ?>">
                    Voir le détail
                    <i class="m-icon-swapright m-icon-white"></i>
                  </a>
                </div>
              </div>
              <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
                <div class="dashboard-stat red">
                  <div class="visual2">
                    <i class="icon-medkit"></i>
                  </div>
                  <div class="details">
                    <div class="number"><?php echo (int)@$fourofour['today']; ?></div>
                    <div class="desc">Pages 404 <br/> détectées </div>
                  </div>
                  <a class="more" href="<?php echo base_url(); ?>mastering/responsecode404">
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
              <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
                <div class="dashboard-stat blue">
                  <div class="visual2">
                    <i class="icon-bar-chart"></i>
                  </div>
                  <div class="details">
                    <div class="number"><?php echo((int)@$crawl_days[1]['value']); ?></div>
                    <div class="desc">Visites <br/> de GoogleBot </div>
                  </div>
                  <a class="more" href="<?php echo base_url() . 'mastering/responsecode'; ?>">
                    Voir le détail
                    <i class="m-icon-swapright m-icon-white"></i>
                  </a>
                </div>
              </div>
              <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
                <div class="dashboard-stat yellow">
                  <div class="visual2">
                    <i class="icon-bar-chart"></i>
                  </div>
                  <div class="details">
                    <div class="number"><?php echo((int)@$crawl_days[2]['value']); ?></div>
                    <div class="desc">Visites <br/> de BingBot </div>
                  </div>
                  <a class="more" href="<?php echo base_url() . 'mastering/responsecode'; ?>">
                    Voir le détail
                    <i class="m-icon-swapright m-icon-white"></i>
                  </a>
                </div>
              </div>
              <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
                <div class="dashboard-stat purple">
                  <div class="visual2">
                    <i class="icon-dashboard"></i>
                  </div>
                  <div class="details">
                    <div class="number"><?php echo number_format((((int)@$crawl_days[1]['loading_time'] + (int)@$crawl_days[2]['loading_time']) / 2)); ?>ms</div>
                    <div class="desc">Chargement <br/> moyen des pages </div>
                  </div>
                  <a class="more" href="<?php echo base_url() . 'mastering/loadingtime'; ?>">
                    Voir le détail
                    <i class="m-icon-swapright m-icon-white"></i>
                  </a>
                </div>
              </div>
              <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
                <div class="dashboard-stat red">
                  <div class="visual2">
                    <i class="icon-medkit"></i>
                  </div>
                  <div class="details">
                    <div class="number"><?php echo (int)@$fourofour['30days']; ?></div>
                    <div class="desc">Pages 404 <br/> détectées </div>
                  </div>
                  <a class="more" href="<?php echo base_url(); ?>mastering/responsecode404">
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
    <div class="caption"><i class="icon-signal "></i>Temps réel</div>
    <div class="tools">
      <a class="collapse" href="javascript:;"></a>
    </div>
  </div>
  <div class="portlet-body" style="display: block; min-height:250px;">
    <div id="load_statistics_content" class="span12">
      <div id="load_statistics" style="height:250px;"></div>
    </div>
  </div>
</div>
<!-- e -->

<script src="<?php echo base_url() . 'mastering/loadingtime'; ?>'plugins/flot/jquery.flot.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets_url('plugins/flot/jquery.flot.resize.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets_url('plugins/flot/jquery.flot.time.js'); ?>" type="text/javascript"></script>
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

//googlebot

  $(function() {
    var gg = [], bg = [];
    var dataset;
    var totalPoints = 100;
    var updateInterval = 5000;
    var now = new Date(<?php echo date('Y'); ?>, <?php echo date('m'); ?>, <?php echo date('d'); ?>, <?php echo date('H'); ?>, <?php echo date('i'); ?>, <?php echo date('s'); ?>).getTime();
    var options = {
      series: {
        lines: {
          lineWidth: 1.2
        },
        bars: {
          align: "center",
          fillColor: {
            colors: [{
                opacity: 1
              }, {
                opacity: 1
              }]
          },
          barWidth: 500,
          lineWidth: 1
        }
      },
      xaxis: {
        mode: "time",
        tickSize: [60, "second"],
        tickFormatter: function(v, axis) {
          v = v - 540000;
          var date = new Date(v);

          if (date.getSeconds() % 20 == 0) {
            var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
            var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
            var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();

            return hours + ":" + minutes + ":" + seconds;
          } else {
            return "";
          }
        },
        axisLabel: "Time",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 10
      },
      yaxes: [{
          min: 0,
          tickSize: 2,
          axisLabel: "Pages Crawlées",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 6
        }],
      legend: {
        noColumns: 0,
        position: "nw"
      }
    };

    function initData() {
      for (var i = 0; i < totalPoints; i++) {
        var temp = [now += updateInterval, 0];

        gg.push(temp);
        bg.push(temp);
      }
    }

    function GetData() {
      $.ajaxSetup({
        cache: false
      });

      $.ajax({
        url: "<?php echo base_url(); ?>service/realtime",
        dataType: 'json',
        success: update,
        error: function() {
          setTimeout(GetData, updateInterval);
        }
      });
    }

    var temp;

    function update(_data) {
      gg.shift();
      bg.shift();
      now += updateInterval

      temp = [now, _data.gg];
      gg.push(temp);

      temp = [now, _data.bg];
      bg.push(temp);

      dataset = [{
          label: "Pages crawlées par GoogleBot :" + _data.gg,
          data: gg,
          lines: {
            fill: true,
            lineWidth: 1.2
          },
          color: "#27A9E3"
        },
        {label: "Pages crawlées par BingBot :" + _data.bg,
          data: bg,
          lines: {lineWidth: 1.2},
          color: "#FFB848"
        }
      ];

      $.plot($("#load_statistics"), dataset, options);
      setTimeout(GetData, updateInterval);
    }


    $(document).ready(function() {
      initData();
      dataset = [{
          label: "Pages crawlées par GoogleBot",
          data: gg,
          lines: {
            fill: true,
            lineWidth: 1.2
          },
          color: "#27A9E3"
        },
        {label: "Pages crawlées par BingBot ",
          data: bg,
          lines: {lineWidth: 1.2},
          color: "#FFB848"
        }];

      $.plot($("#load_statistics"), dataset, options);
      setTimeout(GetData, updateInterval);
    });
  });
</script>