{* Smarty *}
<form class="form-horizontal" id="formIcal">
	<div class="form-group">
		<label class="col-md-4 control-label">{#icalExport_users#} :</label>
		<div class="radio-inline">
			<input type="radio" name="ical_users" id="ical_users_moi" value="ical_users_moi" checked="checked" class="top-0" onClick="xajax_icalGenererLien(getRadioValue('ical_users'), getRadioValue('ical_projets'), getCheckboxes('formIcal', 'icalProjetsChoix'));">
			<label for="ical_users_moi">{#icalExport_users_moi#}</label>
			<br>
			<input type="radio" name="ical_users" id="ical_users_tous" value="ical_users_tous" class="top-0" onClick="xajax_icalGenererLien(getRadioValue('ical_users'), getRadioValue('ical_projets'), getCheckboxes('formIcal', 'icalProjetsChoix'));">
			<label for="ical_users_tous">{#icalExport_users_tous#}</label>
			<br><br>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">{#icalExport_projets#} :</label>
		<div class="col-md-6 radio-inline">
			<input type="radio" name="ical_projets" id="ical_projets_tous" value="ical_projets_tous" checked="checked" onClick="$('#divIcalProjets').addClass('hidden');" class="top-0" onClick="xajax_icalGenererLien(getRadioValue('ical_users'), getRadioValue('ical_projets'), getCheckboxes('formIcal', 'icalProjetsChoix'));">
			<label for="ical_projets_tous">{#icalExport_projets_tous#}</label>
			<br>
			<input type="radio" name="ical_projets" id="ical_projets_liste" value="ical_projets_liste" class="top-0" onClick="$('#divIcalProjets').removeClass('hidden');xajax_icalGenererLien(getRadioValue('ical_users'), getRadioValue('ical_projets'), getCheckboxes('formIcal', 'icalProjetsChoix'));">
			<label for="ical_projets_liste">{#icalExport_projets_liste#}</label>
			<div id="divIcalProjets" class="hidden">
				{foreach from=$listeProjets item=projet}
					<label class="control-label" for="icalProjetsChoix_{$projet.projet_id}">
						<input type="checkbox" class="top-0" id="icalProjetsChoix_{$projet.projet_id}", value="{$projet.projet_id}" onClick="xajax_icalGenererLien(getRadioValue('ical_users'), getRadioValue('ical_projets'), getCheckboxes('formIcal', 'icalProjetsChoix'));">
					{$projet.nom} ({$projet.projet_id})</label>
				<br />
				{/foreach}
			</div>
			<br><br>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">{#icalExport_url#} :</label>
		<div class="col-md-5 left-0 form-inline">
			<input type="text" id="inputLienIcal" value="{$lienIcal}" class="form-control">
		    <span onmouseover="return coolTip('{#ical_instructions#|escape:"quotes"}', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
			<br><br>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">{#icalExport_download#} :</label>
		<div class="col-md-6 left-0 form-inline">
			<a href="export_ical.php"><img src="assets/img/pictos/download.png" class="picto-large" /></a>
			&nbsp;<span onmouseover="return coolTip('{#ical_instructions2#}', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
		</div>
	</div>
</form>