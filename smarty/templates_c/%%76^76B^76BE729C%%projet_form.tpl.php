<?php /* Smarty version 2.6.29, created on 2017-05-03 09:26:30
         compiled from projet_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'projet_form.tpl', 38, false),array('modifier', 'sqldate2userdate', 'projet_form.tpl', 58, false),array('modifier', 'strpos', 'projet_form.tpl', 68, false),array('modifier', 'cat', 'projet_form.tpl', 76, false),array('modifier', 'buttonFontColor', 'projet_form.tpl', 76, false),array('modifier', 'explode', 'projet_form.tpl', 78, false),array('modifier', 'replace', 'projet_form.tpl', 79, false),)), $this); ?>
<form class="form-horizontal" method="POST" action="" target="_blank">
	<input type="hidden" name="saved" id="saved" value="<?php echo $this->_tpl_vars['projet']['saved']; ?>
" />
	<input type="hidden" name="old_projet_id" id="old_projet_id" value="<?php echo $this->_tpl_vars['projet']['projet_id']; ?>
" />
	<input type="hidden" name="origine" id="origine" value="<?php echo $this->_tpl_vars['origine']; ?>
" />
	<div class="form-group">
		<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['winProjet_identifiant']; ?>
 :</label>
		<div class="col-md-5">
			<input class="form-control" name="projet_id" id="projet_id" type="text" maxlength="10" value="<?php echo $this->_tpl_vars['projet']['projet_id']; ?>
" onChange="xajax_checkProjetId(this.value, '<?php echo $this->_tpl_vars['projet']['projet_id']; ?>
');" />
		</div>
		<div class="col-md-3 left-0">
		<span id="divStatutCheckProjetId"></span>
		<?php echo $this->_config[0]['vars']['winProjet_identifiantCarMax']; ?>

		</div>
		
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['winProjet_nomProjet']; ?>
 :</label>
		<div class="col-md-5">
			<input class="form-control" name="nom" id="nom" type="text" maxlength="30" value="<?php echo $this->_tpl_vars['projet']['nom']; ?>
" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['winProjet_groupe']; ?>
 :</label>
		<div class="col-md-5">
			<select name="groupe_id" id="groupe_id" class="form-control">
				<option value="" <?php if ($this->_tpl_vars['projet']['groupe_id'] == ""): ?>selected="selected"<?php endif; ?>>- - - - - - - - - - - - - - - -</option>
				<?php $_from = $this->_tpl_vars['groupes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['groupe']):
?>
					<option value="<?php echo $this->_tpl_vars['groupe']['groupe_id']; ?>
" <?php if ($this->_tpl_vars['projet']['groupe_id'] == $this->_tpl_vars['groupe']['groupe_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['groupe']['nom']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['winProjet_statut']; ?>
 :</label>
		<div class="col-md-5">
			<select class="form-control" name="statut" id="statut">
				<option value="a_faire" <?php if ($this->_tpl_vars['projet']['statut'] == 'a_faire'): ?>selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_config[0]['vars']['winProjet_statutAFaire'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</option>
				<option value="en_cours" <?php if ($this->_tpl_vars['projet']['statut'] == 'en_cours'): ?>selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_config[0]['vars']['winProjet_statutEnCours'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</option>
				<option value="fait" <?php if ($this->_tpl_vars['projet']['statut'] == 'fait'): ?>selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_config[0]['vars']['winProjet_statutFait'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</option>
				<option value="abandon" <?php if ($this->_tpl_vars['projet']['statut'] == 'abandon'): ?>selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_config[0]['vars']['winProjet_statutAbandon'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</option>
				<option value="archive" <?php if ($this->_tpl_vars['projet']['statut'] == 'archive'): ?>selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_config[0]['vars']['winProjet_statutArchive'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['winProjet_charge']; ?>
 :</label>
		<div class="col-md-2">
			<input class="form-control" name="charge" id="charge" type="text" maxlength="5" value="<?php echo $this->_tpl_vars['projet']['charge']; ?>
" />
		</div>
		<div class="col-md-3 left-0">
		<?php echo $this->_config[0]['vars']['winProjet_chargeJours']; ?>

		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['winProjet_livraison']; ?>
 :</label>
		<div class="col-md-2">
			<input type="text" class="form-control datepicker" name="livraison" id="livraison" maxlength="10" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['projet']['livraison'])) ? $this->_run_mod_handler('sqldate2userdate', true, $_tmp) : sqldate2userdate($_tmp)); ?>
" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['winProjet_lien']; ?>
 :</label>
		<div class="col-md-5">
			<input class="form-control" name="lien" id="lien" type="text" maxlength="255" value="<?php echo $this->_tpl_vars['projet']['lien']; ?>
" />
		</div>
		<?php if ($this->_tpl_vars['projet']['lien'] != ""): ?>
			<div class="col-md-3">
				<a class="btn btn-sm btn-default" onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winProjet_gotoLien'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', WIDTH, 270)"  onmouseout="nd()" href="<?php if (((is_array($_tmp=$this->_tpl_vars['projet']['lien'])) ? $this->_run_mod_handler('strpos', true, $_tmp, 'http') : strpos($_tmp, 'http')) !== 0 && ((is_array($_tmp=$this->_tpl_vars['projet']['lien'])) ? $this->_run_mod_handler('strpos', true, $_tmp, "\\") : strpos($_tmp, "\\")) !== 0): ?>http://<?php endif; ?><?php echo $this->_tpl_vars['projet']['lien']; ?>
" target="_blank"><i class="glyphicon glyphicon-share"></i></a>
			</div>
		<?php endif; ?>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['winProjet_couleur']; ?>
 :</label>
		<div class="col-md-5">
			<?php if (@CONFIG_PROJECT_COLORS_POSSIBLE != ""): ?>
				<select name="couleur" id="couleur" style="background-color:#<?php echo $this->_tpl_vars['projet']['couleur']; ?>
;color:<?php echo ((is_array($_tmp=((is_array($_tmp="#")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['projet']['couleur']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['projet']['couleur'])))) ? $this->_run_mod_handler('buttonFontColor', true, $_tmp) : buttonFontColor($_tmp)); ?>
">
				    <?php if ($this->_tpl_vars['projet']['couleur'] == ""): ?><option value=""><?php echo $this->_config[0]['vars']['winProjet_couleurchoix']; ?>
</option><?php endif; ?>
					<?php $_from = ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, @CONFIG_PROJECT_COLORS_POSSIBLE) : explode($_tmp, @CONFIG_PROJECT_COLORS_POSSIBLE)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['couleurTmp']):
?>
						<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['couleurTmp'])) ? $this->_run_mod_handler('replace', true, $_tmp, '#', '') : smarty_modifier_replace($_tmp, '#', '')); ?>
" style="background-color:<?php echo $this->_tpl_vars['couleurTmp']; ?>
;color:<?php echo ((is_array($_tmp=$this->_tpl_vars['couleurTmp'])) ? $this->_run_mod_handler('buttonFontColor', true, $_tmp) : buttonFontColor($_tmp)); ?>
" <?php if ($this->_tpl_vars['couleurTmp'] == ((is_array($_tmp="#")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['projet']['couleur']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['projet']['couleur']))): ?>selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['couleurTmp'])) ? $this->_run_mod_handler('replace', true, $_tmp, '#', '') : smarty_modifier_replace($_tmp, '#', '')); ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
				<span class="col-md-3" style="background-color:<?php echo $this->_tpl_vars['projet']['couleur']; ?>
">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				</div>
			<?php else: ?>
                <?php if ($_SESSION['couleurExProjet'] != ""): ?>
                    <?php $this->assign('couleurExProjet', $_SESSION['couleurExProjet']); ?>
                <?php else: ?>
                    <?php $this->assign('couleurExProjet', 'ffffff'); ?>
                <?php endif; ?>
				<input class="form-control" name="couleur" id="couleur" maxlength="6" type="text" value="<?php if ($this->_tpl_vars['projet']['couleur'] == ''): ?><?php echo $this->_tpl_vars['couleurExProjet']; ?>
<?php else: ?><?php echo $this->_tpl_vars['projet']['couleur']; ?>
<?php endif; ?>" /></div>
				<div class="col-md-3 left-0">
				<?php echo $this->_config[0]['vars']['winProjet_couleurMaxCar']; ?>

				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['winProjet_createur']; ?>
 :</label>
		<div class="col-md-5">
			<?php if (in_array ( 'projects_manage_all' , $this->_tpl_vars['user']['tabDroits'] )): ?>
				<select name="createur_id" id="createur_id" class="form-control">
					<?php $_from = $this->_tpl_vars['usersOwner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['owner']):
?>
						<option value="<?php echo $this->_tpl_vars['owner']['user_id']; ?>
" <?php if ($this->_tpl_vars['createur']['user_id'] == $this->_tpl_vars['owner']['user_id'] || ( $this->_tpl_vars['createur']['user_id'] == "" && $this->_tpl_vars['owner']['user_id'] == $this->_tpl_vars['user']['user_id'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['owner']['nom']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			<?php else: ?>
				<?php echo $this->_tpl_vars['createur']['nom']; ?>

				<input type="hidden" name="createur_id" id="createur_id" value="<?php echo $this->_tpl_vars['createur']['user_id']; ?>
">
			<?php endif; ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label"><?php echo $this->_config[0]['vars']['winProjet_commentaires']; ?>
 :</label>
		<div class="col-md-5">
			<input class="form-control" name="iteration" id="iteration" maxlength="255" type="text" value="<?php echo $this->_tpl_vars['projet']['iteration']; ?>
" />
		</div>
		<div class="col-md-3 left-0">
		<?php echo $this->_config[0]['vars']['winProjet_commentairesFacultatif']; ?>

		</div>
	</div>
	<div class="form-group">
	<div class="col-md-4 control-label"></div>
		<div class="col-md-4">
			<input type="button" value="<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winProjet_valider'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class="btn btn-primary" onClick="xajax_submitFormProjet('<?php echo $this->_tpl_vars['projet']['projet_id']; ?>
', $('#origine').val(), $('#projet_id').val(), $('#nom').val(), $('#groupe_id').val(), $('#statut').val(), $('#charge').val(), $('#livraison').val(), $('#lien').val(), $('#couleur').val(), $('#createur_id').val(), $('#iteration').val())" />
		</div>
	</div>
</form>