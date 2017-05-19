{* Smarty *}

{include file="www_header.tpl"}

<div class="container">
	<div class="row">
		<div class="span12">
			<div class="soplanning-box">
				<a href="javascript:xajax_modifLieu();undefined;" class="btn btn-small btn-default" ><img src="assets/img/pictos/location.png" border="0" width="18">&nbsp;{#menuCreerLieu#}</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<div class="soplanning-box margin-top-10">
				{if $lieux|@count > 0}
					<table class="table table-striped">
						<tr>
							<th width="70">&nbsp;</th>
							<th align="center" width="150">
								<b>{#lieu_nom#}</b>
							</th>
							<th align="center">
								<b>{#lieu_commentaire#}</b>
							</th>
							<th align="center">
								<b>{#lieu_exclusif#}</b>
							</th>
						</tr>
						{foreach name=lieux item=lieu from=$lieux}
							<tr bgcolor="#FFFFFF" onMouseOver="javascript:this.style.backgroundColor='#EEEEEE'" onMouseOut="javascript:this.style.backgroundColor='#FFFFFF'">
								<td align="center" nowrap="nowrap">
									<a href="javascript:xajax_modifLieu('{$lieu.lieu_id|urlencode}');undefined;"><img src="{$BASE}/assets/img/pictos/edit.gif" border="0" width="16" height="16" /></a>
									&nbsp;
									<a href="javascript:xajax_supprimerLieu('{$lieu.lieu_id|urlencode}');undefined;" onClick="javascript:return confirm('{#confirm#|escape:"javascript"}')"><img src="{$BASE}/assets/img/pictos/delete.gif" border="0" width="16" height="16" /></a>
								</td>
								<td align="center">
									{$lieu.nom}&nbsp;
								</td>
								<td>
									{$lieu.commentaire}
								</td>
								<td>
									{if $lieu.exclusif eq 1}{#oui#}{else}{#non#}{/if}
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