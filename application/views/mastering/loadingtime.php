<h3 class="page-title">Temps de chargement par Google</h3>
<div class="row-fluid">
  <div class="span9">
    <div class="portlet box blue">
      <div class="portlet-title">
        <div class="caption">
          <i class="icon-globe"></i> Temps de chargement moyen des 30 derniers jours
        </div>
        <div class="tools">
        </div>
      </div>
      <div class="portlet-body form" style="height:202px;">
        <div class="row-fluid">
          <div class="span12" id="charts" style="height:202px;"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat blue">
      <div class="visual2">
        <i class="icon-medkit"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) $loadtotal[1]; ?> ms </div>
        <div class="desc">Chargement <br/> moyen </div>
      </div>
      <a class="more" href="#">
        30 derniers jours
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat blue">
      <div class="visual2">
        <i class="icon-medkit"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) $loadtime[1][date('Y-m-d')]; ?> ms </div>
        <div class="desc">Chargement <br/> moyen </div>
      </div>
      <a class="more" href="#">
        Aujourd'hui
      </a>
    </div>
  </div>
</div>
<div class="row-fluid">
  <div class="span12">
    <div class="portlet box blue">
      <div class="portlet-title">
        <div class="caption">
          <i class="icon-globe"></i> Temps de chargement moyen des 30 derniers jours par heure
        </div>
        <div class="tools">
        </div>
      </div>
      <div class="portlet-body form" style="height:202px;">
        <div class="row-fluid">
          <div class="span12" id="charts_hour" style="height:202px;"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo assets_url('plugins/flot/jquery.flot.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('plugins/flot/jquery.flot.time.js'); ?>"></script>
<script>
  //chart
  function chart2() {
    var pageviews = [
<?php foreach ($loadtime[1] as $date => $value): ?>
        [<?php echo strtotime($date); ?>000, <?php echo $value; ?>],
<?php endforeach; ?>
    ];

    var plot = $.plot($("#charts"), [{
        data: pageviews,
        label: "Temps de chargement (ms)"
      }
    ], {
      series: {
        lines: {
          show: true,
          lineWidth: 2,
          fill: true,
          fillColor: {
            colors: [{
                opacity: 0.05
              }, {
                opacity: 0.01
              }
            ]
          }
        },
        points: {
          show: true
        },
        shadowSize: 2
      },
      grid: {
        hoverable: true,
        clickable: true,
        tickColor: "#eee",
        borderWidth: 0
      },
      colors: ["#37b7f3", "#d12610", "#52e136"],
      xaxis: {
        mode: "time",
        tickLength: 5
      },
      yaxis: {
        ticks: 11,
        tickDecimals: 0
      },
      legend: {
        noColumns: 0,
        position: "nw"
      }
    });


    function showTooltip(x, y, contents) {
      $('<div id="tooltip">' + contents + '</div>').css({
        position: 'absolute',
        display: 'none',
        top: y + 5,
        left: x + 15,
        border: '1px solid #333',
        padding: '4px',
        color: '#fff',
        'border-radius': '3px',
        'background-color': '#333',
        opacity: 0.80
      }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    $("#charts").bind("plothover", function(event, pos, item) {
      $("#x").text(pos.x.toFixed(2));
      $("#y").text(pos.y.toFixed(2));

      if (item) {
        if (previousPoint != item.dataIndex) {
          previousPoint = item.dataIndex;

          $("#tooltip").remove();
          var x = item.datapoint[0].toFixed(2),
                  y = item.datapoint[1].toFixed(2);

          showTooltip(item.pageX, item.pageY, item.series.label + " : " + y);
        }
      } else {
        $("#tooltip").remove();
        previousPoint = null;
      }
    });
  }
  chart2();
  function chart2bis() {
    
    var legend = [
      <?php for($i=0;$i<24;$i++){ echo "[".$i.",'".$i."h'], ";} ?>
    ];
    
    var ticks = [
<?php foreach ($loadhour[1] as $value): ?>
        [<?php echo $value->hour; ?>, <?php echo (int) $value->loading_time; ?>],
<?php endforeach; ?>
    ];

    var plot = $.plot($("#charts_hour"), [{
        data: ticks,
        label: "Temps de chargement (ms)",
        color: '#27A9E3'
      }
    ], {
      series: {
        bars: {
          show: true
        }
      },
      bars: {
        align: "center",
        barWidth: 0.5
      },
      xaxis: {
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 10,
        ticks: legend

      },
      yaxis: {
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 3,
        min: 0
      },
      legend: {
        noColumns: 0,
        position: "nw"
      }
    });
    function showTooltip(x, y, contents) {
      $('<div id="tooltip">' + contents + '</div>').css({
        position: 'absolute',
        display: 'none',
        top: y + 5,
        left: x + 15,
        border: '1px solid #333',
        padding: '4px',
        color: '#fff',
        'border-radius': '3px',
        'background-color': '#333',
        opacity: 0.80
      }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    $("#charts_hour").bind("plothover", function(event, pos, item) {
      $("#x").text(pos.x.toFixed(2));
      $("#y").text(pos.y.toFixed(2));

      if (item) {
        if (previousPoint != item.dataIndex) {
          previousPoint = item.dataIndex;

          $("#tooltip").remove();
          var x = item.datapoint[0].toFixed(2),
                  y = item.datapoint[1].toFixed(2);

          showTooltip(item.pageX, item.pageY, item.series.label + " : " + y);
        }
      } else {
        $("#tooltip").remove();
        previousPoint = null;
      }
    });
  }
  chart2bis();
</script>