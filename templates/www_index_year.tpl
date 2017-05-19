<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="reply-to" content="support@open-solutions.fr" />
	<meta name="email" content="support@open-solutions.fr" />
	<meta name="Identifier-URL" content="http://www.soplanning.org" />
	<meta name="robots" content="noindex,follow" />
	<title>SoPlanning</title>
	<link type="image/x-icon" href="favicon.ico" rel="icon" />
	<link type="text/css" href="assets/plugins/bootstrap3/css/bootstrap.min.css" rel="stylesheet" />
	<link type="text/css" href="assets/plugins/bootstrap3/css/bootstrap-theme.min.css" rel="stylesheet" />
	<link type="text/css" href="assets/css/styles.css" rel="stylesheet" />
	<link type="text/css" href="assets/css/themes/soplanning.css" rel="stylesheet" />
	<link type="text/css" href="assets/css/simplePage.css" rel="stylesheet" />
	<link href="assets/plugins/jqueryui/css/redmond/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
	<script type="text/javascript" src="assets/js/jquery-1.12.2.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jqueryui/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jqueryui/i18n/jquery.ui.datepicker-{$lang}.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h3 class="text-center">
		{if $smarty.const.CONFIG_SOPLANNING_LOGO != ''}
				<img src="./upload/logo/{$smarty.const.CONFIG_SOPLANNING_LOGO}" alt='logo' style='height:40px;' id="logo" /><br />
		{/if}
		{if $smarty.const.CONFIG_SOPLANNING_TITLE neq "SOPlanning"}
			<span class="soplanning_index_title1">{$smarty.const.CONFIG_SOPLANNING_TITLE|escape:'html'|escape:'javascript'}</span>
		{else}
			<span class="soplanning_index_title2">Simple Online Planning</span>
		{/if}
		{if isset($infoVersion)}
			<small>v{$infoVersion}</small>
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
				<label for="login" class="col-md-2 control-label">{#login_login#} :</label>
				<div class="col-md-5">
					<input type="text" class="form-control" name="login" id="login" />
				</div>
			</div>
			<div class="form-group">			
				<label for="password" class="col-md-2 control-label">{#login_password#} :</label>
				<div class="col-md-5">
					<input type="password" class="form-control" name="password" id="password" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"></label>
				<div class="col-md-6">
					<input class="btn btn-primary" type="submit" value="GO" />
					<a href="#pwdReminderModal" role="button" class="btn btn-link" data-toggle="modal">{#rappelPwdTitre#}</a><br />
				</div>
			</div>
		</form>
		{if $smarty.const.CONFIG_SOPLANNING_OPTION_ACCES ==1}
		<div class="form-group text-center">
			<a href="planning.php?public=1">[ {#accesPublic#} ]</a>
		</div>
		{/if}
		<div id="infosVersion" class="hidden"></div>
	</div>
</div>
	<script type="text/javascript" src="assets/js/login.js"></script>
	<script type="text/javascript" src="assets/js/fonctions.js"></script>
	<script type="text/javascript">
	document.getElementById('login').focus();
	setTimeout("xajax_checkAvailableVersion();", 5000);
	</script>
{include file="www_footer.tpl"}