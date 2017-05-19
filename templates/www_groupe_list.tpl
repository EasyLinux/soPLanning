{* Smarty *}
{include file="www_header.tpl"}

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box">
				<div class="btn-group">
					<a href="{$BASE}/projets.php" class="btn btn-sm btn-default" ><img src="assets/img/pictos/projets.png" class="picto2" alt="" />&nbsp;{#menuListeProjets#}</a>
					<a href="{$BASE}/groupe_form.php" class="btn btn-sm btn-default"><img src="assets/img/pictos/addgroupe.png" class="picto2" alt="" />&nbsp;{#menuCreerGroupe#}</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box margin-top-10">
				<form method="GET" class="form-inline">
					<label class="checkbox-inline">{#projet_liste_afficherGroupesProjets#} :</label>
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
					<input type="submit" value="{#formAfficher#|escape:"html"}" class="btn btn-sm btn-default margin-left-20"/>
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
				{if $groupes|@count > 0}
					<table class="table table-striped table-hover">
						<tr>
							<th class="w70">&nbsp;</th>
							<th>
								{if $order eq "nom"}
									{if $by eq "asc"}
										<a href="{$BASE}/groupe_list.php?page=1&order=nom&by=desc">{#groupe_liste_nom#} ({$groupes|@count})</a>&nbsp;<img src="{$BASE}/assets/img/pictos/asc_order.png" alt="" />
									{else}
										<a href="{$BASE}/groupe_list.php?page=1&order=nom&by=asc">{#groupe_liste_nom#} ({$groupes|@count})</a>&nbsp;<img src="{$BASE}/assets/img/pictos/desc_order.png" alt="" />
									{/if}
								{else}
									<a href="{$BASE}/groupe_list.php?page=1&order=nom&by={$by}">{#groupe_liste_nom#} ({$groupes|@count})</a>
								{/if}
							</th>
							{assign var=totalProjets value=0}
							{foreach name=groupes item=groupe from=$groupes}
								{assign var=totalProjets value=$totalProjets+$groupe.totalProjets}
							{/foreach}
							<th>{#groupe_liste_nbProjets#} ({$totalProjets})</th>
						</tr>
						{foreach name=groupes item=groupe from=$groupes}
							{assign var=couleurLigne value="#ffffff"}
							<tr>
								<td>
									<a href="{$BASE}/groupe_form.php?groupe_id={$groupe.groupe_id}"><img src="{$BASE}/assets/img/pictos/edit.gif" class="picto" alt="" /></a>
									&nbsp;
									<a href="{$BASE}/process/groupe_save.php?groupe_id={$groupe.groupe_id}&action=delete" onClick="javascript:return confirm('{#groupe_liste_confirmSuppr#|escape:"javascript"}')"><img src="{$BASE}/assets/img/pictos/delete.gif" class="picto" alt="" /></a>
								</td>
								<td>{$groupe.nom|xss_protect}&nbsp;</td>
								<td>{$groupe.totalProjets}&nbsp;</td>
							</tr>
						{/foreach}
						{if $nbPages > 1}
							<tr>
								<td colspan="7" align="right">
									{if $currentPage > 1}<a href="{$BASE}/groupe_list.php?page={$currentPage-1}">&lt;&lt; {#action_precedent#}</a>&nbsp;&nbsp;{/if}
									{section name=pagination loop=$nbPages}
										{if $smarty.section.pagination.iteration == $currentPage}<b>{else}<a href="{$BASE}/groupe_list.php?page={$smarty.section.pagination.iteration}">{/if}
										{$smarty.section.pagination.iteration}
										{if $smarty.section.pagination.iteration == $currentPage}</b>{else}</a>{/if}&nbsp;
									{/section}
									{if $currentPage < $nbPages}<a href="{$BASE}/groupe_list.php?page={$currentPage+1}">{#action_suivant#} &gt;&gt;</a>{/if}
								</td>
							</tr>
						{/if}
					</table>
				{else}
					{#info_noRecord#}
				{/if}
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