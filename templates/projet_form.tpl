{* Smarty *}
<form class="form-horizontal" method="POST" action="" target="_blank">
	<input type="hidden" name="saved" id="saved" value="{$projet.saved}" />
	<input type="hidden" name="old_projet_id" id="old_projet_id" value="{$projet.projet_id}" />
	<input type="hidden" name="origine" id="origine" value="{$origine}" />
	<div class="form-group">
		<label class="col-md-4 control-label">{#winProjet_identifiant#} :</label>
		<div class="col-md-5">
			<input class="form-control" name="projet_id" id="projet_id" type="text" maxlength="10" value="{$projet.projet_id}" onChange="xajax_checkProjetId(this.value, '{$projet.projet_id}');" />
		</div>
		<div class="col-md-3 left-0">
		<span id="divStatutCheckProjetId"></span>
		{#winProjet_identifiantCarMax#}
		</div>
		
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">{#winProjet_nomProjet#} :</label>
		<div class="col-md-5">
			<input class="form-control" name="nom" id="nom" type="text" maxlength="30" value="{$projet.nom}" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">{#winProjet_groupe#} :</label>
		<div class="col-md-5">
			<select name="groupe_id" id="groupe_id" class="form-control">
				<option value="" {if $projet.groupe_id eq ""}selected="selected"{/if}>- - - - - - - - - - - - - - - -</option>
				{foreach from=$groupes item=groupe}
					<option value="{$groupe.groupe_id}" {if $projet.groupe_id eq $groupe.groupe_id}selected="selected"{/if}>{$groupe.nom}</option>
				{/foreach}
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">{#winProjet_statut#} :</label>
		<div class="col-md-5">
			<select class="form-control" name="statut" id="statut">
				<option value="a_faire" {if $projet.statut eq "a_faire"}selected="selected"{/if}>{#winProjet_statutAFaire#|escape:"html"}</option>
				<option value="en_cours" {if $projet.statut eq "en_cours"}selected="selected"{/if}>{#winProjet_statutEnCours#|escape:"html"}</option>
				<option value="fait" {if $projet.statut eq "fait"}selected="selected"{/if}>{#winProjet_statutFait#|escape:"html"}</option>
				<option value="abandon" {if $projet.statut eq "abandon"}selected="selected"{/if}>{#winProjet_statutAbandon#|escape:"html"}</option>
				<option value="archive" {if $projet.statut eq "archive"}selected="selected"{/if}>{#winProjet_statutArchive#|escape:"html"}</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">{#winProjet_charge#} :</label>
		<div class="col-md-2">
			<input class="form-control" name="charge" id="charge" type="text" maxlength="5" value="{$projet.charge}" />
		</div>
		<div class="col-md-3 left-0">
		{#winProjet_chargeJours#}
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">{#winProjet_livraison#} :</label>
		<div class="col-md-2">
			<input type="text" class="form-control datepicker" name="livraison" id="livraison" maxlength="10" value="{$projet.livraison|sqldate2userdate}" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">{#winProjet_lien#} :</label>
		<div class="col-md-5">
			<input class="form-control" name="lien" id="lien" type="text" maxlength="255" value="{$projet.lien}" />
		</div>
		{if $projet.lien neq ""}
			<div class="col-md-3">
				<a class="btn btn-sm btn-default" onmouseover="return coolTip('{#winProjet_gotoLien#|escape}', WIDTH, 270)"  onmouseout="nd()" href="{if $projet.lien|strpos:"http" !== 0 && $projet.lien|strpos:"\\" !== 0}http://{/if}{$projet.lien}" target="_blank"><i class="glyphicon glyphicon-share"></i></a>
			</div>
		{/if}
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">{#winProjet_couleur#} :</label>
		<div class="col-md-5">
			{if $smarty.const.CONFIG_PROJECT_COLORS_POSSIBLE neq ""}
				<select name="couleur" id="couleur" style="background-color:#{$projet.couleur};color:{"#"|cat:$projet.couleur|buttonFontColor}">
				    {if $projet.couleur eq ""}<option value="">{#winProjet_couleurchoix#}</option>{/if}
					{foreach from=","|explode:$smarty.const.CONFIG_PROJECT_COLORS_POSSIBLE item=couleurTmp}
						<option value="{$couleurTmp|replace:'#':''}" style="background-color:{$couleurTmp};color:{$couleurTmp|buttonFontColor}" {if $couleurTmp eq "#"|cat:$projet.couleur}selected="selected"{/if}>{$couleurTmp|replace:'#':''}</option>
					{/foreach}
				</select>
				<span class="col-md-3" style="background-color:{$projet.couleur}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				</div>
			{else}
                {if $smarty.session.couleurExProjet neq ""}
                    {assign var=couleurExProjet value=$smarty.session.couleurExProjet}
                {else}
                    {assign var=couleurExProjet value="ffffff"}
                {/if}
				<input class="form-control" name="couleur" id="couleur" maxlength="6" type="text" value="{if $projet.couleur eq ''}{$couleurExProjet}{else}{$projet.couleur}{/if}" /></div>
				<div class="col-md-3 left-0">
				{#winProjet_couleurMaxCar#}
				</div>
			{/if}
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">{#winProjet_createur#} :</label>
		<div class="col-md-5">
			{if in_array("projects_manage_all", $user.tabDroits)}
				<select name="createur_id" id="createur_id" class="form-control">
					{foreach from=$usersOwner item=owner}
						<option value="{$owner.user_id}" {if $createur.user_id eq $owner.user_id || ($createur.user_id eq "" && $owner.user_id eq $user.user_id)}selected="selected"{/if}>{$owner.nom}</option>
					{/foreach}
				</select>
			{else}
				{$createur.nom}
				<input type="hidden" name="createur_id" id="createur_id" value="{$createur.user_id}">
			{/if}
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">{#winProjet_commentaires#} :</label>
		<div class="col-md-5">
			<input class="form-control" name="iteration" id="iteration" maxlength="255" type="text" value="{$projet.iteration}" />
		</div>
		<div class="col-md-3 left-0">
		{#winProjet_commentairesFacultatif#}
		</div>
	</div>
	<div class="form-group">
	<div class="col-md-4 control-label"></div>
		<div class="col-md-4">
			<input type="button" value="{#winProjet_valider#|escape:"html"}" class="btn btn-primary" onClick="xajax_submitFormProjet('{$projet.projet_id}', $('#origine').val(), $('#projet_id').val(), $('#nom').val(), $('#groupe_id').val(), $('#statut').val(), $('#charge').val(), $('#livraison').val(), $('#lien').val(), $('#couleur').val(), $('#createur_id').val(), $('#iteration').val())" />
		</div>
	</div>
</form>