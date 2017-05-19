{* Smarty *}
{include file="www_header.tpl"}
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box">
				<a href="javascript:xajax_modifFerie();undefined;" class="btn btn-sm btn-default" ><img src="assets/img/pictos/feries.png" class="picto" alt="" />&nbsp;{#menuCreerFerie#}</a>
				<div class="btn-group">
					<button class="btn btn-sm btn-default" data-toggle="dropdown">{#feries_import#}&nbsp;<span class="caret"></span></button>
					<ul class="dropdown-menu">
						{foreach from=$fichiers item=fichier}
							<li><a onClick="event.cancelBubble=true;" href="javascript:if(confirm('{#feries_confirmImport#}')){literal}{{/literal}document.location='process/feries.php?fichier={$fichier|basename}'{literal}}{/literal}">{$fichier|basename}</a></li>
						{/foreach}
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box margin-top-10">
				{if $feries|@count > 0}
					<table class="table table-striped table-hover">
						<tr>
							<th class="w70">&nbsp;</th>
							<th class="w100">
								<b>{#feries_date#}</b>
							</th>
							<th>
								<b>{#feries_libelle#}</b>
							</th>
						</tr>
						{foreach name=feries item=ferie from=$feries}
							<tr>
								<td>
									<a href="javascript:xajax_modifFerie('{$ferie.date_ferie|urlencode}');undefined;"><img src="{$BASE}/assets/img/pictos/edit.gif" class="picto" alt="" /></a>
									&nbsp;
									<a href="javascript:xajax_supprimerFerie('{$ferie.date_ferie|urlencode}');undefined;" onClick="javascript:return confirm('{#confirm#|escape:"javascript"}')"><img src="{$BASE}/assets/img/pictos/delete.gif" class="picto" alt="" /></a>
								</td>
								<td>
									{$ferie.date_ferie|sqldate2userdate}&nbsp;
								</td>
								<td>
									{$ferie.libelle}
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