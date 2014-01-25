<link type="text/css" href="<?php echo assets_url('plugins/data-tables/DT_bootstrap.css'); ?>" rel="stylesheet" />
<h3 class="page-title">Codes réponse serveur Google</h3>
<div class="row-fluid">
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat blue">
      <div class="visual2">
        <i class="icon-bar-chart"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo $resume['1']['30days']['200']; ?></div>
        <div class="desc">Pages 200 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        30 derniers jours
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat green">
      <div class="visual2">
        <i class="icon-exchange"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['1']['30days']['301']; ?></div>
        <div class="desc">Pages 301 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        30 derniers jours
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat purple">
      <div class="visual2">
        <i class="icon-ok"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['1']['30days']['302']; ?></div>
        <div class="desc">Pages 302 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        30 derniers jours
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat red">
      <div class="visual2">
        <i class="icon-medkit"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['1']['30days']['404']; ?></div>
        <div class="desc">Pages 404 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        30 derniers jours
      </a>
    </div>
  </div>
</div>
<div class="row-fluid">
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat blue">
      <div class="visual2">
        <i class="icon-bar-chart"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['1']['today']['200']; ?></div>
        <div class="desc">Pages 200 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        Aujourd'hui
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat green">
      <div class="visual2">
        <i class="icon-exchange"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['1']['today']['301']; ?></div>
        <div class="desc">Pages 301 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        Aujourd'hui
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat purple">
      <div class="visual2">
        <i class="icon-ok"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['1']['today']['302']; ?></div>
        <div class="desc">Pages 302 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        Aujourd'hui
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat red">
      <div class="visual2">
        <i class="icon-medkit"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['1']['today']['404']; ?></div>
        <div class="desc">Pages 404 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        Aujourd'hui
      </a>
    </div>
  </div>
</div>
<div class="row-fluid">
  <div class="span12">
    <div class="portlet box yellow">
      <div class="portlet-title">
        <div class="caption">
          <i class="icon-globe"></i> Différentes pages des 30 derniers jours
        </div>
        <div class="tools">
        </div>
      </div>
      <div class="portlet-body form" style="height:350px;">
        <div class="row-fluid">
          <div class="span12" id="charts" style="height:350px;"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Bing -->
<h3 class="page-title">Codes réponse serveur Bing</h3>
<div class="row-fluid">
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat blue">
      <div class="visual2">
        <i class="icon-bar-chart"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo $resume['2']['30days']['200']; ?></div>
        <div class="desc">Pages 200 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        30 derniers jours
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat green">
      <div class="visual2">
        <i class="icon-exchange"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['2']['30days']['301']; ?></div>
        <div class="desc">Pages 301 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        30 derniers jours
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat purple">
      <div class="visual2">
        <i class="icon-ok"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['2']['30days']['302']; ?></div>
        <div class="desc">Pages 302 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        30 derniers jours
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat red">
      <div class="visual2">
        <i class="icon-medkit"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['2']['30days']['404']; ?></div>
        <div class="desc">Pages 404 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        30 derniers jours
      </a>
    </div>
  </div>
</div>
<div class="row-fluid">
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat blue">
      <div class="visual2">
        <i class="icon-bar-chart"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['2']['today']['200']; ?></div>
        <div class="desc">Pages 200 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        Aujourd'hui
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat green">
      <div class="visual2">
        <i class="icon-exchange"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['2']['today']['301']; ?></div>
        <div class="desc">Pages 301 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        Aujourd'hui
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat purple">
      <div class="visual2">
        <i class="icon-ok"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['2']['today']['302']; ?></div>
        <div class="desc">Pages 302 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        Aujourd'hui
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span3">
    <div class="dashboard-stat red">
      <div class="visual2">
        <i class="icon-medkit"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo (int) @$resume['2']['today']['404']; ?></div>
        <div class="desc">Pages 404 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        Aujourd'hui
      </a>
    </div>
  </div>
</div>
<div class="row-fluid">
  <div class="span12">
    <div class="portlet box yellow">
      <div class="portlet-title">
        <div class="caption">
          <i class="icon-globe"></i> Différentes pages des 30 derniers jours
        </div>
        <div class="tools">
        </div>
      </div>
      <div class="portlet-body form" style="height:350px;">
        <div class="row-fluid">
          <div class="span12" id="charts2" style="height:350px;"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo assets_url('plugins/data-tables/jquery.dataTables.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('plugins/data-tables/DT_bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('plugins/flot/jquery.flot.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('plugins/flot/jquery.flot.time.js'); ?>"></script>
<script>
  //chart
  function chart2() {
    var page404 = [
<?php foreach ($graph['2'] as $date => $value): ?>
        [<?php echo strtotime($date); ?>000, <?php echo (int)$value['404']; ?>],
<?php endforeach; ?>
    ];
    var page200 = [
<?php foreach ($graph['2'] as $date => $value): ?>
        [<?php echo strtotime($date); ?>000, <?php echo (int)$value['200']; ?>],
<?php endforeach; ?>
    ];
    var page301 = [
<?php foreach ($graph['2'] as $date => $value): ?>
        [<?php echo strtotime($date); ?>000, <?php echo (int)$value['301']; ?>],
<?php endforeach; ?>
    ];
    var page302 = [
<?php foreach ($graph['2'] as $date => $value): ?>
        [<?php echo strtotime($date); ?>000, <?php echo (int)$value['302']; ?>],
<?php endforeach; ?>
    ];

    var plot = $.plot($("#charts2"), [{
        data: page404,
        label: "Pages 404",
        
      },
      {
        data: page200,
        label: "Pages 200"
      },
      {
        data: page302,
        label: "Pages 302"
      },
      {
        data: page301,
        label: "Pages 301"
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
      colors: ["#d12610", "#37b7f3", "#852b99", "#28b779"],
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
    $("#charts2").bind("plothover", function(event, pos, item) {
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
  //chart
  function chart3() {
    var page404 = [
<?php foreach ($graph['1'] as $date => $value): ?>
        [<?php echo strtotime($date); ?>000, <?php echo (int)$value['404']; ?>],
<?php endforeach; ?>
    ];
    var page200 = [
<?php foreach ($graph['1'] as $date => $value): ?>
        [<?php echo strtotime($date); ?>000, <?php echo (int)$value['200']; ?>],
<?php endforeach; ?>
    ];
    var page301 = [
<?php foreach ($graph['1'] as $date => $value): ?>
        [<?php echo strtotime($date); ?>000, <?php echo (int)$value['301']; ?>],
<?php endforeach; ?>
    ];
    var page302 = [
<?php foreach ($graph['1'] as $date => $value): ?>
        [<?php echo strtotime($date); ?>000, <?php echo (int)$value['302']; ?>],
<?php endforeach; ?>
    ];

    var plot = $.plot($("#charts"), [{
        data: page404,
        label: "Pages 404",
        
      },
      {
        data: page200,
        label: "Pages 200"
      },
      {
        data: page302,
        label: "Pages 302"
      },
      {
        data: page301,
        label: "Pages 301"
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
      colors: ["#d12610", "#37b7f3", "#852b99", "#28b779"],
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
  chart3();
</script>