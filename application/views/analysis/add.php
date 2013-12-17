<h3 class="page-title">Ajouter un mot clé à analyser</h3>
<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <i class="icon-globe"></i> Analyse complète d'un mot clé
    </div>
    <div class="tools">
    </div>
  </div>
  <div class="portlet-body form">
    <form method="POST" action="/client/add">
      <div class="row-fluid" style="margin-top:0px;">
        <div class="span2"></div>
        <div class="span9"></div>
        <div class="span2">
          <p style="float:right;">Site Google :</p>
        </div>
        <div class="span9">
          <select name="google">
            <option value=".fr">.FR</option>
            <option value=".com">.COM</option>
            <option value=".de">.DE</option>
            <option value=".co.uk">.CO.UK</option>
            <option value=".es">.ES</option>
          </select>
        </div>
        <div id="keywords">
          <div class="span2"></div>
          <div class="span9"></div>
          <div class="span2">
            <p style="float:right;">Mot(s) clé(s) :</p>
          </div>
          <div class="span9">
            <textarea class="span10" rows="5" name="keywords" placeholder="Mots clés (séparés par un retour à la ligne)"></textarea>
          </div>
        </div>
        <div class="span2" style="margin-top:5px;">
        </div>
        <div class="span9" style="margin-top:5px;">
          <input type="submit" class="btn blue" value="Lancer l'analyse"/>
        </div>
      </div>
    </form>
  </div>
</div>
bon