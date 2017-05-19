{* Smarty *}
<form class="form-horizontal" method="POST" action="" target="_blank">
	<input type="hidden" id="periode_id" name="periode_id" value="{$periode.periode_id}" />
	<input type="hidden" id="saved" name="saved" value="{$periode.saved}" />
	<div class="container-fluid">
		<div class="form-group col-md-12">
			<label class="col-md-2 control-label">{#winPeriode_projet#} :</label>
			<div class="col-md-4">
				<select name="projet_id" id="projet_id" class="form-control select2" tabindex="1">
					<option value="">- - - - - - - - - - -</option>
					{assign var="groupeCourant" value="-1"}
					{foreach from=$listeProjets item=projet}
						{if $groupeCourant != $projet.groupe_id}
							{assign var="groupeCourant" value=$projet.groupe_id}
							{if $projet.groupe_id == ""}
								{assign var="nomgroupe" value=#projet_liste_sansGroupes#}
							{else}
								{assign var="nomgroupe" value=$projet.nom_groupe}
							{/if}
							<optgroup label="{$nomgroupe}"></optgroup>
						{/if}
						<option value="{$projet.projet_id}" {if $periode.projet_id eq $projet.projet_id}selected="selected"{/if} {if isset($projet_id_choisi) && $projet_id_choisi eq $projet.projet_id}selected="selected"{/if}>{$projet.nom} ({$projet.projet_id}) {if $projet.livraison neq ''} - S{$projet.livraison}{/if}</option>
					{/foreach}
				</select>
			</div>
			<label class="col-md-2 control-label">{#winPeriode_user#} :</label>
			<div class="col-md-4">
				<select multiple="multiple" name="user_id" id="user_id" class="form-control" tabindex="2">
							{assign var=groupeTemp value=""}
							{foreach from=$listeUsers item=userCourant name=loopUsers}
								{if $userCourant.user_groupe_id neq $groupeTemp}
									<optgroup label="{$userCourant.groupe_nom}">
								{/if}
								<option value="{$userCourant.user_id}" {if $periode.user_id eq $userCourant.user_id}selected="selected"{/if} {if isset($user_id_choisi) && $user_id_choisi eq $userCourant.user_id}selected="selected"{/if}>{$userCourant.nom} - {$userCourant.user_id}</option>
								{if $userCourant.user_groupe_id neq $groupeTemp}
									</optgroup>
								{/if}
								{assign var=groupeTemp value=$userCourant.user_groupe_id}
						{/foreach}
				</select>
			</div>
		</div>
		{if isset($estFilleOuParente)}
		<div class="form-group col-md-12">
			<label class="col-md-2 control-label"></label>
			<div class="col-md-4">
				<label class="checkbox-inline"><input type="checkbox" checked="checked" id="appliquerATous" value="1">	{#winPeriode_appliquerATous#}</label>
			</div>
		</div>
		{/if}
		<div class='col-md-12 top-5'><hr /></div>
		<div class="form-group col-md-12">
			<label class="col-md-2 control-label">{#winPeriode_debut#} :</label>
			<div class="col-md-2">
				<input type="text" class="form-control" name="date_debut" id="date_debut" maxlength="10" value="{$periode.date_debut|sqldate2userdate}" class="datepicker" tabindex="4" />
			</div>
		</div>
		<div class="form-group col-md-12">		
			<label class="col-md-2 control-label">{#winPeriode_fin#} :</label>
			<div class="col-md-6">
				<label class="radio-inline">
					<input type="radio" name="radioChoixFin" id="radioChoixFinDate" value="" {if $periode.duree_details eq ""}checked="checked"{/if} onChange="$('#divFinChoixDate').removeClass('hidden');$('#divFinChoixDuree').addClass('hidden');" tabindex="5" />&nbsp;{#winPeriode_finChoixDate#}
				</label>
				<label class="radio-inline">
					<input type="radio" name="radioChoixFin" id="radioChoixFinDuree" value="" {if $periode.duree_details neq ""}checked="checked"{/if} onChange="$('#divFinChoixDuree').removeClass('hidden');$('#divFinChoixDate').addClass('hidden');" tabindex="6" />&nbsp;{#winPeriode_finChoixDuree#}
				</label>
			</div>
		</div>
			{* choix du jour de fin *}
		<div class="form-group col-md-12 form-inline{if $periode.duree_details neq ""} hidden{/if}" id="divFinChoixDate">
			<div class="col-md-2"></div>
			<div class="col-md-4">
				<input type="text" class="form-control datepicker" name="date_fin" id="date_fin" maxlength="10" value="{$periode.date_fin|sqldate2userdate}" onFocus="remplirDateFinPeriode();videChampsFinTache(this.id);" onChange="videChampsFinTache(this.id);" tabindex="7" />
			{if $periode.periode_id eq 0}
				{#winPeriode_ouNBJours#} :
				<input type="text" class="form-control" name="nb_jours" id="nb_jours" size="1" maxlength="2" onChange="videChampsFinTache(this.id);" tabindex="10" />
				<input type="hidden" id="conserver_duree" value="" />
			{else}
				<input type="hidden" id="nb_jours" value="" />
			{/if}
			{if $periode.periode_id neq 0 && $periode.date_fin neq ""}
				<label class="checkbox-inline" ><input type="checkbox" id="conserver_duree" name="conserver_duree" value="1" onClick="toggle2('bloc_date_fin');" tabindex="11" />{#winPeriode_conserverDuree#|sprintf:$nbJours}</label>
			{/if}
			</div>
		</div>
			{* choix de la durée *}
			<div class="form-group col-md-12 form-inline {if $periode.duree_details eq ''} hidden{/if}" id="divFinChoixDuree">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					{#winPeriode_ouNBHeures#} <span onmouseover="return coolTip('{#winPeriode_FormatDuree#|escape:"quotes"}', WIDTH, 200)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span> :
					<input type="text" class="form-control" name="duree" id="duree" size="3" maxlength="5" value="{if $periode.duree_details eq 'duree'}{$periode.duree|sqltime2usertime}{/if}" onFocus="if(this.value == '')this.value='{$smarty.const.CONFIG_DURATION_DAY|usertime2sqltime:"short"}';" onChange="videChampsFinTache(this.id);" tabindex="12" />
				</div>
				<div class="col-md-7">
					{#winPeriode_heureDebut#} <span onmouseover="return coolTip('{#winPeriode_FormatDuree#|escape:"quotes"}', WIDTH, 200)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span> :
					<input type="text" class="form-control" id="heure_debut" id="heure_debut" size="3" maxlength="5" value="{if isset($periode.duree_details_heure_debut)}{$periode.duree_details_heure_debut|sqltime2usertime}{/if}" onChange="videChampsFinTache(this.id);" tabindex="13" />
					{#winPeriode_heureFin#} <span onmouseover="return coolTip('{#winPeriode_FormatDuree#|escape:"quotes"}', WIDTH, 200)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span> : 
					<input type="text" class="form-control" id="heure_fin" size="3" maxlength="5" value="{if isset($periode.duree_details_heure_fin)}{$periode.duree_details_heure_fin|sqltime2usertime}{/if}" onChange="videChampsFinTache(this.id);" tabindex="14" />
					<br />
					<label class="checkbox-inline"><input type="checkbox" id="matin" onChange="videChampsFinTache(this.id);" {if $periode.duree_details eq 'AM'}checked="checked"{/if} tabindex="15">{#winPeriode_matin#} ({$smarty.const.CONFIG_DURATION_AM}{#tab_h#})</label>
					<label class="checkbox-inline"><input type="checkbox" id="apresmidi" onChange="videChampsFinTache(this.id);" {if $periode.duree_details eq 'PM'}checked="checked"{/if} tabindex="16">{#winPeriode_apresmidi#} ({$smarty.const.CONFIG_DURATION_PM}{#tab_h#})</label>
				</div>
			</div>
		<div class="form-group col-md-12">
			{if !isset($estFilleOuParente)}
				<input type="hidden" id="appliquerATous" value="0">
				<label class="col-md-2 control-label">{#winPeriode_repeter#} :</label>
				<div class="col-md-3">
					<select name="repetition" id="repetition" 
						onChange="{literal}
						if(this.value=='jour'){$('#divOptionsRepetitionJour').removeClass('hidden');$('#divExceptionRepetition').removeClass('hidden');}else{$('#divOptionsRepetitionJour').addClass('hidden');}	if(this.value=='semaine'){$('#divOptionsRepetitionSemaine').removeClass('hidden');$('#divExceptionRepetition').removeClass('hidden');}else{$('#divOptionsRepetitionSemaine').addClass('hidden');}
						if(this.value=='mois'){$('#divOptionsRepetitionMois').removeClass('hidden');$('#divExceptionRepetition').removeClass('hidden');}else{$('#divOptionsRepetitionMois').addClass('hidden');}
						if(this.value==''){$('#divOptionsRepetitionJour').addClass('hidden');$('#divOptionsRepetitionSemaine').addClass('hidden');$('#divOptionsRepetitionMois').addClass('hidden');$('#divExceptionRepetition').addClass('hidden');}
						{/literal}" class="form-control" tabindex="17">
							<option value="">{#winPeriode_repeter_pasderepetition#}</option>
							<option value="jour">{#winPeriode_repeter_jour#}</option>
							<option value="semaine">{#winPeriode_repeter_semaine#}</option>
							<option value="mois">{#winPeriode_repeter_mois#}</option>
					</select>
				</div>
				<div class="col-md-7 form-inline">				
						<span id="divOptionsRepetitionJour" class="hidden" tabindex="18">
							{#winPeriode_repeter_tousles#}
							<select name='nbRepetitionJour' class="form-control input-2-digit">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							</select>
							{#winPeriode_jour#}&nbsp;{#winPeriode_repeter_jusque#}
						<input type="text" class="form-control" id="dateFinRepetitionJour" value="" size="11" maxlength="10" class="datepicker" onFocus="remplirDateRepetition(this.id);" tabindex="18">
						</span>
						<span id="divOptionsRepetitionSemaine" class="hidden" tabindex="19">
							{#winPeriode_repeter_tousles#}
							<select name='nbRepetitionSemaine' id='nbRepetitionSemaine' class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							</select>
							&nbsp;{#winPeriode_semaine#}&nbsp;{#winPeriode_repeter_jusque#}
							<input type="text" class="form-control datepicker" id="dateFinRepetitionSemaine" value="" size="11" maxlength="10" onFocus="remplirDateRepetition(this.id);" tabindex="18">
							<br />
							<label class="radio control-label">{#winPeriode_repeter_jourderepetition#} :</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="1" checked="checked" />{#initial_day_1#}</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="2" />{#initial_day_2#}</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="3" />{#initial_day_3#}</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="4" />{#initial_day_4#}</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="5" />{#initial_day_5#}</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="6" />{#initial_day_6#}</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="0" />{#initial_day_0#}</label>
							</span>
						<span id="divOptionsRepetitionMois" class="hidden" tabindex="18">
							{#winPeriode_repeter_tousles#}
							<select name='nbRepetitionMois' id='nbRepetitionMois' class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							</select>
							&nbsp;{#winPeriode_mois#}&nbsp;{#winPeriode_repeter_jusque#}
							<input type="text" class="form-control datepicker" id="dateFinRepetitionMois" value="" size="11" maxlength="10" class="datepicker" onFocus="remplirDateRepetition(this.id);" tabindex="18">
							<br />
							<label class="radio control-label">{#winPeriode_repeter_jourderepetition#} :</label>
							<label class="radio-inline"><input type="radio" name="radioChoixJourRepetition" id="radioChoixJourRepetition" value="0" checked="checked" />{#winPeriode_repeter_jourderepetition_jourmois#}</label>
						</span>
						<div id="divExceptionRepetition" class="form-group form-inline hidden" tabindex="19">
							<label class="radio control-label">{#winPeriode_repeter_exception_siferie#} :</label>
							<label class="radio-inline"><input type="radio" name="exceptionRepetition" id="exceptionRepetition" value="1" checked="checked" />{#winPeriode_repeter_exception_decaler#}</label>
							<label class="radio-inline"><input type="radio" name="exceptionRepetition" id="exceptionRepetition" value="2" />{#winPeriode_repeter_exception_pasajout#}</label>
							<label class="radio-inline"><input type="radio" name="exceptionRepetition" id="exceptionRepetition" value="3" />{#winPeriode_repeter_exception_ajout#}</label>
						</div>
					</div>
			{else}
					<label class="col-md-1 control-label">{#winPeriode_repeter#} :</label>
					<div class="col-md-6">
					<br />
						<b>{#winPeriode_recurrente#}{$prochaineOccurence|sqldate2userdate}</b>
					</div>
					<input type="hidden" name="repetition" />
					<input type="hidden" name="dateFinRepetitionJour" />
					<input type="hidden" name="dateFinRepetitionSemaine" />
					<input type="hidden" name="dateFinRepetitionMois" />
					<input type="hidden" name="nbRepetitionJour" />
					<input type="hidden" name="nbRepetitionSemaine" />
					<input type="hidden" name="nbRepetitionMois" />
					<input type="hidden" name="jourSemaine" />
			{/if}
		</div>
		<div class='col-md-12 top-5'><hr /></div>
		<div class="form-group col-md-12">
			<label class="col-md-2 control-label">{#winPeriode_statut#} :</label>
			<div class="col-md-3">
				<select name="statut_tache" id="statut_tache" class="form-control" tabindex="19">
					<option value="a_faire" {if $periode.statut_tache eq "a_faire"}selected="selected"{/if}>{#winPeriode_statut_a_faire#}</option>
					<option value="en_cours" {if $periode.statut_tache eq "en_cours"}selected="selected"{/if}>{#winPeriode_statut_en_cours#}</option>
					<option value="fait" {if $periode.statut_tache eq "fait"}selected="selected"{/if}>{#winPeriode_statut_fait#}</option>
					<option value="abandon" {if $periode.statut_tache eq "abandon"}selected="selected"{/if}>{#winPeriode_statut_abandon#}</option>
				</select>
			</div>
			<div class="col-md-1"></div>
			<label class="col-md-2 control-label">{#winPeriode_livrable#} :</label>
			<div class="col-md-3" >
				<select name="livrable" id="livrable" class="form-control" tabindex="20">
					<option value="oui" {if $periode.livrable eq "oui"}selected="selected"{/if}>{#oui#}</option>
					<option value="non" {if $periode.livrable eq "non"}selected="selected"{/if}>{#non#}</option>
				</select>
			</div>
		</div>
		<div class="form-group col-md-12">
		{if $smarty.const.CONFIG_SOPLANNING_OPTION_LIEUX == 1 }
			<label class="col-md-2 control-label">{#winPeriode_lieu#} :</label>
				<div class="col-md-3">
					<select name="lieu" id="lieu" class="form-control select2" tabindex="19">
						<option value="">- - - - - - - - - - -</option>
						{foreach from=$listeLieux item=lieuTmp}
							<option value="{$lieuTmp.lieu_id}" {if $periode.lieu eq $lieuTmp.lieu_id} selected="selected" {/if}>{$lieuTmp.nom}</option>
						{/foreach}
					</select>
				</div>
				<div class="col-md-1"></div>
		{/if}
		{if $smarty.const.CONFIG_SOPLANNING_OPTION_RESSOURCES == 1 }		
			<label class="col-md-2 control-label" {if $smarty.const.CONFIG_SOPLANNING_OPTION_LIEUX == 1 } {/if}>{#winPeriode_ressource#} :</label>
				<div class="col-md-3" {if $smarty.const.CONFIG_SOPLANNING_OPTION_LIEUX == 1 }{/if}>
					<select name="ressource" id="ressource" class="form-control select2" tabindex="20">
						<option value="">- - - - - - - - - - -</option>
						{foreach from=$listeRessources item=ressourceTmp}
							<option value="{$ressourceTmp.ressource_id}" {if $periode.ressource eq $ressourceTmp.ressource_id} selected="selected" {/if}>{$ressourceTmp.nom}</option>
						{/foreach}
					</select>
				</div>
		{/if}
		{if $smarty.const.CONFIG_SOPLANNING_OPTION_LIEUX == 0 }
		<input type="hidden" name="lieu" id="lieu" value="">
		{/if}
		{if $smarty.const.CONFIG_SOPLANNING_OPTION_RESSOURCES == 0 }		
		<input type="hidden" name="ressource" id="ressource" value="">
		{/if}		
		</div>
		<div class='col-md-12 top-5'><hr /></div>
		<div class="form-group col-md-12">
			<label class="col-md-2 control-label">{#winPeriode_titre#} :</label>
			<div class="col-md-9">
				<input type="text" class="form-control input-xxxlarge" name="titre" id="titre" maxlength="2000" value="{$periode.titre|escape}" onFocus="xajax_autocompleteTitreTache($('#projet_id').val());" class="input-xxlarge" tabindex="21" />
			</div>
		</div>
		<div class="form-group col-md-12 form-inline">
			<label class="col-md-2 control-label">{#winPeriode_lien#} :</label>
			<div class="col-md-10">
				<input type="text" class="form-control input-xxxlarge" name="lien" id="lien" maxlength="2000" value="{$periode.lien}" tabindex="22" />
				{if $periode.lien neq ""}
				<span onmouseover="return coolTip('{#winPeriode_gotoLien#|escape}', WIDTH, 270)" onmouseout="nd()" onclick="window.open('{if $periode.lien|strpos:"http" !== 0 && $periode.lien|strpos:"\\" !== 0}http://{/if}{$periode.lien}', '_blank')" target="_blank" class="glyphicon glyphicon-share"></span>
				{/if}
			</div>
		</div>
		<div class="form-group col-md-12">
			<label class="col-md-2 control-label">{#winPeriode_commentaires#} :</label>
			<div class="col-md-9">
				<textarea class="form-control input-xxxlarge" id="notes" name="notes" tabindex="23">{$periode.notes_xajax|escape:"html"}</textarea>
			</div>
		</div>
		<div class="form-group col-md-12 form-inline">
			<label class="col-md-2 control-label">{#winPeriode_custom#} :</label>
			<div class="col-md-10">
				<input type="text" class="form-control input-xxxlarge" name="custom" id="custom" maxlength="255" value="{$periode.custom}" tabindex="23" />
				<span onmouseover="return coolTip('{#winPeriode_custom_aide#|escape:"quotes"}', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
			</div>
		</div>

	{if !in_array("tasks_readonly", $user.tabDroits)}
		<div class="col-md-12 text-right form-inline">
		<div class="btn-group pull-right form-group">
			<input id="butSubmitPeriode" type="button" class="btn btn-primary" tabindex="24" value="{#winPeriode_valider#|escape:"html"}" onClick="$('#divPatienter').removeClass('hidden');this.disabled=true;users_ids=getSelectValue('user_id');xajax_submitFormPeriode('{$periode.periode_id}', $('#projet_id').val(), users_ids, $('#date_debut').val(), $('#conserver_duree').is(':checked'), $('#date_fin').val(), $('#nb_jours').val(), $('#duree').val(), $('#heure_debut').val(), $('#heure_fin').val(), $('#matin').is(':checked'), $('#apresmidi').is(':checked'), $('#repetition option:selected').val(), $('#dateFinRepetitionJour').val(),$('#dateFinRepetitionSemaine').val(),$('#dateFinRepetitionMois').val(), $('#nbRepetitionJour option:selected').val(),$('#nbRepetitionSemaine option:selected').val(),$('#nbRepetitionMois option:selected').val(),getRadioValue('jourSemaine'),getRadioValue('exceptionRepetition'),$('#appliquerATous').is(':checked'), $('#statut_tache').val(),$('#lieu option:selected').val(), $('#ressource option:selected').val(), $('#livrable').val(), $('#titre').val(), $('#notes').val(), $('#lien').val(), $('#custom').val());" />
			{if $periode.periode_id neq 0 && (in_array("projects_manage_all", $user.tabDroits) || in_array("projects_manage_own", $user.tabDroits) || (in_array("tasks_modify_own_task", $user.tabDroits) && $periode.user_id eq $user.user_id))}
				<input type="button" class="btn btn-default" onClick="if(confirm('{#winPeriode_dupliquer#|escape:"javascript"} ?'))xajax_ajoutPeriode('', '', {$periode.periode_id});" value="{#winPeriode_dupliquer#}" />
				<input type="button" class="btn btn-warning" onClick="if(confirm('{#winPeriode_confirmSuppr#|escape:"javascript"}'))xajax_supprimerPeriode({$periode.periode_id}, false);" value="{#winPeriode_supprimer#}" />
				{if isset($estFilleOuParente)}
					<input type="button" class="btn btn-default" onClick="if(confirm('{#winPeriode_confirmSupprRepetition#|escape:"javascript"}'))xajax_supprimerPeriode({$periode.periode_id}, true);" value="{#winPeriode_supprimer_repetition#}" />
					<input type="button" class="btn btn-default" onClick="if(confirm('{#winPeriode_confirmSupprRepetition#|escape:"javascript"}'))xajax_supprimerPeriode({$periode.periode_id}, 'avant');" value="{#winPeriode_supprimer_repetition_avant#}" />
					<input type="button" class="btn btn-default" onClick="if(confirm('{#winPeriode_confirmSupprRepetition#|escape:"javascript"}'))xajax_supprimerPeriode({$periode.periode_id}, 'apres');" value="{#winPeriode_supprimer_repetition_apres#}" />
				{/if}
			{/if}
		</div>
		<div id="divPatienter" class="hidden form-group"><img src="assets/img/pictos/loading16.gif" class="picto" /></div>
		</div>
		
	</div>
	{/if}
</form>
{literal}
	<script language="javascript">
		jQuery('#user_id').multiselect({
			enableCaseInsensitiveFiltering: true,
			numberDisplayed: 4,
			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,
			buttonWidth: 250,
			maxHeight: 400,
			filterPlaceholder: {/literal}"{#js_choisirUtilisateur#|escape:"javascript"}"{literal},
			enableFiltering: true,
			includeSelectAllOption: true,
			selectAllText: {/literal}"{#js_selectionnerTout#|escape:"javascript"}"{literal},
			nonSelectedText: {/literal}"{#js_selectionAucuns#|escape:"javascript"}"{literal},
			nSelectedText: {/literal}"{#js_nSelection#|escape:"javascript"}"{literal},
			allSelectedText: {/literal}"{#js_selectionTous#|escape:"javascript"}"{literal},
			selectAllJustVisible: true
		});
	</script>
{/literal}