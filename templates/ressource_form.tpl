{* Smarty *}
<form class="form-horizontal" method="POST" action="" target="_blank">
	<input type="hidden" name="old_ressource_id" id="old_ressource_id" value="{$ressource.ressource_id}" />
	<div class="form-group">
		<label for="ressource_id" class="col-md-4 control-label">{#ressource_identifiant#} :</label>
		<div class="col-md-4">
			{if $ressource.ressource_id neq ''}
			<input name="ressource_id" id="ressource_id" type="hidden" value="{$ressource.ressource_id} " /> 			
			<p class="form-control-static">{$ressource.ressource_id}</p> 
			{else}
			<input name="ressource_id" id="ressource_id" type="text" class="form-control" maxlength="10" value="{$ressource.ressource_id}" onChange="xajax_checkRessourceId(this.value, '{$ressource.ressource_id}');" />
			</div>
			<span id="divStatutCheckRessourceId"></span>
			<div class="col-md-3">{#winPeriode_ressource_identifiantCarMax#}
			{/if}
		</div>
	</div>
	<div class="form-group">
		<label for="ressource_nom" class="col-md-4 control-label">{#ressource_nom#} :</label>
		<div class="col-md-5">
			<input name="ressource_nom" id="ressource_nom" type="text" class="form-control" maxlength="50" value="{$ressource.nom}" />
		</div>
	</div>
	<div class="form-group">
		<label for="ressource_commentaire" class="col-md-4 control-label">{#ressource_commentaire#} :</label>
		<div class="col-md-7">
			<textarea name="ressource_commentaire" id="ressource_commentaire" class="form-control" maxlength="255" type="text">{$ressource.commentaire}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">{#ressource_exclusive#} :</label>
		<div class="col-md-5 checkbox-inline">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="ressource_exclusive" id="ressource_exclusive" {if $ressource.exclusif == 1}checked="checked"{/if}>
		</div>
	</div>	
	<div class="form-group">
		<div class="col-md-4"></div>
		<div class="col-md-5">
			<input type="button" value="{#ressource_valider#|escape:"html"}" class="btn btn-primary" onClick="xajax_submitFormRessource('{$ressource.ressource_id}', $('#ressource_id').val(), $('#ressource_nom').val(), $('#ressource_commentaire').val(), $('#ressource_exclusive').is(':checked'))" />
		</div>
	</div>
</form>