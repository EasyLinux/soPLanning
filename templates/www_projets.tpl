{* Smarty *}
{include file="www_header.tpl"}

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box">
				<div class="btn-group">
					{if in_array("projectgroups_manage_all", $user.tabDroits)}
						<a href="groupe_list.php" class="btn btn-sm btn-default"><img src="assets/img/pictos/groupes.png" class="picto" alt=""/> {#menuListeGroupes#}</a>
					{/if}
					<a href="javascript:xajax_ajoutProjet('projets');undefined;" class="btn btn-sm btn-default"><img src="assets/img/pictos/addprojet.png" class="picto" alt="" /> {#menuAjouterProjet#}</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box margin-top-10">
				<form action="projets.php" method="GET" class="form-inline">
					<label>{#projet_liste_afficherProjets#} :</label>
					<div class="btn-group" data-toggle="buttons-radio">
						<button type="button" class="btn btn-sm btn-default{if $filtrageProjet eq 'tous'} active{/if}" onclick="top.location='?filtrageProjet=tous';">{#projet_liste_afficherProjetsTous#}</button>
						<button type="button" class="btn btn-sm btn-default{if $filtrageProjet neq 'tous'} active{/if}" onclick="top.location='?filtrageProjet=date';">{#projet_liste_afficherProjetsParDate#}</button>
					</div>
					{if $filtrageProjet neq "tous"}
						<label>
							{#formNbMois#}:
						</label>
						<div class="input-group">
							<input name="nb_mois" class="form-control input-sm datepicker" type="text" size="2" value="{$nbMois}" />
							<span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="submit"><i class="glyphicon glyphicon-share-alt"></i></button>
							</span>
						</div>
						<label>
							{#formDebut#}:
						</label>
						<div class="input-group">
							<input name="date_debut_affiche" id="date_debut_affiche" type="text" value="{$dateDebut}" class="form-control input-sm datepicker" />
							<span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="submit"><i class="glyphicon glyphicon-share-alt"></i></button>
							</span>
						</div>
						<script>{literal}addEvent(window, 'load', function(){jQuery("#date_debut_affiche").datepicker()});{/literal}</script>
						<label>
							{#formInfoDateFin#} : {$dateFin}
						</label>
					{/if}
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box">
				<form method="GET" class="form-inline">
					<label class="label-form">{#projet_liste_afficherProjets#} :</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="statut[]" id="a_faire" value="a_faire" {if in_array('a_faire', $listeStatuts)}checked="checked"{/if}>{#projet_liste_statutAfaire#}
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="statut[]" id="en_cours" value="en_cours" {if in_array('en_cours', $listeStatuts)}checked="checked"{/if}>{#projet_liste_statutEnCours#}
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="statut[]" id="fait" value="fait" {if in_array('fait', $listeStatuts)}checked="checked"{/if}>{#projet_liste_statutFait#}
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="statut[]" id="abandon" value="abandon" {if in_array('abandon', $listeStatuts)}checked="checked"{/if}>{#projet_liste_statutAbandon#}
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="statut[]" id="archive" value="archive" {if in_array('archive', $listeStatuts)}checked="checked"{/if}>{#projet_liste_statutArchive#}
					</label>

					<input type="submit" value="{#formAfficher#|escape:"html"}" class="btn btn-sm btn-default"/>

					<div class="btn-group padding-left-100">
						<div class="input-group">
							<input type="text" class="form-control input-sm" name="rechercheProjet" value="{$rechercheProjet|default:""}" />
							<span class="input-group-btn">
								<input type="submit" value="{#projet_liste_chercher#}" class="btn btn-sm {if $rechercheProjet neq ""}btn-danger{else}btn-default{/if}" />
							</span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box margin-top-10">
				<table class="table table-striped table-hover">
					<tr>
						<td colspan="2">
							{if $order eq "nom"}
								{if $by eq "asc"}
									<a href="?order=nom&by=desc">{#projet_liste_projet#} ({$projets|@count})</a>&nbsp;<img src="{$BASE}/assets/img/pictos/asc_order.png" alt="" />
								{else}
									<a href="?order=nom&by=asc">{#projet_liste_projet#} ({$projets|@count})</a>&nbsp;<img src="{$BASE}/assets/img/pictos/desc_order.png" alt="" />
								{/if}
							{else}
								<a href="?order=nom&by={$by}">{#projet_liste_projet#} ({$projets|@count})</a>
							{/if}
						</td>
						<td>
							{if $order eq "nom_createur"}
								{if $by eq "asc"}
									<a href="?order=nom_createur&by=desc">{#projet_liste_createur#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/asc_order.png" alt="" />
								{else}
									<a href="?order=nom_createur&by=asc">{#projet_liste_createur#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/desc_order.png" alt="" />
								{/if}
							{else}
								<a href="?order=nom_createur&by={$by}">{#projet_liste_createur#}</a>
							{/if}
						</td>
						<td>
							{if $order eq "charge"}
								{if $by eq "asc"}
									<a href="?order=charge&by=desc">{#projet_liste_charge#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/asc_order.png" alt="" />
								{else}
									<a href="?order=charge&by=asc">{#projet_liste_charge#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/desc_order.png" alt="" />
								{/if}
							{else}
								<a href="?order=charge&by={$by}">{#projet_liste_charge#}</a>
							{/if}
						</td>
						<td>
							{if $order eq "livraison"}
								{if $by eq "asc"}
									<a href="?order=livraison&by=desc">{#projet_liste_livraison#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/asc_order.png" alt="" />
								{else}
									<a href="?order=livraison&by=asc">{#projet_liste_livraison#}</a>&nbsp;<img src="{$BASE}/assets/img/pictos/desc_order.png" alt="" />
								{/if}
							{else}
								<a href="?order=livraison&by={$by}">{#projet_liste_livraison#}</a>
							{/if}
						</td>
						<td>
							{#projet_liste_commentaires#}
						</td>
					</tr>
					<tr>
						<td colspan="6" class="project-group-head">{#projet_liste_sansGroupes#}</td>
					</tr>
					{assign var=groupeCourant value=""}
					{foreach from=$projets item=projet}
						{if $projet.groupe_id neq $groupeCourant}
							<tr>
							<td colspan="6" class="project-group-head">{$projet.nom_groupe|xss_protect}</td>
						{/if}
						{if $projet.statut eq "a_faire"}
							{assign var=couleurLigne value="#ffffff"}
						{elseif $projet.statut eq "en_cours"}
							{assign var=couleurLigne value="#B0FB04"}
						{elseif $projet.statut eq "fait"}
							{assign var=couleurLigne value="#FFBE7D"}
						{elseif $projet.statut eq "abandon"}
							{assign var=couleurLigne value="#9D9D9D"}
						{/if}
						<tr>
							<td class="smallFontSize" style="background-color:#{$projet.couleur};color:{"#"|cat:$projet.couleur|buttonFontColor}">{$projet.projet_id}</td>
							<td>
								{if in_array("projects_manage_all", $user.tabDroits) || (in_array("projects_manage_own", $user.tabDroits) && $projet.createur_id eq $user.user_id)}
									<a href="javascript:xajax_modifProjet('{$projet.projet_id}', 'projets');undefined;"><img src="{$BASE}/assets/img/pictos/edit.gif" class="picto" alt="" /></a>
									&nbsp;
									<a href="javascript:xajax_supprimerProjet('{$projet.projet_id}');undefined;" 
									onclick="javascript: return confirm('{#projet_liste_confirmSuppr#|escape:"javascript"}')"><img src="{$BASE}/assets/img/pictos/delete.gif" class="picto" alt="" /></a>
								{/if}
								&nbsp;
								<a href="{$BASE}/process/planning.php?filtreSurProjet={$projet.projet_id}" title="{#planning_filtre_sur_projet#|escape}"><img src="{$BASE}/assets/img/pictos/logo.png" class="picto" alt="" /></a>
								&nbsp;
								{if $projet.lien <> ''}
								<a href="{if $projet.lien|strpos:"http" !== 0 && $projet.lien|strpos:"\\" !== 0}http://{/if}{$projet.lien}" title="{#winProjet_gotoLien#|escape}" target="_blank"><img src="{$BASE}/assets/img/pictos/web.png" class="picto" alt="" /></a>
								&nbsp;
								{else}
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								{/if}
								{$projet.nom|xss_protect}
							</td>
							<td>
								{$projet.nom_createur|xss_protect}
							</td>
							<td>{$projet.charge}</td>
							<td>
								{if $projet.livraison neq '' && $projet.livraison neq '0000-00-00'}
									<a href="planning.php?livraison={$projet.livraison}">{$projet.livraison|sqldate2userdate}</a>
								{/if}
							</td>
							<td>{$projet.iteration|xss_protect}</td>
						</tr>
						{assign var=groupeCourant value=$projet.groupe_id}
					{/foreach}
				</table>
			</div>
		</div>
	</div>
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