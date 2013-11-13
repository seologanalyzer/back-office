<h3 class="page-title">Paramètrages</h3>
<div class="row-fluid">
  <div class="span12">
    <div class="portlet box red">
      <div class="portlet-title">
        <div class="caption">
          <i class="icon-cogs"></i>
          Période de suivi
        </div>
        <div class="tools">
          <a class="collapse" href="javascript:;"></a>
        </div>
      </div>
      <div class="portlet-body form">
        <!--<form class="form-horizontal no-margin">-->
        <?php
        echo form_open(
                current_url(), array('class' => 'form-horizontal no-margin', 'id' => 'form-period')
        );
        ?>
        <div class="control-group no-margin">
          <div class="span8">Vous pouvez modifier la période maximale du déplacement d'un robot. (basé sur son IP)</div>
          <div class="span2">
            <input type="text" id="period" value="<?php echo (int)$configuration->value; ?>" name="period" class="span5" /> jours
          </div>
          <div class="span2">
            <input type="button" value="Enregistrer" onclick="recordPeriod()" class="btn red" />
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<script>
  function recordPeriod() {
    $.post("<?php echo base_url(); ?>parameters/recperiod", $('#form-period').serialize(),
            function(data) {
              if (data == 1) {
                toastr.success('Paramètre enregistré!', 'Succès')
              } else {
                toastr.error('Une erreur est apparue', 'Erreur!')
              }
              return false;
            }, "text");
  }
</script>