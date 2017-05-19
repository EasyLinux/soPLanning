{* Smarty *}

{include file="www_header.tpl"}

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box form-inline">
				<div class="btn-group">
					<a href="javascript:xajax_modifUser();undefined;" class="btn btn-sm btn-default" ><img src="assets/img/pictos/adduser.png" class="picto-large" alt="" />&nbsp;{#menuCreerUser#}</a>
					<a href="{$BASE}/user_groupes.php" class="btn btn-sm btn-default"><img src="assets/img/pictos/user_groupes.png" class="picto-large" alt="" />&nbsp;{#menuGroupesUsers#}</a>
				</div>

				<div class="btn-group">
					<form method="POST">
					<button class="btn {if $filtreEquipe|@count > 0}btn-danger{else}btn-default{/if} dropdown-toggle btn-sm margin-left-30" data-toggle="dropdown">{#filtreEquipe#}&nbsp;<span class="caret"></span></button>
					<ul class="dropdown-menu">
						{if $filtreEquipe|@count > 0}
							<a href="?desactiverfiltreEquipe=1" class="btn btn-danger btn-sm margin-left-10">{#formFiltreUserDesactiver#}</a>
						{/if}
						<li>
							<input type="hidden" name="filtreEquipe" value="1">
							<table onClick="event.cancelBubble=true;" class="margin-10">
								<tr>
									<td>
										<input type="checkbox" id="gu0" name="gu0" value="1" {if in_array("gu0", $filtreEquipe)}checked="checked"{/if} /><label for="gu0" style="display:inline">&nbsp;<b>{#cocheUserSansGroupe#}</b></label>

										{if $equipes|@count > 0}
											{math assign=nbColonnes equation="ceil(nbEquipes / nbEquipesParColonnes)" nbEquipes=$equipes|@count nbEquipesParColonnes=$smarty.const.FILTER_NB_USERS_PER_COLUMN}
											{math assign=maxCol equation="ceil(nbEquipes / nbColonnes)" nbEquipes=$equipes|@count nbColonnes=$nbColonnes}
											{assign var=tmpNbDansColCourante value="0"}
											{foreach from=$equipes item=equipeCourante name=loopEquipes}
												<br/>
												{if $tmpNbDansColCourante >= $maxCol}
													{assign var=tmpNbDansColCourante value="0"}
													</td>
													<td>
												{/if}
												<input type="checkbox" id="gu{$equipeCourante.user_groupe_id}" name="gu[]" value="{$equipeCourante.user_groupe_id}" onClick="filtreCocheUserGroupe('{$equipeCourante.user_groupe_id}')" {if in_array($equipeCourante.user_groupe_id, $filtreEquipe)}checked="checked"{/if} /> <label for="gu{$equipeCourante.user_groupe_id}" style="display:inline"><b>{$equipeCourante.nom|escape}</b></label>
												{assign var=tmpNbDansColCourante value=$tmpNbDansColCourante+1}
											{/foreach}
										{/if}
									</td>
								</tr>
							</table>
						</li>
						<li><input type="submit" value="{#submit#}" class="btn btn-sm margin-left-10" /></li>
					</ul>
				</form>	
				</div>
				<div class="btn-group">
					<form method="POST">
					<div class="input-group padding-left-50">
						<input type="text" class="form-control input-sm" name="rechercheUser" value="{$rechercheUser|default:""}" />
						<span class="input-group-btn">
							<input type="submit" value="{#projet_liste_chercher#}" class="btn btn-sm {if $rechercheUser neq ""}btn-danger{else}btn-default{/if}" />
						</span>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	{if $users|@count > 0}

		<div class="row">
			<div class="col-md-12">
				<div class="soplanning-box margin-top-10">
					<table class="table table-striped table-hover">
						<tr>
							<th class="w100">&nbsp;</th>
							<th>
								{if $order eq "nom"}
									{if $by eq "asc"}
										<a href="{$BASE}/user_list.php?page=1&order=nom&by=desc">{#user_liste_nom#} ({$users|@count})</a>&nbsp;<img src="{$BASE}/assets/img/pictos/asc_order.png" alt="" />
									{else}
										<a href="{$BASE}/user_list.php?page=1&order=nom&by=asc">{#user_liste_nom#} ({$users|@count})</a>&nbsp;<img src="{$BASE}/assets/img/pictos/desc_order.png" alt="" />
									{/if}
								{else}
									<a href="{$BASE}/user_list.php?page=1&order=nom&by={$by}">{#user_liste_nom#} ({$users|@count})</a>
								{/if}
							</th>
							<th>
								{#user_liste_groupe#}
							</th>
							<th>
								{#user_droits_court#}
							</th>
							<th>
								{if $order eq "email"}
									{if $by eq "asc"}
										<a href="{$BASE}/user_list.php?page=1&order=email&by=desc">{#user_liste_email#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/asc_order.png" alt="" />
									{else}
										<a href="{$BASE}/user_list.php?page=1&order=email&by=asc">{#user_liste_email#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/desc_order.png" alt="" />
									{/if}
								{else}
									<a href="{$BASE}/user_list.php?page=1&order=email&by={$by}">{#user_liste_email#}</a>
								{/if}
							</th>
							<th>
								{if $order eq "user_id"}
									{if $by eq "asc"}
										<a href="{$BASE}/user_list.php?page=1&order=user_id&by=desc">{#user_liste_identifiant#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/asc_order.png" alt="" />
									{else}
										<a href="{$BASE}/user_list.php?page=1&order=user_id&by=asc">{#user_liste_identifiant#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/desc_order.png" alt="" />
									{/if}
								{else}
									<a href="{$BASE}/user_list.php?page=1&order=user_id&by={$by}">{#user_liste_identifiant#}</a>
								{/if}
							</th>
							<th>
								{if $order eq "login"}
									{if $by eq "asc"}
										<a href="{$BASE}/user_list.php?page=1&order=login&by=desc">{#user_liste_login#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/asc_order.png" alt="" />
									{else}
										<a href="{$BASE}/user_list.php?page=1&order=login&by=asc">{#user_liste_login#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/desc_order.png" alt="" />
									{/if}
								{else}
									<a href="{$BASE}/user_list.php?page=1&order=login&by={$by}">{#user_liste_login#}</a>
								{/if}
							</th>
							<th>
								{if $order eq "visible_planning"}
									{if $by eq "asc"}
										<a href="{$BASE}/user_list.php?page=1&order=visible_planning&by=desc">{#user_visiblePlanning#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/asc_order.png" alt="" />
									{else}
										<a href="{$BASE}/user_list.php?page=1&order=visible_planning&by=asc">{#user_visiblePlanning#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/desc_order.png" alt="" />
									{/if}
								{else}
									<a href="{$BASE}/user_list.php?page=1&order=visible_planning&by={$by}">{#user_visiblePlanning#}</a>
								{/if}
							</th>
							<th>{#user_informations#}</th>
						</tr>
						{foreach name=users item=userTmp from=$users}
							<tr>
								<td>
									<a href="javascript:xajax_modifUser('{$userTmp.user_id|urlencode}');undefined;"><img src="{$BASE}/assets/img/pictos/edit.gif" class="picto" alt="" /></a>
									&nbsp;
									<a href="javascript:xajax_supprimerUser('{$userTmp.user_id|urlencode}');undefined;" onClick="javascript:return confirm('{#user_liste_confirmSuppr#|escape:"javascript"}')"><img src="{$BASE}/assets/img/pictos/delete.gif" class="picto" alt="" /></a>
									&nbsp;
									<a href="{$BASE}/process/planning.php?filtreSurUser={$userTmp.user_id}" title="{#planning_filtre_sur_user#|escape}"><img src="{$BASE}/assets/img/pictos/logo.png" class="picto" alt="" /></a>
								</td>
								<td>{$userTmp.nom|xss_protect}&nbsp;</td>
								<td>{$userTmp.nom_groupe|xss_protect}&nbsp;</td>
								<td class="miniFontSize">
									{if in_array("users_manage_all", $userTmp.tabDroits)}{#droits_utilisateurs#}&nbsp;{/if}
									{if in_array("projects_manage_all", $userTmp.tabDroits) || in_array("projects_manage_own", $userTmp.tabDroits)}{#droits_projets#}&nbsp;{/if}
									{if in_array("projectgroups_manage_all", $userTmp.tabDroits)}{#droits_groupesProjets#}&nbsp;{/if}
									{if in_array("planning_modify_all", $userTmp.tabDroits) || in_array("planning_modify_own_project", $userTmp.tabDroits) || in_array("planning_modify_own_task", $userTmp.tabDroits)}{#droits_modifPlanning#}&nbsp;{/if}
								{if in_array("lieux_all", $userTmp.tabDroits)}{#droits_lieux#}&nbsp;{/if}
								{if in_array("ressources_all", $userTmp.tabDroits)}{#droits_ressources#}&nbsp;{/if}
									{if in_array("parameters_modify", $userTmp.tabDroits)}{#droits_parametres#}&nbsp;{/if}
									&nbsp;
								</td>
								<td>
									{if $userTmp.email neq ""}
										<a href="mailto:{$userTmp.email|xss_protect}">{$userTmp.email|xss_protect}</a>
									{/if}
									&nbsp;
								</td>
								<td>
									&nbsp;
									{assign var=couleurTexte value='#'|cat:$userTmp.couleur|buttonFontColor}
									<span style="padding:3px;color:{$couleurTexte};background-color:#{$userTmp.couleur}">{$userTmp.user_id}</span>
								</td>
								<td>{$userTmp.login}&nbsp;</td>
								<td>
									{assign var=valTmp value=$userTmp.visible_planning}
									{$smarty.config.$valTmp}
									&nbsp;
								</td>
								<td>
									{assign var=cooltip value=$smarty.config.user_liste_NBPeriodes|cat:" : "|cat:$userTmp.totalPeriodes|cat:"<br>"|cat:$smarty.config.user_date_dernier_login|cat:" : "}
									{assign var=dateLogin value=$userTmp.date_dernier_login|sqldatetime2userdatetime}
									{assign var=cooltip value=$cooltip|cat:$dateLogin}
									<span onmouseover="return coolTip('{$cooltip|escape:"quotes"}', WIDTH, 270)"  onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help"></span>
								</td>
							</tr>
						{/foreach}
						{if $nbPages > 1}
							<tr>
								<td colspan="7" class="text-right">
									{if $currentPage > 1}<a href="{$BASE}/user_list.php?page={$currentPage-1}">&lt;&lt; {#action_precedent#}</a>&nbsp;&nbsp;{/if}
									{section name=pagination loop=$nbPages}
										{if $smarty.section.pagination.iteration == $currentPage}<b>{else}<a href="{$BASE}/user_list.php?page={$smarty.section.pagination.iteration}">{/if}
										{$smarty.section.pagination.iteration}
										{if $smarty.section.pagination.iteration == $currentPage}</b>{else}</a>{/if}&nbsp;
									{/section}
									{if $currentPage < $nbPages}<a href="{$BASE}/user_list.php?page={$currentPage+1}">{#action_suivant#} &gt;&gt;</a>{/if}
								</td>
							</tr>
						{/if}
					</table>
				</div>
			</div>
		</div>

	{else}
	
		<div class="row">
			<div class="col-md-12">
				<div class="soplanning-box margin-top-10">
					{#info_noRecord#}
				</div>
			</div>
		</div>

	{/if}
</div>

{* CHARGEMENT SCROLL Y *}

<script type="text/javascript">
	{literal}

	var yscroll = getCookie('yposProjets');
	window.onscroll = function() {document.cookie='yposProjets=' + window.pageYOffset;};
	addEvent(window, 'load', chargerYScrollPos);

	{/literal}
</script>

{include file="www_footer.tpl"}