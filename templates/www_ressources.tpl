{* Smarty *}

{include file="www_header.tpl"}

<div class="container">
	<div class="row">
		<div class="span12">
			<div class="soplanning-box">
				<a href="javascript:xajax_modifRessource();undefined;" class="btn btn-small btn-default" ><img src="assets/img/pictos/plug.png" border="0" width="18">&nbsp;{#menuCreerRessource#}</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<div class="soplanning-box margin-top-10">
				{if $ressources|@count > 0}
					<table class="table table-striped">
						<tr>
							<th width="70">&nbsp;</th>
							<th align="center" width="150">
								<b>{#ressource_nom#}</b>
							</th>
							<th align="center">
								<b>{#ressource_commentaire#}</b>
							</th>
							<th align="center">
								<b>{#ressource_exclusive#}</b>
							</th>
							</tr>
						{foreach name=ressources item=ressource from=$ressources}
							<tr bgcolor="#FFFFFF" onMouseOver="javascript:this.style.backgroundColor='#EEEEEE'" onMouseOut="javascript:this.style.backgroundColor='#FFFFFF'">
								<td align="center" nowrap="nowrap">
									<a href="javascript:xajax_modifRessource('{$ressource.ressource_id|urlencode}');undefined;"><img src="{$BASE}/assets/img/pictos/edit.gif" border="0" width="16" height="16" /></a>
									&nbsp;
									<a href="javascript:xajax_supprimerRessource('{$ressource.ressource_id|urlencode}');undefined;" onClick="javascript:return confirm('{#confirm#|escape:"javascript"}')"><img src="{$BASE}/assets/img/pictos/delete.gif" border="0" width="16" height="16" /></a>
								</td>
								<td align="center">
									{$ressource.nom}&nbsp;
								</td>
								<td>
									{$ressource.commentaire}
								</td>
								<td>
									{if $ressource.exclusif eq 1}{#oui#}{else}{#non#}{/if}
								</td>
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

{include file="www_footer.tpl"}