<?php /* Smarty version 2.6.29, created on 2017-04-28 17:53:18
         compiled from www_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'www_index.tpl', 31, false),array('modifier', 'formatMessage', 'www_index.tpl', 41, false),)), $this); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="reply-to" content="support@soplanning.org" />
	<meta name="email" content="support@soplanning.org" />
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
	<script type="text/javascript" src="assets/plugins/jqueryui/i18n/jquery.ui.datepicker-<?php echo $this->_tpl_vars['lang']; ?>
.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap3/js/bootstrap.min.js"></script>
	<?php echo $this->_tpl_vars['xajax']; ?>

</head>
<body>
<div class="container">
	<h3 class="text-center">
		<?php if (@CONFIG_SOPLANNING_LOGO != ''): ?>
				<img src="./upload/logo/<?php echo @CONFIG_SOPLANNING_LOGO; ?>
" alt='logo' style='height:40px;' id="logo" /><br />
		<?php endif; ?>
		<?php if (@CONFIG_SOPLANNING_TITLE != 'SOPlanning'): ?>
			<span class="soplanning_index_title1"><?php echo ((is_array($_tmp=((is_array($_tmp=@CONFIG_SOPLANNING_TITLE)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
</span>
		<?php else: ?>
			<span class="soplanning_index_title2">Simple Online Planning</span>
		<?php endif; ?>
		<?php if (isset ( $this->_tpl_vars['infoVersion'] )): ?>
			<small>v<?php echo $this->_tpl_vars['infoVersion']; ?>
</small>
		<?php endif; ?>
	</h3>
	<div class="small-container">
		<?php if (isset ( $this->_tpl_vars['smartyData']['message'] )): ?>
			<?php $this->assign('messageFinal', ((is_array($_tmp=$this->_tpl_vars['smartyData']['message'])) ? $this->_run_mod_handler('formatMessage', true, $_tmp) : formatMessage($_tmp))); ?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo $this->_tpl_vars['messageFinal']; ?>

			</div>
		<?php endif; ?>
		<form action="process/login.php" method="post" class="form-horizontal box">
			<div class="form-group">
				<label for="login" class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['login_login']; ?>
 :</label>
				<div class="col-md-5">
					<input type="text" class="form-control" name="login" id="login" />
				</div>
			</div>
			<div class="form-group">			
				<label for="password" class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['login_password']; ?>
 :</label>
				<div class="col-md-5">
					<input type="password" class="form-control" name="password" id="password" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"></label>
				<div class="col-md-6">
					<input class="btn btn-primary" type="submit" value="GO" />
					<a href="#pwdReminderModal" role="button" class="btn btn-link" data-toggle="modal"><?php echo $this->_config[0]['vars']['rappelPwdTitre']; ?>
</a><br />
				</div>
			</div>
		</form>
		<?php if (@CONFIG_SOPLANNING_OPTION_ACCES == 1): ?>
		<div class="form-group text-center">
			<a href="planning.php?public=1">[ <?php echo $this->_config[0]['vars']['accesPublic']; ?>
 ]</a>
		</div>
		<?php endif; ?>
		<div id="divTranslation">
			<ul class="list-inline flag text-right">
				<li><a tabindex="1" href="?language=pl" class="tooltipEvent" data-title="Polish"><img src="assets/img/flag/pl.png" alt="Polish" title="Polish"/></a></li>
				<li><a tabindex="2" href="?language=pt" class="tooltipEvent" data-title="Portuguese"><img src="assets/img/flag/pt.png" alt="Portuguese" title="Portuguese"/></a></li>
				<li><a tabindex="3" href="?language=es" class="tooltipEvent" data-title="Spanish"><img src="assets/img/flag/es.png" alt="Spanish" title="Spanish" /></a></li>
				<li><a tabindex="4" href="?language=de" class="tooltipEvent" data-title="German"><img src="assets/img/flag/de.png" alt="German" title="German"/></a></li>
				<li><a tabindex="5" href="?language=da" class="tooltipEvent" data-title="Danish"><img src="assets/img/flag/da.png" alt="Danish" title="Danish"/></a></li>
				<li><a tabindex="6" href="?language=hu" class="tooltipEvent" data-title="Hungarian"><img src="assets/img/flag/hu.png" alt="Hungarian" title="Hungarian"/></a></li>
				<li><a tabindex="7" href="?language=nl" class="tooltipEvent" data-title="Dutch"><img src="assets/img/flag/nl.png" alt="Dutch" title="Dutch"/></a></li>
				<li><a tabindex="8" href="?language=it" class="tooltipEvent" data-title="Italian"><img src="assets/img/flag/it.png" alt="Italian" title="Italian"/></a></li>
				<li><a tabindex="9" href="?language=fr" class="tooltipEvent" data-title="French"><img src="assets/img/flag/fr.png" alt="French" title="French"/></a></li>
				<li><a tabindex="10" href="?language=en" class="tooltipEvent" data-title="English"><img src="assets/img/flag/en.png" alt="English" title="English"/></a></li>
			</ul>
			<p class="text-right text-info"><small><a href="mailto:support@soplanning.org"><?php echo $this->_config[0]['vars']['proposerTrad']; ?>
</a></small></p>
		</div>
		<div id="infosVersion" class="hidden"></div>
		<?php if (isset ( $this->_tpl_vars['alerte'] )): ?>
			<div><?php echo $this->_tpl_vars['alerte']; ?>
</div>
		<?php endif; ?>
	</div>
</div>
	<script type="text/javascript" src="assets/js/login.js"></script>
	<script type="text/javascript" src="assets/js/fonctions.js"></script>
	<script type="text/javascript">
	document.getElementById('login').focus();
	setTimeout("xajax_checkAvailableVersion();", 5000);
	</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "www_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>