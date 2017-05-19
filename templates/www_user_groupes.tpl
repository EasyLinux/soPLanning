{* Smarty *}
{include file="www_header.tpl"}

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box">
				<div class="btn-group">
					<a href="{$BASE}/user_list.php" class="btn btn-sm btn-default" ><img src="assets/img/pictos/users.png" class="picto-large" alt=''>&nbsp;{#menuGestionUsers#}</a>
					<a href="javascript:xajax_modifUserGroupe();undefined;" class="btn btn-sm btn-default"><img src="assets/img/pictos/adduser_groupes.png" class="picto-large" alt="" />&nbsp;{#menuCreerUserGroupe#}</a>
					<a href="javascript:xajax_modifUser();undefined;" class="btn btn-sm btn-default"><img src="assets/img/pictos/adduser.png" class="picto-large" alt="" />&nbsp;{#menuCreerUser#}</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box margin-top-10">
				{if $groupes|@count > 0}
					<table class="table table-striped table-hover">
						<tr>
							<th>&nbsp;</th>
							<th>
								{if $order eq "nom"}
									{if $by eq "asc"}
										<a href="{$BASE}/user_groupes.php?page=1&order=nom&by=desc">{#user_liste_groupe#} ({$groupes|@count})</a>&nbsp;<img src="{$BASE}/assets/img/pictos/asc_order.png" alt="" />
									{else}
										<a href="{$BASE}/user_groupes.php?page=1&order=nom&by=asc">{#user_liste_groupe#} ({$groupes|@count})</a>&nbsp;<img src="{$BASE}/assets/img/pictos/desc_order.png" alt="" />
									{/if}
								{else}
									<a href="{$BASE}/user_groupes.php?page=1&order=nom&by={$by}">{#user_liste_groupe#} ({$groupes|@count})</a>
								{/if}
							</th>
							{assign var=totalUsers value=0}
							{foreach name=groupes item=groupe from=$groupes}
								{assign var=totalUsers value=$totalUsers+$groupe.totalUsers}
							{/foreach}
							<th>{#user_groupe_nbUsers#} ({$totalUsers}) </th>
              <th>{#user_groupe_planning#}</th>
						</tr>
						{foreach name=groupes item=groupe from=$groupes}
							<tr>
								<td class="w40">
									<a href="javascript:xajax_modifUserGroupe({$groupe.user_groupe_id});undefined;"><img src="{$BASE}/assets/img/pictos/edit.gif" class="picto" alt="" /></a>
									&nbsp;
									<a href="javascript:if(confirm('{#confirm#|escape:"javascript"}')){literal}{{/literal}javascript:xajax_supprimerUserGroupe({$groupe.user_groupe_id});{literal}}{/literal};undefined;"><img src="{$BASE}/assets/img/pictos/delete.gif" class="picto" alt="" /></a>
								</td>
								<td>{$groupe.nom|escape}&nbsp;</td>
								<td>{$groupe.totalUsers}&nbsp;</td>
                <td>{if $groupe.planning == 0}Non{else}Oui{/if}</td>
							</tr>
						{/foreach}
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