<link type="text/css" href="<?php echo assets_url('plugins/data-tables/DT_bootstrap.css'); ?>" rel="stylesheet" />
<h3 class="page-title">Mots clés</h3>
<div class="row-fluid">
  <div class="span12">
    <div class="portlet box purple">
      <div class="portlet-title">
        <div class="caption">
          <i class="icon-globe"></i> Mots clés (Google et Bing)
        </div>
        <div class="tools">
          <a class="collapse" href="javascript:;"></a>
        </div>
      </div>
      <div class="portlet-body form">
        <table class="table table-striped table-bordered table-hover" id="data">
          <thead>
            <tr>
              <th>Keyword</th>
              <th>Page (dernière visitée)</th>
              <th>Nb d'accès</th>
              <th>Premier accès</th>
              <th>Moteur</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($keywords[1] as $keyword): ?>
              <tr class="odd gradeX">
                <td><?php echo $keyword->keyword; ?></td>
                <td>
                  <a href="http://<?php echo $keyword->page; ?>"><?php echo (strlen($keyword->page) > 85) ? substr($keyword->page, 0, 85) . '(...)' : $keyword->page; ?></a>
                </td>
                <td><?php echo $keyword->nb; ?></td>
                <td><?php echo $keyword->date; ?></td>
                <td><span class="label label-info">Google</span></td>
              </tr>
            <?php endforeach; ?>
            <?php foreach ($keywords[2] as $keyword): ?>
              <tr class="odd gradeX">
                <td><?php echo $keyword->keyword; ?></td>
                <td>
                  <a href="http://<?php echo $keyword->page; ?>"><?php echo (strlen($keyword->page) > 85) ? substr($keyword->page, 0, 85) . '(...)' : $keyword->page; ?></a>
                </td>
                <td><?php echo $keyword->nb; ?></td>
                <td><?php echo $keyword->date; ?></td>
                <td><span class="label label-warning">Bing</span></td>
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
<script>
  // begin first table
  $('#data').dataTable({
    "aoColumns": [
      {"bSortable": true},
      {"bSortable": true},
      {"bSortable": true},
      {"bSortable": true},
      {"bSortable": true}
    ],
    "aLengthMenu": [
      [5, 10, 20, -1],
      [5, 10, 20, "All"] // change per page values here
    ],
    // set the initial value
    "iDisplayLength": 10,
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
</script>