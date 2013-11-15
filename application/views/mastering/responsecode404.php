<link type="text/css" href="<?php echo assets_url('plugins/data-tables/DT_bootstrap.css'); ?>" rel="stylesheet" />
<h3 class="page-title">Pages 404</h3>
<div class="row-fluid">
  <div class="span6">
    <div class="portlet box red">
      <div class="portlet-title">
        <div class="caption">
          <i class="icon-globe"></i> Pages 404 des 30 derniers jours
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
  <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
    <div class="dashboard-stat red">
      <div class="visual2">
        <i class="icon-medkit"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo $percentage['30days']; ?>% </div>
        <div class="desc">Pages 404 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        30 derniers jours
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
    <div class="dashboard-stat red">
      <div class="visual2">
        <i class="icon-medkit"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo $percentage['today']; ?>% </div>
        <div class="desc">Pages 404 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        Aujourd'hui
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
    <div class="dashboard-stat red">
      <div class="visual2">
        <i class="icon-medkit"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo $total['30days']; ?> </div>
        <div class="desc">Pages 404 <br/> détectées </div>
      </div>
      <a class="more" href="#">
        30 derniers jours
      </a>
    </div>
  </div>
  <div class="span3 responsive" data-desktop="span3" data-tablet="span6">
    <div class="dashboard-stat red">
      <div class="visual2">
        <i class="icon-medkit"></i>
      </div>
      <div class="details">
        <div class="number"><?php echo $total['today']; ?> </div>
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
    <div class="portlet box red">
      <div class="portlet-title">
        <div class="caption">
          <i class="icon-globe"></i> Dernières pages 404
        </div>
        <div class="tools">
          <a class="collapse" href="javascript:;"></a>
        </div>
      </div>
      <div class="portlet-body form">
        <table class="table table-striped table-bordered table-hover" id="data">
          <thead>
            <tr>
              <th>Page</th>
              <th>Nb d'accès</th>
              <th>Premier accès</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pages as $page): ?>
              <tr class="odd gradeX">
                <td>
                  <a href="http://<?php echo $page->page; ?>"><?php echo (strlen($page->page) > 85) ? substr($page->page, 0, 85) . '(...)' : $page->page; ?></a>
                </td>
                <td><?php echo $page->count; ?></td>
                <td><?php echo $page->date; ?></td>
                <td><span class="label label-important">404</span></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo assets_url('plugins/data-tables/jquery.dataTables.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('plugins/data-tables/DT_bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('plugins/flot/jquery.flot.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('plugins/flot/jquery.flot.time.js'); ?>"></script>
<script>
  // begin first table
  $('#data').dataTable({
    "aoColumns": [
      {"bSortable": true},
      {"bSortable": true},
      {"bSortable": true},
      {"bSortable": false}
    ],
    "aLengthMenu": [
      [5, 15, 20, -1],
      [5, 15, 20, "All"] // change per page values here
    ],
    // set the initial value
    "iDisplayLength": 5,
    "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
    "sPaginationType": "bootstrap",
    "oLanguage": {
      "sLengthMenu": "_MENU_ records per page",
      "oPaginate": {
        "sPrevious": "Prev",
        "sNext": "Next"
      }
    },
    "aoColumnDefs": [{
        'bSortable': false,
        'aTargets': [0]
      }
    ],
    "aaSorting": [[1, "desc"]]
  });

  //chart
  function chart2() {
    var pageviews = [
<?php foreach ($graph as $date => $value): ?>
        [<?php echo strtotime($date); ?>000, <?php echo $value; ?>],
<?php endforeach; ?>
    ];

    var plot = $.plot($("#charts"), [{
        data: pageviews,
        label: "Pages 404"
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
      colors: ["#d12610", "#37b7f3", "#52e136"],
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
</script>