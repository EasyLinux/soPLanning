{include file="www_header.tpl"}
<link href="assets/css/simplePage.css" rel="stylesheet">
<br /><br /><br /><br />
<div class="container">
	<h3 class="text-center">
		{if $smarty.const.CONFIG_SOPLANNING_TITLE neq "SOPlanning"}
			<span style="font-size:23px;font-weight:bold;">{$smarty.const.CONFIG_SOPLANNING_TITLE|escape:'html'|escape:'javascript'}</span>
		{else}
			<span style="font-size:30px;font-weight:bold;">Simple Online Planning</span>
		{/if}
		{if isset($infoVersion)}
			<small style="white-space: nowrap;">v{$infoVersion}</small>
		{/if}
	</h3>
	<div class="small-container">
		{if isset($smartyData.message)}
			{assign var=messageFinal value=$smartyData.message|formatMessage}
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{$messageFinal}
			</div>
		{/if}
		<form action="process/login.php" method="post" class="form-horizontal box">
			<div class="form-group">
				<label class="control-label" for="cfgHostname">{#login_login#} :</label>
				<div class="col-md-4">
					{$userTmp.login}
				</div>
			</div>
			<div class="form-group">
				<label class="control-label" for="password">{#rappelPwdNouveauPassword#} :</label>
				<div class="col-md-4">
					<input type="password" size="20" name="password" id="password">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4">
					<input class="btn btn-primary" type="submit" value="GO" onClick="xajax_nouveauPwd($('password').value);undefined;">
				</div>
			</div>
		</form>
	</div>
</div>
{include file="www_footer.tpl"}