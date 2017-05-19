{* Smarty *}

<form class="form-horizontal" method="post" action="" onsubmit="return false;" name="formUser" >
{* pour tester si compte déjà existant ou pas *}
<input type="hidden" id="user_id_origine" value="{$user_form.user_id}">
<div class="container-fluid">
	<div class="form-group col-md-12">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3">{#user_identifiant#} :</label>
				<div class="col-md-6">
					{if $user_form.saved eq 1}
						<p class="form-control-static">{$user_form.user_id|escape:"html"}</p>
						<input id="user_id" type="hidden" value="{$user_form.user_id|escape:"html"}" />
					{else}
						<input class="form-control" id="user_id" type="text" value="{$user_form.user_id|escape:"html"}" maxlength="10" />
					{/if}
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3">{#user_groupe#} :</label>
				<div class="col-md-6">
					<select id="user_groupe_id" class="form-control">
						<option value="">- - - - - - - - - - -</option>
						{foreach from=$groupes item=groupe}
							<option value="{$groupe.user_groupe_id}" {if $user_form.user_groupe_id eq $groupe.user_groupe_id}selected="selected"{/if}>{$groupe.nom|escape}</option>
						{/foreach}
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group col-md-12">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3">{#user_nom#} :</label>
				<div class="col-md-6">
					<input id="nom" class="form-control" type="text" value="{$user_form.nom|escape:"html"}" maxlength="100" />
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3">{#user_email#} :</label>
				<div class="col-md-6">
					<input id="email_user" class="form-control" type="text" value="{$user_form.email|escape:"html"}" maxlength="255" />
				</div>
			</div>
		</div>
	</div>
	<div class="form-group col-md-12">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3">{#user_login#} :</label>
				<div class="col-md-6">
					<input id="login_tmp" class="form-control" type="text" value="{$user_form.login|escape:"html"}" maxlength="30" />
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3">{#user_password#} :</label>
				<div class="col-md-6">
					<input id="password_tmp" class="form-control" type="password" value="" maxlength="20" />
				</div>
			</div>
		</div>
	</div>
	<ul class="nav nav-tabs">
        <li class="active"><a href="#droits" data-toggle="tab">Droits</a></li>
        <li><a href="#perso" data-toggle="tab">Personalisation & notifications</a></li>
        <li><a href="#infos" data-toggle="tab">Infos personnelles</a></li>
        <li><a href="#calendar"   data-toggle="tab">Calendrier</a></li>
	</ul>
	
	<div class="tab-content">	
		<div class="tab-pane in active" id="droits">
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2">{#droits_utilisateurs#} :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio"name="users_manage" id="droit1" value="" {if !in_array("users_manage_all", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_aucundroitUser#}
							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio"name="users_manage" id="users_manage_all" value="users_manage_all" {if in_array("users_manage_all", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_gererTousUsers#}
							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2">{#droits_projets#} :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="projects_manage" id="droit2" value="" {if !in_array("projects_manage_all", $user_form.tabDroits) && !in_array("projects_manage_own", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_aucunDroitProjets#}
							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="projects_manage" id="projects_manage_all" value="projects_manage_all" {if in_array("projects_manage_all", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_gererTousProjets#}
							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="projects_manage" id="projects_manage_own" value="projects_manage_own" {if in_array("projects_manage_own", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_uniquementProjProprio#}
							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2">{#droits_groupesProjets#} :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="projectgroups_manage" id="droit3" value="" {if !in_array("projectgroups_manage_all", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_groupesProjetsAucun#}
							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="projectgroups_manage" id="projectgroups_manage_all" value="projectgroups_manage_all" {if in_array("projectgroups_manage_all", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_gererTousGroupes#}
							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2">{#droits_modifPlanning#} :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="planning_modif" id="tasks_readonly" value="tasks_readonly" {if in_array("tasks_readonly", $user_form.tabDroits) || (!in_array("tasks_modify_all", $user_form.tabDroits) && !in_array("tasks_modify_own_project", $user_form.tabDroits) && !in_array("tasks_modify_own_task", $user_form.tabDroits))}checked="checked"{/if}>&nbsp;{#droits_planningLectureSeule#}
							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="planning_modif" id="tasks_modify_all" value="tasks_modify_all" {if in_array("tasks_modify_all", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_planningTousProjets#}
							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="planning_modif" id="tasks_modify_own_project" value="tasks_modify_own_project" {if in_array("tasks_modify_own_project", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_planningProjetsProprio#}
							</label>
							<br /><label class="radio-inline tailleDroits">
								<input type="radio" name="planning_modif" id="tasks_modify_own_task" value="tasks_modify_own_task" {if in_array("tasks_modify_own_task", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_planningTachesAssignees#}
							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2">{#droits_vuePlanning#} :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="planning_view" id="tasks_view_all_projects" value="tasks_view_all_projects" {if in_array("tasks_view_all_projects", $user_form.tabDroits) || !in_array("tasks_view_own_projects", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_vueTousProjets#}
							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="planning_view" id="tasks_view_team_projects" value="tasks_view_team_projects" {if in_array("tasks_view_team_projects", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_vueProjetsEquipe#}
							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="planning_view" id="tasks_view_own_projects" value="tasks_view_own_projects" {if in_array("tasks_view_own_projects", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_vueProjetsAssignes#}
							</label>
							<br /><label class="radio-inline tailleDroits">
								<input type="radio" name="planning_view" id="tasks_view_only_own" value="tasks_view_only_own" {if in_array("tasks_view_only_own", $user_form.tabDroits)}checked="checked"{/if}>{#droits_tasks_view_only_own#}
							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2">{#droits_lieux#} :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="lieux" id="droit6" value="" {if !in_array("lieux_all", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_aucunLieux#}
							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="lieux" id="lieux_all" value="lieux_all" {if in_array("lieux_all", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_lieuxAcces#}
							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2">{#droits_ressources#} :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="ressources" id="droit7" value="" {if !in_array("ressources_all", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_aucunRessources#}
							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="ressources" id="ressources_all" value="ressources_all" {if in_array("ressources_all", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_ressourcesAcces#}
							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2">{#droits_parametres#} :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="parameters" id="droit5" value="" {if !in_array("parameters_modify", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_aucunParametres#}
							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="parameters" id="parameters_modify" value="parameters_all" {if in_array("parameters_all", $user_form.tabDroits)}checked="checked"{/if}>&nbsp;{#droits_parametresAcces#}
							</label>
						</div>
					</div>
				</div>
		</div>
		<div class="tab-pane" id="perso">
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-3">{#user_visiblePlanning#} :</label>
						<div class="col-md-2">
							<label class="radio-inline tailleDroits">
								<input type="radio" id="visible_planningOui" name="visible_planning" value="oui" {if ($user_form.saved eq 0) || ($user_form.visible_planning eq "oui")}checked="checked"{/if}>&nbsp;{#oui#}
							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" id="visible_planningNon" name="visible_planning" value="non" {if ($user_form.saved eq 1) && ($user_form.visible_planning eq "non")}checked="checked"{/if}>&nbsp;{#non#}
							</label>
						</div>
						<div class="col-md-2"></div>
						<label class="control-label col-md-2">{#user_couleur#} :</label>
						<div class="col-md-2">
							{if $smarty.session.couleurExUser neq ""}
								{assign var=couleurExUser value=$smarty.session.couleurExUser}
							{else}
								{assign var=couleurExUser value="ffffff"}
							{/if}
							{if $smarty.const.CONFIG_PROJECT_COLORS_POSSIBLE neq ""}
								<select name="couleur" id="couleur" style="background-color:#{$user_form.couleur};color:{"#"|cat:$user_form.couleur|buttonFontColor}" class="form-control jscolor" >
									{if $user_form.couleur eq ""}<option value="">{#winProjet_couleurchoix#}</option>{/if}
									{foreach from=","|explode:$smarty.const.CONFIG_PROJECT_COLORS_POSSIBLE item=couleurTmp}
										<option value="{$couleurTmp|replace:'#':''}" style="background-color:{$couleurTmp};color:{$couleurTmp|buttonFontColor}" {if $couleurTmp eq "#"|cat:$user_form.couleur}selected="selected"{/if}>{$couleurTmp|replace:'#':''}</option>
									{/foreach}
								</select>
								<span class="w50" style="background-color:{$user_form.couleur}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
							{else}
								<input id="couleur" type="text" class="form-control" maxlength="6" value="{if $projet.couleur eq ''}{$couleurExUser}{else}{$user_form.couleur|escape:"html"}{/if}" maxlength="20"/>
							{/if}
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-3">{#user_notifications#} :</label>
						<div class="col-md-2">
							<label class="radio-inline tailleDroits">
								<input type="radio" id="notificationsOui" name="notifications" value="oui" {if $user_form.notifications eq "oui"}checked="checked"{/if}> &nbsp;{#oui#}
							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" id="notificationsNon" name="notifications" value="non" {if $user_form.notifications eq "non"}checked="checked"{/if}>&nbsp;{#non#}
							</label>
						</div>
				{if $user_form.saved eq 0}
						<div class="col-md-2"></div>
						<div class="col-md-2">
							<label class="checkbox-inline col-md-3">
								<input type="checkbox" id="envoiMailPwd" name="envoiMailPwd" value="true" />&nbsp;{#user_mailPwd#}
							</label>
						</div>
				{else}
					<input type="hidden" id="envoiMailPwd" name="envoiMailPwd" value="false" />
				{/if}
				</div>
			</div>
		</div>	
    <div class="tab-pane" id="infos">
			<div class="form-group col-md-12">
				<div class="form-group">
					<label class="control-label col-md-3">{#user_adress#} :</label>
					<div class="col-md-6">
						<input id="user_adress" class="form-control" type="text" value="{$user_form.adresse|escape:"html"}" maxlength="100" />
					</div>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="form-group">
					<label class="control-label col-md-3">{#user_phone#} :</label>
					<div class="col-md-2">
						<input id="user_phone" class="form-control" type="text" value="{$user_form.telephone|escape:"html"}" maxlength="20" />
					</div>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="form-group">
					<label class="control-label col-md-3">{#user_mobile#} :</label>
					<div class="col-md-2">
						<input id="user_mobile" class="form-control" type="text" value="{$user_form.mobile|escape:"html"}" maxlength="20" />
					</div>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="form-group">
					<label class="control-label col-md-3">{#user_metier#} :</label>
					<div class="col-md-4">
						<input id="user_metier" class="form-control" type="text" value="{$user_form.metier|escape:"html"}" maxlength="100" />
					</div>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="form-group">
					<label class="control-label col-md-3">{#user_comment#} :</label>
					<div class="col-md-4">
						<textarea id="user_comment" class="form-control">{$user_form.commentaire|escape:"html"}</textarea>
					</div>
				</div>
			</div>
		</div>
<!-- Calendrier -->          
		<div class="tab-pane" id="calendar">
      <div class="form-group col-md-4" id='minicalContent'>
      {include file="www_minical.tpl"}
      </div>
      <div class="form-group col-md-2">&nbsp;</div>
      <div class="form-group col-md-6">
        {#exception#}
        <select name="exceptions" multiple="multiple" size="5" class="form-control" id="listExeptionDays">
          {foreach from=$minicalExceptions item=Exc}
            <option value="{$Exc}">{$Exc}/{$minical|substr:4:2}/{$minical|substr:0:4}</option>
          {/foreach}
        </select>
        {#utilisables#} <span id="minicalUseable">{$minicalUseable}</span> {#jours#}
        </div>
    </div>
<!-- /Calendrier -->
  </div>
	
	<div class="form-group col-md-12">
		<div class="col-md-12">
			<div class="col-md-6">
				<input type="button" class="btn btn-primary" value="{#submit#}" onClick="xajax_submitFormUser($('#user_id').val(), $('#user_id_origine').val(), $('#user_groupe_id').val(), $('#nom').val(), $('#email_user').val(), $('#login_tmp').val(), $('#password_tmp').val(), $('#visible_planningOui').is(':checked'), $('#couleur').val(), $('#notificationsOui').is(':checked'), $('#envoiMailPwd').is(':checked'), new Array(getRadioValue('users_manage'), getRadioValue('projects_manage'), getRadioValue('projectgroups_manage'), getRadioValue('planning_modif'), getRadioValue('planning_view'), getRadioValue('lieux'), getRadioValue('ressources'), getRadioValue('parameters')),$('#user_adress').val(),$('#user_phone').val(),$('#user_mobile').val(),$('#user_metier').val(),$('#user_comment').val());" />
			</div>
		</div>
	</div>
</div>
