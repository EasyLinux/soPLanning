<?php /* Smarty version 2.6.29, created on 2017-04-28 12:43:24
         compiled from www_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'www_header.tpl', 10, false),array('modifier', 'formatMessage', 'www_header.tpl', 158, false),)), $this); ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <meta name="reply-to" content="support@soplanning.org" />
		<meta name="email" content="support@soplanning.org" />
		<meta name="Identifier-URL" content="http://www.soplanning.org" />
		<meta name="robots" content="noindex,follow" />
		<title><?php echo ((is_array($_tmp=((is_array($_tmp=@CONFIG_SOPLANNING_TITLE)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
</title>
		<link href="favicon.ico" rel="icon" type="image/x-icon" />
		<link href="assets/plugins/bootstrap3/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap3/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet">
		<link href="assets/plugins/select2-bootstrap-theme-0.1.0-beta.8/dist/select2-bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/jauges.css" rel="stylesheet">
		<link href="assets/css/styles.css" rel="stylesheet">
		<?php if (isset ( $_SESSION['planningView'] ) && $_SESSION['planningView'] == 'jour'): ?>
			<?php if ($_SESSION['dimensionCase'] == 'reduit'): ?>
				<link href="assets/css/styles_reduit_jour.css" rel="stylesheet">
			<?php endif; ?>
		<?php endif; ?>
		<?php if (isset ( $_SESSION['planningView'] ) && $_SESSION['planningView'] == 'mois'): ?>
			<?php if ($_SESSION['dimensionCase'] == 'reduit'): ?>
				<link href="assets/css/styles_reduit_mois.css" rel="stylesheet">
			<?php endif; ?>
		<?php endif; ?>
				<link href="assets/css/themes/<?php echo @CONFIG_SOPLANNING_THEME; ?>
" rel="stylesheet">
		<link href="assets/plugins/jqueryui/css/redmond/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
		<script type="text/javascript" src="assets/js/jquery-1.12.2.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jqueryui/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jqueryui/i18n/jquery.ui.datepicker-<?php echo $this->_tpl_vars['lang']; ?>
.min.js"></script>
				<script type="text/javascript" src="assets/plugins/bootstrap3/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="assets/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
				<script type="text/javascript" src="assets/plugins/jscolor/jscolor.js"></script>
				<script type="text/javascript" src="assets/js/sousmenu.js"></script>
		<script type="text/javascript" src="assets/js/fonctions.js"></script>
		<script type="text/javascript" src="assets/plugins/select2/dist/js/select2.min.js"></script>
		<script type="text/javascript" src="assets/plugins/select2/dist/js/i18n/<?php echo $this->_tpl_vars['lang']; ?>
.js"></script>
		<link href="assets/css/print.css" rel="stylesheet" media="print">
		<?php echo $this->_tpl_vars['xajax']; ?>

		<?php if (@CONFIG_SOPLANNING_LOGO != ''): ?>
		<style>
			<?php echo '
			.nav li a {line-height: 40px;}
			'; ?>

		</style>
		<?php endif; ?>
	</head>
	<body>
		<?php if (isset ( $this->_tpl_vars['user'] )): ?>
			<div class="navbar navbar-inverse navbar-static-top noprint">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo $this->_tpl_vars['BASE']; ?>
/planning.php">
							
							<?php if (@CONFIG_SOPLANNING_LOGO != ''): ?>
								<img src="./upload/logo/<?php echo @CONFIG_SOPLANNING_LOGO; ?>
" alt='logo' class="logo" />
								<span id="soplanning_title" style="line-height:40px"><?php echo @CONFIG_SOPLANNING_TITLE; ?>
&nbsp;<small><?php echo $this->_tpl_vars['infoVersion']; ?>
</small></span>
							<?php else: ?>
								<span id="soplanning_title"><?php echo @CONFIG_SOPLANNING_TITLE; ?>
&nbsp;<small><?php echo $this->_tpl_vars['infoVersion']; ?>
</small></span>
							<?php endif; ?>
						</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/planning.php" class="dropdown-toggle"><img src="./assets/img/pictos/logo.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuAfficherPlanning']; ?>
</a>
								<ul class="dropdown-menu dropdown-menu-hover">
									<li><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/planning.php"><img src="./assets/img/pictos/logo.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuAfficherPlanning']; ?>
</a></li>
									<?php if (! in_array ( 'tasks_readonly' , $this->_tpl_vars['user']['tabDroits'] )): ?>
										<li><a href="javascript:Reloader.stopRefresh();xajax_ajoutPeriode();undefined;"><img src="./assets/img/pictos/addplanning.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuAjouterPeriode']; ?>
</a></li>
									<?php endif; ?>
								</ul>
							</li>
							<?php if (in_array ( 'projects_manage_all' , $this->_tpl_vars['user']['tabDroits'] ) || in_array ( 'projects_manage_own' , $this->_tpl_vars['user']['tabDroits'] )): ?>
								<li class="divider-vertical"></li>
								<li class="dropdown">
									<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/projets.php" class="dropdown-toggle"><img src="./assets/img/pictos/projets.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuListeProjets']; ?>
</a>
									<ul class="dropdown-menu dropdown-menu-hover">
										<li><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/projets.php"><img src="./assets/img/pictos/projets.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuListeProjets']; ?>
</a></li>
										<li><a href="javascript:Reloader.stopRefresh();xajax_ajoutProjet();undefined;"><img src="./assets/img/pictos/addprojet.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuAjouterProjet']; ?>
</a></li>
										<?php if (in_array ( 'projectgroups_manage_all' , $this->_tpl_vars['user']['tabDroits'] )): ?>
											<li><a href="groupe_list.php"><img src="./assets/img/pictos/groupes.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuListeGroupes']; ?>
</a></li>
										<?php endif; ?>
									</ul>
								</li>
							<?php endif; ?>
							<?php if (in_array ( 'users_manage_all' , $this->_tpl_vars['user']['tabDroits'] )): ?>
								<li class="divider-vertical"></li>
								<li class="dropdown">
									<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php" class="dropdown-toggle"><img src="./assets/img/pictos/users.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuGestionUsers']; ?>
</a>
									<ul class="dropdown-menu dropdown-menu-hover">
										<li><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php"><img src="./assets/img/pictos/users.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuGestionUsers']; ?>
</a></li>
										<li><a href="javascript:xajax_modifUser();undefined;"><img src="./assets/img/pictos/adduser.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuCreerUser']; ?>
</a></li>
										<li><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_groupes.php"><img src="./assets/img/pictos/user_groupes.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuGroupesUsers']; ?>
</a></li>
									</ul>
								</li>
							<?php endif; ?>
							              <?php if (true == false): ?>
								<li class="divider-vertical"></li>
								<li class="dropdown">
									<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php" class="dropdown-toggle"><img src="./assets/img/pictos/users.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuGestionUsers']; ?>
</a>
									<ul class="dropdown-menu dropdown-menu-hover">
										<li><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php"><img src="./assets/img/pictos/users.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuGestionUsers']; ?>
</a></li>
										<li><a href="javascript:xajax_modifUser();undefined;"><img src="./assets/img/pictos/adduser.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuCreerUser']; ?>
</a></li>
										<li><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_groupes.php"><img src="./assets/img/pictos/user_groupes.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuGroupesUsers']; ?>
</a></li>
									</ul>
								</li>
							<?php endif; ?>
							<?php if (in_array ( 'parameters_all' , $this->_tpl_vars['user']['tabDroits'] )): ?>
								<li class="divider-vertical"></li>
								<li class="dropdown">
									<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/options.php" class="dropdown-toggle"><img src="./assets/img/pictos/options.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuOptions']; ?>
</a>
									<ul class="dropdown-menu dropdown-menu-hover">
										<li><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/options.php"><img src="./assets/img/pictos/options.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuOptions']; ?>
</a></li>
										<li><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/feries.php"><img src="./assets/img/pictos/feries.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuFeries']; ?>
</a></li>
										<?php if (@CONFIG_SOPLANNING_OPTION_LIEUX == 1): ?>
											<li><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/lieux.php"><img src="./assets/img/pictos/location.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuLieux']; ?>
</a></li>
										<?php endif; ?>
										<?php if (@CONFIG_SOPLANNING_OPTION_RESSOURCES == 1): ?>
											<li><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/ressources.php"><img src="./assets/img/pictos/plug.png" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuRessources']; ?>
</a></li>
										<?php endif; ?>
									</ul>
								</li>
							<?php endif; ?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<?php if (@CONFIG_SOPLANNING_OPTION_RESSOURCES == 1 && $this->_tpl_vars['user']['user_id'] == 'publicspl'): ?>
								<a href="#"><?php echo $this->_config[0]['vars']['accesPublicUsername']; ?>
</a>	
								<?php else: ?>
								<a href="javascript:xajax_modifProfil();undefined;"><?php echo $this->_tpl_vars['user']['nom']; ?>
 (<?php echo $this->_tpl_vars['user']['user_id']; ?>
)</a>
								<?php endif; ?>
							</li>
							<li>
								<a href="process/login.php?action=logout&language=<?php echo $this->_tpl_vars['lang']; ?>
"><img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/logout.png" alt="" class="picto-logout"/></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset ( $this->_tpl_vars['smartyData']['message'] )): ?>
			<?php $this->assign('messageFinal', ((is_array($_tmp=$this->_tpl_vars['smartyData']['message'])) ? $this->_run_mod_handler('formatMessage', true, $_tmp) : formatMessage($_tmp))); ?>
			<div class="container-fluid">
				<div id="divMessage" class="alert <?php if ($this->_tpl_vars['smartyData']['message'] == 'changeNotOK'): ?>alert-danger<?php else: ?>alert-success<?php endif; ?>">
					<p><?php echo $this->_tpl_vars['messageFinal']; ?>
</p>
				</div>
			</div>
		<?php endif; ?>
				<script type="text/javascript" src="assets/js/cooltip.js"></script>
		<script type="text/javascript">ctPageDefaults(WIDTH, 320, FGCOLOR, '#EBEBE0', null, 1, TEXTSIZE, '11px'); </script>
		<div id="ctDiv" class="divTooltip"></div>