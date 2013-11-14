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