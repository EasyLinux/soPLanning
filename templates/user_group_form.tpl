{* Smarty *}
<form class="form-horizontal" method="POST" action="" target="_blank" onsubmit="return false;">
	<div class="form-group">
		<label class="col-sm-4 control-label">{#user_groupe#} :</label>
		<div class="col-sm-4">
			<input id="nom" class="form-control" type="text" value="{$groupe.nom|escape:"html"}" maxlength="150" />
		</div>
	</div>
	<div class="form-group">
		<!-- <label class="col-sm-4 control-label">&nbsp;</label> -->
		<div class="col-sm-8">
      <input type="checkbox" id="planning" name="planning" 
             {if $groupe.planning eq 1}checked='checked'{/if}/>
            {#user_groupe_planning#} 
		</div>
	</div>
	<div class="form-group">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<input type="button" class="btn btn-primary" value="{#submit#|escape:"html"}" onclick="xajax_submitFormUserGroupe('{$groupe.user_groupe_id|escape}', document.getElementById('nom').value);"/>
	</div>
</form>