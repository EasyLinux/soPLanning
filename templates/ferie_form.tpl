{* Smarty *}
<form class="form-horizontal" method="post" action="" target="_blank" onsubmit="return false;">
	<div class="form-group">
		<label class="col-md-2 control-label">{#feries_date#} :</label>
		<div class="col-md-6">
			<input type="text" id="date_ferie" maxlength="10" value="{$ferie.date_ferie|sqldate2userdate}" class="form-control datepicker" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">{#feries_libelle#} :</label>
		<div class="col-md-4">
			<input id="libelle" maxlength="50" type="text" value="{$ferie.libelle}" class="form-control" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-2"></label>
		<div class="col-md-4">
			<input type="button" class="btn btn-primary" value="{#submit#|escape:"html"}" onclick="xajax_submitFormFerie(document.getElementById('date_ferie').value, document.getElementById('libelle').value);"/>
		</div>
</form>