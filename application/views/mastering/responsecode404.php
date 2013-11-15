<link type="text/css" href="<?php echo assets_url('plugins/data-tables/DT_bootstrap.css'); ?>" rel="stylesheet" />
<h3 class="page-title">Pages 404</h3>
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
              <th>Dernier accès</th>
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
<div class="row-fluid">
  <div class="span6">
    <div class="portlet box blue">
      <div class="portlet-title">
        <div class="caption">
          <i class="icon-globe"></i> Dernières pages 404
        </div>
        <div class="tools">
          <a class="collapse" href="javascript:;"></a>
        </div>
      </div>
      <div class="portlet-body form">
        <div class="row-fluid">
          <div class="span12" id="charts">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo assets_url('plugins/data-tables/jquery.dataTables.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('plugins/data-tables/DT_bootstrap.js'); ?>"></script>
<script src="<?php echo assets_url('plugins/flot/jquery.flot.js'); ?>" type="text/javascript"></script>
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
    function randValue() {
      return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
    }
    var pageviews = [
      [1, randValue()],
      [2, randValue()],
      [3, 2 + randValue()],
      [4, 3 + randValue()],
      [5, 5 + randValue()],
      [6, 10 + randValue()],
      [7, 15 + randValue()],
      [8, 20 + randValue()],
      [9, 25 + randValue()],
      [10, 30 + randValue()],
      [11, 35 + randValue()],
      [12, 25 + randValue()],
      [13, 15 + randValue()],
      [14, 20 + randValue()],
      [15, 45 + randValue()],
      [16, 50 + randValue()],
      [17, 65 + randValue()],
      [18, 70 + randValue()],
      [19, 85 + randValue()],
      [20, 80 + randValue()],
      [21, 75 + randValue()],
      [22, 80 + randValue()],
      [23, 75 + randValue()],
      [24, 70 + randValue()],
      [25, 65 + randValue()],
      [26, 75 + randValue()],
      [27, 80 + randValue()],
      [28, 85 + randValue()],
      [29, 90 + randValue()],
      [30, 95 + randValue()]
    ];
    var visitors = [
      [1, randValue() - 5],
      [2, randValue() - 5],
      [3, randValue() - 5],
      [4, 6 + randValue()],
      [5, 5 + randValue()],
      [6, 20 + randValue()],
      [7, 25 + randValue()],
      [8, 36 + randValue()],
      [9, 26 + randValue()],
      [10, 38 + randValue()],
      [11, 39 + randValue()],
      [12, 50 + randValue()],
      [13, 51 + randValue()],
      [14, 12 + randValue()],
      [15, 13 + randValue()],
      [16, 14 + randValue()],
      [17, 15 + randValue()],
      [18, 15 + randValue()],
      [19, 16 + randValue()],
      [20, 17 + randValue()],
      [21, 18 + randValue()],
      [22, 19 + randValue()],
      [23, 20 + randValue()],
      [24, 21 + randValue()],
      [25, 14 + randValue()],
      [26, 24 + randValue()],
      [27, 25 + randValue()],
      [28, 26 + randValue()],
      [29, 27 + randValue()],
      [30, 31 + randValue()]
    ];

    var plot = $.plot($("#charts"), [{
        data: pageviews,
        label: "Unique Visits"
      }, {
        data: visitors,
        label: "Page Views"
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
        ticks: 11,
        tickDecimals: 0
      },
      yaxis: {
        ticks: 11,
        tickDecimals: 0
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

          showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
        }
      } else {
        $("#tooltip").remove();
        previousPoint = null;
      }
    });
  }
  chart2();
</script>