<?php /* Smarty version 2.6.29, created on 2017-04-28 16:09:48
         compiled from www_options.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'www_options.tpl', 46, false),array('modifier', 'cat', 'www_options.tpl', 54, false),array('modifier', 'substr', 'www_options.tpl', 125, false),array('modifier', 'explode', 'www_options.tpl', 162, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "www_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<ul class="nav  nav-pills nav-stacked soplanning-box" id="myTab">
				<li class="active">
					<a href="#param-global"><?php echo $this->_config[0]['vars']['options_configGenerale']; ?>
</a>
				</li>
				<li>
					<a href="#param-planning"><?php echo $this->_config[0]['vars']['options_planning']; ?>
</a>
				</li>
				<li>
					<a href="#param-divers"><?php echo $this->_config[0]['vars']['options_divers']; ?>
</a>
				</li>
				<li>
					<a href="#param-smtp"><?php echo $this->_config[0]['vars']['options_smtp']; ?>
</a>
				</li>
				<li>
					<a href="#param-testmail"><?php echo $this->_config[0]['vars']['options_envoyerMailTest']; ?>
</a>
				</li>
				<li>
					<a href="#param-walldisplay"><?php echo $this->_config[0]['vars']['options_walldisplay']; ?>
</a>
				</li>
				<li>
					<a href="#param-libreplan"><?php echo $this->_config[0]['vars']['options_libreplan']; ?>
</a>
				</li>
				<li>
					<a href="#param-synchronize"><?php echo $this->_config[0]['vars']['options_synchronize']; ?>
</a>
				</li>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="soplanning-box">
				<div class="tab-content">
					<div class="tab-pane active" id="param-global">
						<form action="process/options.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
							<fieldset>
								<legend>
									<?php echo $this->_config[0]['vars']['options_configGenerale']; ?>

								</legend>
								<div class="form-group col-md-12 form-inline">
									<label class="col-md-4 control-label" for="SOPLANNING_TITLE"><?php echo $this->_config[0]['vars']['options_titre']; ?>
 :</label>
									<div class="col-md-5">
										<input type="text" class="form-control input-xlarge" name="SOPLANNING_TITLE" id="SOPLANNING_TITLE" value="<?php echo ((is_array($_tmp=((is_array($_tmp=@CONFIG_SOPLANNING_TITLE)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
">
										&nbsp;<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['options_aide_titre'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
									</div>
								</div>
								<div class="form-group col-md-12 form-inline">
									<label class="col-md-4 control-label" for="SOPLANNING_URL"><?php echo $this->_config[0]['vars']['options_url']; ?>
 :</label>
									<div class="col-md-6">
										<input type="text" class="form-control input-xlarge" name="SOPLANNING_URL" id="SOPLANNING_URL" value="<?php echo @CONFIG_SOPLANNING_URL; ?>
">
										&nbsp;<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_config[0]['vars']['options_aide_url'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')))) ? $this->_run_mod_handler('cat', true, $_tmp, '<br>') : smarty_modifier_cat($_tmp, '<br>')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['urlSuggeree']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['urlSuggeree'])); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
									</div>
								</div>
								<div class="form-group col-md-12 form-inline">
									<label class="col-md-4 control-label" for="SOPLANNING_LOGO"><?php echo $this->_config[0]['vars']['options_logo']; ?>
 :</label>
									<div class="col-md-8">
										<input type="hidden" name="old_logo" value="<?php echo @CONFIG_SOPLANNING_LOGO; ?>
"/>
										<input type="file" accept=".jpg, .png, .jpeg, .gif" name="SOPLANNING_LOGO" id="SOPLANNING_LOGO" class="pull-left" />
										&nbsp;<span onmouseover="return coolTip('<?php echo ((is_array($_tmp='options_aide_logo')) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
									</div>
								</div>
								<?php if (@CONFIG_SOPLANNING_LOGO != ''): ?>
								<div class="form-group col-md-12">
									<label class="col-md-4 control-label" for="SOPLANNING_LOGO"></label>
									<div class="col-md-8">
										<img src="./upload/logo/<?php echo @CONFIG_SOPLANNING_LOGO; ?>
" alt='logo' />
										<label class="checkbox-inline">
										<input type="checkbox" name="SOPLANNING_LOGO_SUPPRESSION" id="SOPLANNING_LOGO_SUPPRESSION">
										&nbsp;<?php echo $this->_config[0]['vars']['options_logo_supprimer']; ?>

										</label>
									</div>
								</div>
								<?php endif; ?>
								<div class="form-group col-md-12">
									<label class="col-md-4 control-label" for="SOPLANNING_THEME"><?php echo $this->_config[0]['vars']['options_theme']; ?>
 :</label>
									<div class="col-md-4">
										<input type="hidden" name="old_theme" value="<?php echo @CONFIG_SOPLANNING_THEME; ?>
"/>
										<select name='SOPLANNING_THEME' id='SOPLANNING_THEME' class="form-control">
										<?php $_from = $this->_tpl_vars['themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
											<option value='<?php echo $this->_tpl_vars['t']; ?>
.css' <?php if (((is_array($_tmp=$this->_tpl_vars['t'])) ? $this->_run_mod_handler('cat', true, $_tmp, '.css') : smarty_modifier_cat($_tmp, '.css')) == @CONFIG_SOPLANNING_THEME): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['t']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
										</select>
									</div>
									<div class="col-md-1 control-label">
										<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['options_aide_theme'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['config_options_acces']; ?>
 :</label>
									<div class="col-md-7">
										<div class="radio">
											<label>
											<input type="radio" name="SOPLANNING_OPTION_ACCES" onclick="$('#optionscle').hide();" <?php if (@CONFIG_SOPLANNING_OPTION_ACCES == 0): ?>checked="checked"<?php endif; ?> value="0">
											&nbsp;<?php echo $this->_config[0]['vars']['config_options_accesprive']; ?>
 <span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['config_aide_options_accesprive'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
											</label>
										</div>
										<div class="radio">
											<label>
											<input type="radio" name="SOPLANNING_OPTION_ACCES" onclick="$('#optionscle').hide();" <?php if (@CONFIG_SOPLANNING_OPTION_ACCES == 1): ?>checked="checked"<?php endif; ?> value="1">
											&nbsp;<?php echo $this->_config[0]['vars']['config_options_accespublic']; ?>
 <span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['config_aide_options_accespublic'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
											</label>
										</div>
										<div class="radio">
											<label>
											<input type="radio" name="SOPLANNING_OPTION_ACCES" onclick="$('#optionscle').show();" <?php if (@CONFIG_SOPLANNING_OPTION_ACCES == 2): ?>checked="checked"<?php endif; ?> value="2">
											&nbsp;<?php echo $this->_config[0]['vars']['config_options_accespubliccle']; ?>
 <span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['config_aide_options_accespubliccle'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
											</label>
										</div>
										<div id="optionscle" style="display:<?php if (@CONFIG_SOPLANNING_OPTION_ACCES == 2): ?>block<?php else: ?>none<?php endif; ?>">
										<div class="form-group col-md-12 form-inline">
											<label class="col-md-1 control-label"></label>
											<label class="col-md-5 control-label" for="CONFIG_SECURE_KEY"><?php echo $this->_config[0]['vars']['config_options_clesecurite']; ?>
 :</label>
											<div class="col-md-6">
												<input type="text" class="form-control input-large" name="CONFIG_SECURE_KEY" id="CONFIG_SECURE_KEY" value="<?php echo @CONFIG_SECURE_KEY; ?>
">
												<a onclick="javascript:token();" class="cursor-pointer"><img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/options.png" onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['config_options_genererclesecurite'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', WIDTH, 270)" class="picto" alt="" onmouseout="nd()" /></a>
											</div>
										</div>
										<div class="form-group col-md-12 form-inline">
											<label class="col-md-1 control-label"></label>
											<label class="col-md-5 control-label"><?php echo $this->_config[0]['vars']['config_options_urlpubliccle']; ?>
 :</label>
											<div class="col-md-6">
											<?php if (((is_array($_tmp=@CONFIG_SOPLANNING_URL)) ? $this->_run_mod_handler('substr', true, $_tmp, -1) : substr($_tmp, -1)) == '/'): ?><?php $this->assign('sep', ''); ?><?php else: ?><?php $this->assign('sep', '/'); ?><?php endif; ?>
											<a href="<?php if (@CONFIG_SOPLANNING_URL == ''): ?><?php echo $this->_tpl_vars['urlSuggeree']; ?>
planning.php?public=1&cle=<?php echo @CONFIG_SECURE_KEY; ?>
" target="_blank"><?php echo $this->_tpl_vars['urlSuggeree']; ?>
<?php else: ?><?php echo @CONFIG_SOPLANNING_URL; ?>
<?php echo $this->_tpl_vars['sep']; ?>
planning.php?public=1&cle=<?php echo @CONFIG_SECURE_KEY; ?>
" target="_blank"><?php echo @CONFIG_SOPLANNING_URL; ?>
<?php echo $this->_tpl_vars['sep']; ?>
<?php endif; ?>planning.php?public=1&cle=<?php echo @CONFIG_SECURE_KEY; ?>
</a>
											</div>
										</div>
										</div>
									</div>
								</div>	
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['modules']; ?>
 :</label>
									<div class="col-md-7">
										<label class="checkbox margin-left-5">
											<input type="checkbox" name="SOPLANNING_OPTION_LIEUX" id="SOPLANNING_OPTION_LIEUX" <?php if (@CONFIG_SOPLANNING_OPTION_LIEUX == 1): ?>checked="checked"<?php endif; ?>>
											&nbsp;<?php echo $this->_config[0]['vars']['config_options_lieux']; ?>
 <span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['config_aide_options_lieux'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
										</label>
										<label class="checkbox margin-left-5">											
											<input type="checkbox" name="SOPLANNING_OPTION_RESSOURCES" id="SOPLANNING_OPTION_RESSOURCES" <?php if (@CONFIG_SOPLANNING_OPTION_RESSOURCES == 1): ?>checked="checked"<?php endif; ?>>
											&nbsp;<?php echo $this->_config[0]['vars']['config_options_ressources']; ?>
 <span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['config_aide_options_ressources'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
										</label>
									</div>
								</div>
								<div class="form-group col-md-12">
									<div class="col-md-4"></div>
									<div class="col-md-8">
										<br />
										<input type="submit" class="btn btn-primary" value="<?php echo $this->_config[0]['vars']['submit']; ?>
"/>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="tab-pane" id="param-planning">
						<form action="process/options.php" method="POST" class="form-horizontal">
							<fieldset>
								<legend>
									<?php echo $this->_config[0]['vars']['options_planning']; ?>

								</legend>
								<div class="form-group col-md-12">
									<label class="col-md-4 control-label"><?php $this->assign('jours', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, @CONFIG_DAYS_INCLUDED) : explode($_tmp, @CONFIG_DAYS_INCLUDED))); ?> <?php echo $this->_config[0]['vars']['options_joursInclus']; ?>
 :</label>
									<div class="col-md-8 form-inline">
										<label class="checkbox-inline">
											<input type="checkbox" name="DAYS_INCLUDED[]" value="1" id="chklundi" <?php if (in_array ( '1' , $this->_tpl_vars['jours'] )): ?>checked="checked"<?php endif; ?>> <?php echo $this->_config[0]['vars']['day_1']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="DAYS_INCLUDED[]" value="2" id="chkmardi" <?php if (in_array ( '2' , $this->_tpl_vars['jours'] )): ?>checked="checked"<?php endif; ?>> <?php echo $this->_config[0]['vars']['day_2']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="DAYS_INCLUDED[]" value="3" id="chkmercredi" <?php if (in_array ( '3' , $this->_tpl_vars['jours'] )): ?>checked="checked"<?php endif; ?>> <?php echo $this->_config[0]['vars']['day_3']; ?>

										</label>
										<br />
										<label class="checkbox-inline">
											<input type="checkbox" name="DAYS_INCLUDED[]" value="4" id="chkjeudi" <?php if (in_array ( '4' , $this->_tpl_vars['jours'] )): ?>checked="checked"<?php endif; ?>> <?php echo $this->_config[0]['vars']['day_4']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="DAYS_INCLUDED[]" value="5" id="chkvendredi" <?php if (in_array ( '5' , $this->_tpl_vars['jours'] )): ?>checked="checked"<?php endif; ?>> <?php echo $this->_config[0]['vars']['day_5']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="DAYS_INCLUDED[]" value="6" id="chksamedi" <?php if (in_array ( '6' , $this->_tpl_vars['jours'] )): ?>checked="checked"<?php endif; ?>> <?php echo $this->_config[0]['vars']['day_6']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="DAYS_INCLUDED[]" value="0" id="chkdimanche" <?php if (in_array ( '0' , $this->_tpl_vars['jours'] )): ?>checked="checked"<?php endif; ?>> <?php echo $this->_config[0]['vars']['day_0']; ?>

										</label>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-4 control-label"><?php $this->assign('heuresAffichees', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, @CONFIG_HOURS_DISPLAYED) : explode($_tmp, @CONFIG_HOURS_DISPLAYED))); ?> <?php echo $this->_config[0]['vars']['options_heuresIncluses']; ?>
 :</label>
									<div class="col-md-8 form-inline">
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="0" <?php if (in_array ( '0' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 0<?php echo $this->_config[0]['vars']['tab_h']; ?>
-1<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="1" <?php if (in_array ( '1' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 1<?php echo $this->_config[0]['vars']['tab_h']; ?>
-2<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="2" <?php if (in_array ( '2' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 2<?php echo $this->_config[0]['vars']['tab_h']; ?>
-3<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="3" <?php if (in_array ( '3' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 3<?php echo $this->_config[0]['vars']['tab_h']; ?>
-4<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="4" <?php if (in_array ( '4' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 4<?php echo $this->_config[0]['vars']['tab_h']; ?>
-5<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="5" <?php if (in_array ( '5' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 5<?php echo $this->_config[0]['vars']['tab_h']; ?>
-6<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="6" <?php if (in_array ( '6' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 6<?php echo $this->_config[0]['vars']['tab_h']; ?>
-7<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
									<br />
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="7" <?php if (in_array ( '7' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 7<?php echo $this->_config[0]['vars']['tab_h']; ?>
-8<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="8" <?php if (in_array ( '8' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 8<?php echo $this->_config[0]['vars']['tab_h']; ?>
-9<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="9" <?php if (in_array ( '9' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 9<?php echo $this->_config[0]['vars']['tab_h']; ?>
-10<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="10" <?php if (in_array ( '10' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 10<?php echo $this->_config[0]['vars']['tab_h']; ?>
-11<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="11" <?php if (in_array ( '11' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 11<?php echo $this->_config[0]['vars']['tab_h']; ?>
-12<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="12" <?php if (in_array ( '12' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 12<?php echo $this->_config[0]['vars']['tab_h']; ?>
-13<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
									<br />
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="13" <?php if (in_array ( '13' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 13<?php echo $this->_config[0]['vars']['tab_h']; ?>
-14<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="14" <?php if (in_array ( '14' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 14<?php echo $this->_config[0]['vars']['tab_h']; ?>
-15<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="15" <?php if (in_array ( '15' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 15<?php echo $this->_config[0]['vars']['tab_h']; ?>
-16<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="16" <?php if (in_array ( '16' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 16<?php echo $this->_config[0]['vars']['tab_h']; ?>
-17<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="17" <?php if (in_array ( '17' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 17<?php echo $this->_config[0]['vars']['tab_h']; ?>
-18<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="18" <?php if (in_array ( '18' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 18<?php echo $this->_config[0]['vars']['tab_h']; ?>
-19<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
									<br />										
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="19" <?php if (in_array ( '19' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 19<?php echo $this->_config[0]['vars']['tab_h']; ?>
-20<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="20" <?php if (in_array ( '20' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 20<?php echo $this->_config[0]['vars']['tab_h']; ?>
-21<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="21" <?php if (in_array ( '21' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 21<?php echo $this->_config[0]['vars']['tab_h']; ?>
-22<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="22" <?php if (in_array ( '22' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 22<?php echo $this->_config[0]['vars']['tab_h']; ?>
-23<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="HOURS_DISPLAYED[]" value="23" <?php if (in_array ( '23' , $this->_tpl_vars['heuresAffichees'] )): ?>checked="checked"<?php endif; ?>> 23<?php echo $this->_config[0]['vars']['tab_h']; ?>
-0<?php echo $this->_config[0]['vars']['tab_h']; ?>

										</label>
									</div>
								</div>
								<div class="form-group form-inline col-md-12">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_dureeDefautJour']; ?>
 :</label>
									<div class="col-md-8">
										<input name="DURATION_DAY" type="text" value="<?php echo @CONFIG_DURATION_DAY; ?>
" class="form-control input-small"/>
										&nbsp;<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['options_aide_dureeDefaut'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
										<?php echo $this->_config[0]['vars']['options_dureeDefautMatin']; ?>
 :
										<input name="DURATION_AM" type="text" value="<?php echo @CONFIG_DURATION_AM; ?>
" class="form-control input-small" />
										&nbsp;<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['options_aide_dureeDefaut'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
										<?php echo $this->_config[0]['vars']['options_dureeDefautApresmidi']; ?>
 :
										<input name="DURATION_PM" type="text" value="<?php echo @CONFIG_DURATION_PM; ?>
" class="form-control input-small" />
										&nbsp;<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['options_aide_dureeDefaut'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
									</div>
								</div>
								<input type="hidden" name="PLANNING_DATE_FORMAT" value="1"/>
								<div class="form-group col-md-12">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_nbMoisDefaut']; ?>
 :</label>
									<div class="col-md-2">
										<input name="DEFAULT_NB_MONTHS_DISPLAYED" type="text" value="<?php echo @CONFIG_DEFAULT_NB_MONTHS_DISPLAYED; ?>
" class="form-control" />
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_nbjoursDefaut']; ?>
 :</label>
									<div class="col-md-2">
										<input name="DEFAULT_NB_DAYS_DISPLAYED" type="text" value="<?php echo @CONFIG_DEFAULT_NB_DAYS_DISPLAYED; ?>
" class="form-control" />
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_nbLignes']; ?>
 :</label>
									<div class="col-md-2">
										<input name="DEFAULT_NB_ROWS_DISPLAYED" type="text" value="<?php echo @CONFIG_DEFAULT_NB_ROWS_DISPLAYED; ?>
" class="form-control" />
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_nbJoursPasses']; ?>
 :</label>
									<div class="col-md-2">
										<input name="DEFAULT_NB_PAST_DAYS" type="text" value="<?php echo @CONFIG_DEFAULT_NB_PAST_DAYS; ?>
" class="form-control" />
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_raffraichissement']; ?>
 :</label>
									<div class="col-md-2">
										<input name="REFRESH_TIMER" type="text" value="<?php echo @CONFIG_REFRESH_TIMER; ?>
" class="form-control" />
									</div>
								</div>
								<div class="form-group col-md-12 form-inline">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_hauteurLigne']; ?>
 :</label>
									<div class="col-md-3">
										<input name="PLANNING_LINE_HEIGHT" type="text" value="<?php echo @CONFIG_PLANNING_LINE_HEIGHT; ?>
" class="form-control input-middle"/>
										&nbsp;<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['options_aide_hauteurLigne'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
									</div>
								</div>
								<div class="form-group col-md-12 form-inline">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_uneTacheParJour']; ?>
 :</label>
									<div class="col-md-3">
										<select name="PLANNING_ONE_ASSIGNMENT_MAX_PER_DAY" class="form-control input-middle">
											<option value="0" <?php if (@CONFIG_PLANNING_ONE_ASSIGNMENT_MAX_PER_DAY == 0): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['non']; ?>
</option>
											<option value="1" <?php if (@CONFIG_PLANNING_ONE_ASSIGNMENT_MAX_PER_DAY == 1): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['oui']; ?>
</option>
										</select>
										&nbsp;<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['options_aide_uneTacheParJour'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
									</div>
								</div>
								<div class="form-group col-md-12 form-inline">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_repeterHeaderDate']; ?>
 :</label>
									<div class="col-md-3">
										<input name="PLANNING_REPEAT_HEADER" type="text" value="<?php echo @CONFIG_PLANNING_REPEAT_HEADER; ?>
" class="form-control input-middle" />
										&nbsp;<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['options_aide_repeterHeaderDate'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
									</div>
								</div>
								<div class="form-group col-md-12">
									<div class="col-md-4"></div>
									<div class="col-md-8">
										<input type="submit" class="btn btn-primary" value="<?php echo $this->_config[0]['vars']['submit']; ?>
"/>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="tab-pane" id="param-divers">
						<form action="process/options.php" method="POST" class="form-horizontal">
							<fieldset>
								<legend>
									<?php echo $this->_config[0]['vars']['options_divers']; ?>

								</legend>
								<div class="form-group form-inline">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_couleursProjets']; ?>
 :</label>
									<div class="col-md-6">
										<input name="PROJECT_COLORS_POSSIBLE" type="text" value="<?php echo @CONFIG_PROJECT_COLORS_POSSIBLE; ?>
" class="form-control input-xlarge" />
										&nbsp;<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['options_aide_couleursPossibles'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
									</div>
								</div>
								<div class="form-group form-inline">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_lienDefaut']; ?>
 :</label>
									<div class="col-md-6">
										<input name="DEFAULT_PERIOD_LINK" type="text" value="<?php echo @CONFIG_DEFAULT_PERIOD_LINK; ?>
" class="form-control input-xlarge" />
										&nbsp;<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['options_aide_LinkPeriod'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
									</div>
								</div>
								<div class="form-group form-inline">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_urlRedirection']; ?>
 :</label>
									<div class="col-md-6">
										<input name="LOGOUT_REDIRECT" type="text" value="<?php echo @CONFIG_LOGOUT_REDIRECT; ?>
" class="form-control input-xlarge" />
										&nbsp;<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['options_aide_redirect'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-4"></div>
									<div class="col-md-6">
										<br />
										<input type="submit" class="btn btn-primary" value="<?php echo $this->_config[0]['vars']['submit']; ?>
"/>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="tab-pane" id="param-smtp">
						<form action="process/options.php" method="POST" class="form-horizontal">
							<fieldset>
								<legend>
									<?php echo $this->_config[0]['vars']['options_smtp_titre']; ?>

								</legend>
								<div class="form-group form-inline">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_smtp_host']; ?>
 :</label>
									<div class="col-md-3">
										<input name="SMTP_HOST" type="text" value="<?php echo ((is_array($_tmp=((is_array($_tmp=@CONFIG_SMTP_HOST)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
" class="form-control" />
									</div>
									<label class="col-md-1 control-label">
										<?php echo $this->_config[0]['vars']['options_smtp_port']; ?>
 :
									</label>
									<div class="col-md-3 inline">
										<input name="SMTP_PORT" type="text" value="<?php echo ((is_array($_tmp=((is_array($_tmp=@CONFIG_SMTP_PORT)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
" class="form-control input-middle" />
										&nbsp;<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['options_aide_smtp'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_smtp_secure']; ?>
</label>
									<div class="col-md-6">
										<select name="SMTP_SECURE" class="form-control input-large">
											<option value="" <?php if (@CONFIG_SMTP_SECURE == ""): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['options_smtp_nonSecurise']; ?>
</option>
											<option value="ssl" <?php if (@CONFIG_SMTP_SECURE == 'ssl'): ?>selected="selected"<?php endif; ?>>SSL</option>
											<option value="tls" <?php if (@CONFIG_SMTP_SECURE == 'tls'): ?>selected="selected"<?php endif; ?>>TLS</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_smtp_from']; ?>
 :</label>
									<div class="col-md-6">
										<input name="SMTP_FROM" type="text" value="<?php echo ((is_array($_tmp=((is_array($_tmp=@CONFIG_SMTP_FROM)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
" class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_smtp_login']; ?>
 :</label>
									<div class="col-md-6">
										<input name="SMTP_LOGIN" type="text" value="<?php echo ((is_array($_tmp=((is_array($_tmp=@CONFIG_SMTP_LOGIN)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
" class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_smtp_password']; ?>
 :</label>
									<div class="col-md-6">
										<input name="SMTP_PASSWORD" type="password" size="30" value="<?php if (@CONFIG_SMTP_LOGIN != ""): ?>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX<?php endif; ?>" class="form-control"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-4"></div>
									<div class="col-md-6">
										<br />
										<input type="submit" class="btn btn-primary" value="<?php echo $this->_config[0]['vars']['submit']; ?>
"/>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="tab-pane" id="param-testmail">
						<form action="process/options.php" method="POST" class="form-horizontal">
							<fieldset>
								<legend>
									<?php echo $this->_config[0]['vars']['options_envoyerMailTest']; ?>

								</legend>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_envoyerMailTest_destinataire']; ?>
 :</label>
									<div class="col-md-6">
										<input name="mailTestDestinataire" type="text" class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"></label>
									<div class="col-md-6">
										<input name="smtp_traces" type="checkbox" /> <?php echo $this->_config[0]['vars']['afficher_logs_smtp']; ?>

									</div>
								</div>
								<div class="form-group">
									<div class="col-md-4"></div>
									<div class="col-md-6">
										<br />
										<input type="submit" class="btn btn-primary" value="<?php echo $this->_config[0]['vars']['submit']; ?>
" <?php if (@CONFIG_SMTP_HOST == '' || @CONFIG_SMTP_PORT == '' || @CONFIG_SMTP_FROM == ''): ?>disabled="disabled"<?php endif; ?>/>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="tab-pane" id="param-walldisplay">
						<form action="process/options.php" method="POST" class="form-horizontal">
							<fieldset>
								<legend>
									<?php echo $this->_config[0]['vars']['options_walldisplay']; ?>

								</legend>
								<div class="form-group">
									<label class="col-md-4 control-label">
                    <?php echo $this->_config[0]['vars']['options_walldisplay_refresh']; ?>
 :</label>
									<div class="col-md-6">
										<input name="walldisplayrefreshrate" type="text" 
                           class="form-control" 
                           value="<?php echo @CONFIG_WALL_DISPLAY_REFRESH; ?>
"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">
                    <?php echo $this->_config[0]['vars']['options_walldisplay_nbweek']; ?>
 :</label>
									<div class="col-md-6">
										<input name="walldisplaynbweeks" type="text" 
                           class="form-control" 
                           value="<?php echo @CONFIG_WALL_DISPLAY_WEEKS; ?>
"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-4"></div>
									<div class="col-md-6">
										<br />
										<input type="submit" class="btn btn-primary" value="<?php echo $this->_config[0]['vars']['submit']; ?>
" /> 
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="tab-pane" id="param-synchronize">
						<form action="process/options.php" method="POST" id="sync" class="form-horizontal">
							<fieldset>
								<legend>
									<?php echo $this->_config[0]['vars']['options_synchronize']; ?>

								</legend>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_synchronize_server']; ?>
 :</label>
									<div class="col-md-6">
										<input name="synchronize_server" type="text" class="form-control" value="<?php echo @CONFIG_SYNCHRONIZE_SERVER; ?>
"/>
                <!--    <span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['options_aide_titre'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>  -->
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_synchronize_file']; ?>
 :</label>
									<div class="col-md-6">
										<input name="synchronize_file" type="text" class="form-control" value="<?php echo @CONFIG_SYNCHRONIZE_FILE; ?>
"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_synchronize_user']; ?>
 :</label>
									<div class="col-md-6">
										<input name="synchronize_user" type="text" class="form-control" value="<?php echo @CONFIG_SYNCHRONIZE_USER; ?>
"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_synchronize_pass']; ?>
 :</label>
									<div class="col-md-6">
										<input name="synchronize_pass" type="text" class="form-control" value="<?php echo @CONFIG_SYNCHRONIZE_PASS; ?>
"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_synchronize_rate']; ?>
 :</label>
									<div class="col-md-6">
										<input name="synchronize_rate" type="text" class="form-control" value="<?php echo @CONFIG_SYNCHRONIZE_RATE; ?>
"/>
									</div>
                </div>
								<div class="form-group">
									<label class="col-md-4 control-label">
                    <?php echo $this->_config[0]['vars']['options_synchronize_groups']; ?>
 :</label>
									<div class="col-md-6">
										<input name="synchronize_groups" type="text" 
                           class="form-control" id='synchronize_groups'
                           value="<?php echo @CONFIG_SYNCHRONIZE_GROUPS; ?>
" 
                           readonly="readonly"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-4"></div>
									<div class="col-md-6">
										<br />
                    <input type="button" class="btn btn-primary" 
                           value="<?php echo $this->_config[0]['vars']['submit']; ?>
" 
                           onclick="document.getElementById('sync').submit();" />
                    &nbsp;&nbsp;
                    <input type="button" class="btn btn-info" 
                            value="<?php echo $this->_config[0]['vars']['options_synchronize']; ?>
" 
                            data-toggle="modal" data-target="#myPopup"
                            onclick="synchronize();"/>
                    &nbsp;&nbsp;
                    <input type="button" class="btn btn-info" 
                           value="<?php echo $this->_config[0]['vars']['options_choose_group']; ?>
" 
                           data-toggle="modal" data-target="#myPopup"
                           onclick='getGroups();' />
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="tab-pane" id="param-libreplan">
						<form action="process/options.php" method="POST" id="sync" class="form-horizontal">
							<fieldset>
								<legend>
									<?php echo $this->_config[0]['vars']['options_libreplan_title']; ?>

								</legend>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_libreplan_server']; ?>
 :</label>
									<div class="col-md-6">
										<input name="libreplan_server" type="text" class="form-control" value="<?php echo @CONFIG_LIBREPLAN_SERVER; ?>
"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_libreplan_file']; ?>
 :</label>
									<div class="col-md-6">
										<input name="libreplan_file" type="text" class="form-control" value="<?php echo @CONFIG_LIBREPLAN_FILE; ?>
"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_libreplan_user']; ?>
 :</label>
									<div class="col-md-6">
										<input name="libreplan_user" type="text" class="form-control" value="<?php echo @CONFIG_LIBREPLAN_USER; ?>
"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['options_libreplan_pass']; ?>
 :</label>
									<div class="col-md-6">
										<input name="libreplan_pass" type="text" class="form-control" value="<?php echo @CONFIG_LIBREPLAN_PASS; ?>
"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-4"></div>
									<div class="col-md-6">
										<br />
                    <input type="submit" class="btn btn-primary" 
                           value="<?php echo $this->_config[0]['vars']['submit']; ?>
" />
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="myPopup" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id='popTitle'></h4>
      </div>
      <div class="modal-body" id='popContent'>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <?php echo $this->_config[0]['vars']['options_popup_close']; ?>
</button>
      </div>
    </div>
    <input type='hidden' id='Action' value='' />
  </div>
</div>
<script type="text/javascript">
<?php echo '
	jQuery(document).ready(function(){
		jQuery("a[data-toggle=popover]")
			.popover()
			.click(function(e) {
			e.preventDefault()
		});
	});

	jQuery(\'#myTab a\').click(function (e) {
		e.preventDefault();
		jQuery(this).tab(\'show\');
	})
	
	var rand = function() {
	return Math.random().toString(36).substr(2); // remove `0.`
	};
	
	var token = function() {
	var key=rand() + rand() + rand(); // to make it longer
	jQuery(\'#CONFIG_SECURE_KEY\').attr(\'value\', key);	
	};
  
  function synchronize()
  {
    var xhttp = new XMLHttpRequest();
    '; ?>

    document.getElementById('popTitle').innerHTML = '<?php echo $this->_config[0]['vars']['options_popup_titleS']; ?>
';
    <?php echo '
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("popContent").innerHTML = this.responseText;
        }
      };
    xhttp.open("GET", "/cron/cron.php", true);
    xhttp.send();
  }

  function getGroups()
  {
    var xhttp = new XMLHttpRequest();
    
    document.getElementById(\'Action\').value = \'Group\';
    '; ?>

    document.getElementById('popTitle').innerHTML = '<?php echo $this->_config[0]['vars']['options_popup_title']; ?>
';
    <?php echo '
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        
        document.getElementById("popContent").innerHTML = this.responseText;
        }
      };
    xhttp.open("GET", "/www/process/getGroups.php", true);
    xhttp.send();
  }
  
  // @TODO: Modifier comportement, si on ré-ouvre le popup, pas à jour
  function addGroup(Group)
  {
    var gA = document.getElementById("grpAvail");
    var gE = document.getElementById("grpEnabled");
    var option = document.createElement("option");
    var Add = \'\';
    
    if( document.getElementById(\'synchronize_groups\').value != "")
      Add += \',\';
    Value = document.getElementById(\'synchronize_groups\').value + Add + Group;
    document.getElementById(\'synchronize_groups\').value = Value;
    
    gA.remove(gA.selectedIndex);
  
    option.text = Group;
    gE.add(option);
  }

  function delGroup(Group)
  {
    var gA = document.getElementById("grpAvail");
    var gE = document.getElementById("grpEnabled");
    var option = document.createElement("option");
    var Add = \'\';
    var txt = "";
    var virgule = \'\';
    var i;
    
    gE.remove(gE.selectedIndex);
    option.text = Group;
    gA.add(option);
    
    for (i = 0; i < gE.length; i++) 
    {
      txt = txt + virgule + gE.options[i].text;
      virgule = \',\';
    }
    
    document.getElementById(\'synchronize_groups\').value = txt;
  }
'; ?>

</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "www_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>