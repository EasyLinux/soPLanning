<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <meta name="reply-to" content="support@soplanning.org" />
		<meta name="email" content="support@soplanning.org" />
		<meta name="Identifier-URL" content="http://www.soplanning.org" />
		<meta name="robots" content="noindex,follow" />
		<title>{$smarty.const.CONFIG_SOPLANNING_TITLE|escape:'html'|escape:'javascript'}</title>
		<link href="favicon.ico" rel="icon" type="image/x-icon" />
		<link href="assets/plugins/bootstrap3/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap3/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet">
		<link href="assets/plugins/select2-bootstrap-theme-0.1.0-beta.8/dist/select2-bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/jauges.css" rel="stylesheet">
		<link href="assets/css/styles.css" rel="stylesheet">
		{if isset($smarty.session.planningView) && $smarty.session.planningView eq 'jour'}
			{if $smarty.session.dimensionCase eq 'reduit'}
				<link href="assets/css/styles_reduit_jour.css" rel="stylesheet">
			{/if}
		{/if}
		{if isset($smarty.session.planningView) && $smarty.session.planningView eq 'mois'}
			{if $smarty.session.dimensionCase eq 'reduit'}
				<link href="assets/css/styles_reduit_mois.css" rel="stylesheet">
			{/if}
		{/if}
		{* theme *}
		<link href="assets/css/themes/{$smarty.const.CONFIG_SOPLANNING_THEME}" rel="stylesheet">
		<link href="assets/plugins/jqueryui/css/redmond/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
		<script type="text/javascript" src="assets/js/jquery-1.12.2.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jqueryui/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jqueryui/i18n/jquery.ui.datepicker-{$lang}.min.js"></script>
		{* bootstrap *}
		<script type="text/javascript" src="assets/plugins/bootstrap3/js/bootstrap.min.js"></script>
		{* bootstrap multiselect *}
		<script type="text/javascript" src="assets/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
		{* palette de couleur*}
		<script type="text/javascript" src="assets/plugins/jscolor/jscolor.js"></script>
		{* layer pour choix des projets � afficher *}
		<script type="text/javascript" src="assets/js/sousmenu.js"></script>
		<script type="text/javascript" src="assets/js/fonctions.js"></script>
		<script type="text/javascript" src="assets/plugins/select2/dist/js/select2.min.js"></script>
		<script type="text/javascript" src="assets/plugins/select2/dist/js/i18n/{$lang}.js"></script>
		<link href="assets/css/print.css" rel="stylesheet" media="print">
		{$xajax}
		{if $smarty.const.CONFIG_SOPLANNING_LOGO != ''}
		<style>
			{literal}
			.nav li a {line-height: 40px;}
			{/literal}
		</style>
		{/if}
	</head>
	<body>
		{if isset($user)}
			<div class="navbar navbar-inverse navbar-static-top noprint">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="{$BASE}/planning.php">
							
							{if $smarty.const.CONFIG_SOPLANNING_LOGO != ''}
								<img src="./upload/logo/{$smarty.const.CONFIG_SOPLANNING_LOGO}" alt='logo' class="logo" />
								<span id="soplanning_title" style="line-height:40px">{$smarty.const.CONFIG_SOPLANNING_TITLE}&nbsp;<small>{$infoVersion}</small></span>
							{else}
								<span id="soplanning_title">{$smarty.const.CONFIG_SOPLANNING_TITLE}&nbsp;<small>{$infoVersion}</small></span>
							{/if}
						</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="{$BASE}/planning.php" class="dropdown-toggle"><img src="./assets/img/pictos/logo.png" alt="" />&nbsp;{#menuAfficherPlanning#}</a>
								<ul class="dropdown-menu dropdown-menu-hover">
									<li><a href="{$BASE}/planning.php"><img src="./assets/img/pictos/logo.png" alt="" />&nbsp;{#menuAfficherPlanning#}</a></li>
									{if !in_array("tasks_readonly", $user.tabDroits)}
										<li><a href="javascript:Reloader.stopRefresh();xajax_ajoutPeriode();undefined;"><img src="./assets/img/pictos/addplanning.png" alt="" />&nbsp;{#menuAjouterPeriode#}</a></li>
									{/if}
								</ul>
							</li>
							{if in_array("projects_manage_all", $user.tabDroits) || in_array("projects_manage_own", $user.tabDroits)}
								<li class="divider-vertical"></li>
								<li class="dropdown">
									<a href="{$BASE}/projets.php" class="dropdown-toggle"><img src="./assets/img/pictos/projets.png" alt="" />&nbsp;{#menuListeProjets#}</a>
									<ul class="dropdown-menu dropdown-menu-hover">
										<li><a href="{$BASE}/projets.php"><img src="./assets/img/pictos/projets.png" alt="" />&nbsp;{#menuListeProjets#}</a></li>
										<li><a href="javascript:Reloader.stopRefresh();xajax_ajoutProjet();undefined;"><img src="./assets/img/pictos/addprojet.png" alt="" />&nbsp;{#menuAjouterProjet#}</a></li>
										{if in_array("projectgroups_manage_all", $user.tabDroits)}
											<li><a href="groupe_list.php"><img src="./assets/img/pictos/groupes.png" alt="" />&nbsp;{#menuListeGroupes#}</a></li>
										{/if}
									</ul>
								</li>
							{/if}
							{if in_array("users_manage_all", $user.tabDroits)}
								<li class="divider-vertical"></li>
								<li class="dropdown">
									<a href="{$BASE}/user_list.php" class="dropdown-toggle"><img src="./assets/img/pictos/users.png" alt="" />&nbsp;{#menuGestionUsers#}</a>
									<ul class="dropdown-menu dropdown-menu-hover">
										<li><a href="{$BASE}/user_list.php"><img src="./assets/img/pictos/users.png" alt="" />&nbsp;{#menuGestionUsers#}</a></li>
										<li><a href="javascript:xajax_modifUser();undefined;"><img src="./assets/img/pictos/adduser.png" alt="" />&nbsp;{#menuCreerUser#}</a></li>
										<li><a href="{$BASE}/user_groupes.php"><img src="./assets/img/pictos/user_groupes.png" alt="" />&nbsp;{#menuGroupesUsers#}</a></li>
									</ul>
								</li>
							{/if}
							{* *SN* Test ajout menu *}
              {if true==false }
								<li class="divider-vertical"></li>
								<li class="dropdown">
									<a href="{$BASE}/user_list.php" class="dropdown-toggle"><img src="./assets/img/pictos/users.png" alt="" />&nbsp;{#menuGestionUsers#}</a>
									<ul class="dropdown-menu dropdown-menu-hover">
										<li><a href="{$BASE}/user_list.php"><img src="./assets/img/pictos/users.png" alt="" />&nbsp;{#menuGestionUsers#}</a></li>
										<li><a href="javascript:xajax_modifUser();undefined;"><img src="./assets/img/pictos/adduser.png" alt="" />&nbsp;{#menuCreerUser#}</a></li>
										<li><a href="{$BASE}/user_groupes.php"><img src="./assets/img/pictos/user_groupes.png" alt="" />&nbsp;{#menuGroupesUsers#}</a></li>
									</ul>
								</li>
							{/if}
							{if in_array("parameters_all", $user.tabDroits)}
								<li class="divider-vertical"></li>
								<li class="dropdown">
									<a href="{$BASE}/options.php" class="dropdown-toggle"><img src="./assets/img/pictos/options.png" alt="" />&nbsp;{#menuOptions#}</a>
									<ul class="dropdown-menu dropdown-menu-hover">
										<li><a href="{$BASE}/options.php"><img src="./assets/img/pictos/options.png" alt="" />&nbsp;{#menuOptions#}</a></li>
										<li><a href="{$BASE}/feries.php"><img src="./assets/img/pictos/feries.png" alt="" />&nbsp;{#menuFeries#}</a></li>
										{if $smarty.const.CONFIG_SOPLANNING_OPTION_LIEUX == 1 }
											<li><a href="{$BASE}/lieux.php"><img src="./assets/img/pictos/location.png" alt="" />&nbsp;{#menuLieux#}</a></li>
										{/if}
										{if $smarty.const.CONFIG_SOPLANNING_OPTION_RESSOURCES == 1 }
											<li><a href="{$BASE}/ressources.php"><img src="./assets/img/pictos/plug.png" alt="" />&nbsp;{#menuRessources#}</a></li>
										{/if}
									</ul>
								</li>
							{/if}
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								{if $smarty.const.CONFIG_SOPLANNING_OPTION_RESSOURCES == 1 and $user.user_id == 'publicspl' }
								<a href="#">{#accesPublicUsername#}</a>	
								{else}
								<a href="javascript:xajax_modifProfil();undefined;">{$user.nom} ({$user.user_id})</a>
								{/if}
							</li>
							<li>
								<a href="process/login.php?action=logout&language={$lang}"><img src="{$BASE}/assets/img/pictos/logout.png" alt="" class="picto-logout"/></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		{/if}
		{if isset($smartyData.message)}
			{assign var=messageFinal value=$smartyData.message|formatMessage}
			<div class="container-fluid">
				<div id="divMessage" class="alert {if $smartyData.message eq 'changeNotOK'}alert-danger{else}alert-success{/if}">
					<p>{$messageFinal}</p>
				</div>
			</div>
		{/if}
		{* cooltip pour les rollover,  laisser ici sinon genere un espace en haut de page *}
		<script type="text/javascript" src="assets/js/cooltip.js"></script>
		<script type="text/javascript">ctPageDefaults(WIDTH, 320, FGCOLOR, '#EBEBE0', null, 1, TEXTSIZE, '11px'); </script>
		<div id="ctDiv" class="divTooltip"></div>