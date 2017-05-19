<?php /* Smarty version 2.6.29, created on 2017-05-03 09:32:50
         compiled from www_user_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'www_user_list.tpl', 16, false),array('modifier', 'escape', 'www_user_list.tpl', 39, false),array('modifier', 'default', 'www_user_list.tpl', 54, false),array('modifier', 'urlencode', 'www_user_list.tpl', 139, false),array('modifier', 'xss_protect', 'www_user_list.tpl', 145, false),array('modifier', 'cat', 'www_user_list.tpl', 165, false),array('modifier', 'buttonFontColor', 'www_user_list.tpl', 165, false),array('modifier', 'sqldatetime2userdatetime', 'www_user_list.tpl', 176, false),array('function', 'math', 'www_user_list.tpl', 29, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "www_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box form-inline">
				<div class="btn-group">
					<a href="javascript:xajax_modifUser();undefined;" class="btn btn-sm btn-default" ><img src="assets/img/pictos/adduser.png" class="picto-large" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuCreerUser']; ?>
</a>
					<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_groupes.php" class="btn btn-sm btn-default"><img src="assets/img/pictos/user_groupes.png" class="picto-large" alt="" />&nbsp;<?php echo $this->_config[0]['vars']['menuGroupesUsers']; ?>
</a>
				</div>

				<div class="btn-group">
					<form method="POST">
					<button class="btn <?php if (count($this->_tpl_vars['filtreEquipe']) > 0): ?>btn-danger<?php else: ?>btn-default<?php endif; ?> dropdown-toggle btn-sm margin-left-30" data-toggle="dropdown"><?php echo $this->_config[0]['vars']['filtreEquipe']; ?>
&nbsp;<span class="caret"></span></button>
					<ul class="dropdown-menu">
						<?php if (count($this->_tpl_vars['filtreEquipe']) > 0): ?>
							<a href="?desactiverfiltreEquipe=1" class="btn btn-danger btn-sm margin-left-10"><?php echo $this->_config[0]['vars']['formFiltreUserDesactiver']; ?>
</a>
						<?php endif; ?>
						<li>
							<input type="hidden" name="filtreEquipe" value="1">
							<table onClick="event.cancelBubble=true;" class="margin-10">
								<tr>
									<td>
										<input type="checkbox" id="gu0" name="gu0" value="1" <?php if (in_array ( 'gu0' , $this->_tpl_vars['filtreEquipe'] )): ?>checked="checked"<?php endif; ?> /><label for="gu0" style="display:inline">&nbsp;<b><?php echo $this->_config[0]['vars']['cocheUserSansGroupe']; ?>
</b></label>

										<?php if (count($this->_tpl_vars['equipes']) > 0): ?>
											<?php echo smarty_function_math(array('assign' => 'nbColonnes','equation' => "ceil(nbEquipes / nbEquipesParColonnes)",'nbEquipes' => count($this->_tpl_vars['equipes']),'nbEquipesParColonnes' => @FILTER_NB_USERS_PER_COLUMN), $this);?>

											<?php echo smarty_function_math(array('assign' => 'maxCol','equation' => "ceil(nbEquipes / nbColonnes)",'nbEquipes' => count($this->_tpl_vars['equipes']),'nbColonnes' => $this->_tpl_vars['nbColonnes']), $this);?>

											<?php $this->assign('tmpNbDansColCourante', '0'); ?>
											<?php $_from = $this->_tpl_vars['equipes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loopEquipes'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loopEquipes']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['equipeCourante']):
        $this->_foreach['loopEquipes']['iteration']++;
?>
												<br/>
												<?php if ($this->_tpl_vars['tmpNbDansColCourante'] >= $this->_tpl_vars['maxCol']): ?>
													<?php $this->assign('tmpNbDansColCourante', '0'); ?>
													</td>
													<td>
												<?php endif; ?>
												<input type="checkbox" id="gu<?php echo $this->_tpl_vars['equipeCourante']['user_groupe_id']; ?>
" name="gu[]" value="<?php echo $this->_tpl_vars['equipeCourante']['user_groupe_id']; ?>
" onClick="filtreCocheUserGroupe('<?php echo $this->_tpl_vars['equipeCourante']['user_groupe_id']; ?>
')" <?php if (in_array ( $this->_tpl_vars['equipeCourante']['user_groupe_id'] , $this->_tpl_vars['filtreEquipe'] )): ?>checked="checked"<?php endif; ?> /> <label for="gu<?php echo $this->_tpl_vars['equipeCourante']['user_groupe_id']; ?>
" style="display:inline"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['equipeCourante']['nom'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</b></label>
												<?php $this->assign('tmpNbDansColCourante', $this->_tpl_vars['tmpNbDansColCourante']+1); ?>
											<?php endforeach; endif; unset($_from); ?>
										<?php endif; ?>
									</td>
								</tr>
							</table>
						</li>
						<li><input type="submit" value="<?php echo $this->_config[0]['vars']['submit']; ?>
" class="btn btn-sm margin-left-10" /></li>
					</ul>
				</form>	
				</div>
				<div class="btn-group">
					<form method="POST">
					<div class="input-group padding-left-50">
						<input type="text" class="form-control input-sm" name="rechercheUser" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['rechercheUser'])) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")); ?>
" />
						<span class="input-group-btn">
							<input type="submit" value="<?php echo $this->_config[0]['vars']['projet_liste_chercher']; ?>
" class="btn btn-sm <?php if ($this->_tpl_vars['rechercheUser'] != ""): ?>btn-danger<?php else: ?>btn-default<?php endif; ?>" />
						</span>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php if (count($this->_tpl_vars['users']) > 0): ?>

		<div class="row">
			<div class="col-md-12">
				<div class="soplanning-box margin-top-10">
					<table class="table table-striped table-hover">
						<tr>
							<th class="w100">&nbsp;</th>
							<th>
								<?php if ($this->_tpl_vars['order'] == 'nom'): ?>
									<?php if ($this->_tpl_vars['by'] == 'asc'): ?>
										<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=nom&by=desc"><?php echo $this->_config[0]['vars']['user_liste_nom']; ?>
 (<?php echo count($this->_tpl_vars['users']); ?>
)</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/asc_order.png" alt="" />
									<?php else: ?>
										<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=nom&by=asc"><?php echo $this->_config[0]['vars']['user_liste_nom']; ?>
 (<?php echo count($this->_tpl_vars['users']); ?>
)</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/desc_order.png" alt="" />
									<?php endif; ?>
								<?php else: ?>
									<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=nom&by=<?php echo $this->_tpl_vars['by']; ?>
"><?php echo $this->_config[0]['vars']['user_liste_nom']; ?>
 (<?php echo count($this->_tpl_vars['users']); ?>
)</a>
								<?php endif; ?>
							</th>
							<th>
								<?php echo $this->_config[0]['vars']['user_liste_groupe']; ?>

							</th>
							<th>
								<?php echo $this->_config[0]['vars']['user_droits_court']; ?>

							</th>
							<th>
								<?php if ($this->_tpl_vars['order'] == 'email'): ?>
									<?php if ($this->_tpl_vars['by'] == 'asc'): ?>
										<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=email&by=desc"><?php echo $this->_config[0]['vars']['user_liste_email']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/asc_order.png" alt="" />
									<?php else: ?>
										<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=email&by=asc"><?php echo $this->_config[0]['vars']['user_liste_email']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/desc_order.png" alt="" />
									<?php endif; ?>
								<?php else: ?>
									<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=email&by=<?php echo $this->_tpl_vars['by']; ?>
"><?php echo $this->_config[0]['vars']['user_liste_email']; ?>
</a>
								<?php endif; ?>
							</th>
							<th>
								<?php if ($this->_tpl_vars['order'] == 'user_id'): ?>
									<?php if ($this->_tpl_vars['by'] == 'asc'): ?>
										<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=user_id&by=desc"><?php echo $this->_config[0]['vars']['user_liste_identifiant']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/asc_order.png" alt="" />
									<?php else: ?>
										<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=user_id&by=asc"><?php echo $this->_config[0]['vars']['user_liste_identifiant']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/desc_order.png" alt="" />
									<?php endif; ?>
								<?php else: ?>
									<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=user_id&by=<?php echo $this->_tpl_vars['by']; ?>
"><?php echo $this->_config[0]['vars']['user_liste_identifiant']; ?>
</a>
								<?php endif; ?>
							</th>
							<th>
								<?php if ($this->_tpl_vars['order'] == 'login'): ?>
									<?php if ($this->_tpl_vars['by'] == 'asc'): ?>
										<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=login&by=desc"><?php echo $this->_config[0]['vars']['user_liste_login']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/asc_order.png" alt="" />
									<?php else: ?>
										<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=login&by=asc"><?php echo $this->_config[0]['vars']['user_liste_login']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/desc_order.png" alt="" />
									<?php endif; ?>
								<?php else: ?>
									<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=login&by=<?php echo $this->_tpl_vars['by']; ?>
"><?php echo $this->_config[0]['vars']['user_liste_login']; ?>
</a>
								<?php endif; ?>
							</th>
							<th>
								<?php if ($this->_tpl_vars['order'] == 'visible_planning'): ?>
									<?php if ($this->_tpl_vars['by'] == 'asc'): ?>
										<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=visible_planning&by=desc"><?php echo $this->_config[0]['vars']['user_visiblePlanning']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/asc_order.png" alt="" />
									<?php else: ?>
										<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=visible_planning&by=asc"><?php echo $this->_config[0]['vars']['user_visiblePlanning']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/desc_order.png" alt="" />
									<?php endif; ?>
								<?php else: ?>
									<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=1&order=visible_planning&by=<?php echo $this->_tpl_vars['by']; ?>
"><?php echo $this->_config[0]['vars']['user_visiblePlanning']; ?>
</a>
								<?php endif; ?>
							</th>
							<th><?php echo $this->_config[0]['vars']['user_informations']; ?>
</th>
						</tr>
						<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['userTmp']):
        $this->_foreach['users']['iteration']++;
?>
							<tr>
								<td>
									<a href="javascript:xajax_modifUser('<?php echo ((is_array($_tmp=$this->_tpl_vars['userTmp']['user_id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
');undefined;"><img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/edit.gif" class="picto" alt="" /></a>
									&nbsp;
									<a href="javascript:xajax_supprimerUser('<?php echo ((is_array($_tmp=$this->_tpl_vars['userTmp']['user_id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
');undefined;" onClick="javascript:return confirm('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['user_liste_confirmSuppr'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
')"><img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/delete.gif" class="picto" alt="" /></a>
									&nbsp;
									<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/process/planning.php?filtreSurUser=<?php echo $this->_tpl_vars['userTmp']['user_id']; ?>
" title="<?php echo ((is_array($_tmp=$this->_config[0]['vars']['planning_filtre_sur_user'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/logo.png" class="picto" alt="" /></a>
								</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['userTmp']['nom'])) ? $this->_run_mod_handler('xss_protect', true, $_tmp) : xss_protect($_tmp)); ?>
&nbsp;</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['userTmp']['nom_groupe'])) ? $this->_run_mod_handler('xss_protect', true, $_tmp) : xss_protect($_tmp)); ?>
&nbsp;</td>
								<td class="miniFontSize">
									<?php if (in_array ( 'users_manage_all' , $this->_tpl_vars['userTmp']['tabDroits'] )): ?><?php echo $this->_config[0]['vars']['droits_utilisateurs']; ?>
&nbsp;<?php endif; ?>
									<?php if (in_array ( 'projects_manage_all' , $this->_tpl_vars['userTmp']['tabDroits'] ) || in_array ( 'projects_manage_own' , $this->_tpl_vars['userTmp']['tabDroits'] )): ?><?php echo $this->_config[0]['vars']['droits_projets']; ?>
&nbsp;<?php endif; ?>
									<?php if (in_array ( 'projectgroups_manage_all' , $this->_tpl_vars['userTmp']['tabDroits'] )): ?><?php echo $this->_config[0]['vars']['droits_groupesProjets']; ?>
&nbsp;<?php endif; ?>
									<?php if (in_array ( 'planning_modify_all' , $this->_tpl_vars['userTmp']['tabDroits'] ) || in_array ( 'planning_modify_own_project' , $this->_tpl_vars['userTmp']['tabDroits'] ) || in_array ( 'planning_modify_own_task' , $this->_tpl_vars['userTmp']['tabDroits'] )): ?><?php echo $this->_config[0]['vars']['droits_modifPlanning']; ?>
&nbsp;<?php endif; ?>
								<?php if (in_array ( 'lieux_all' , $this->_tpl_vars['userTmp']['tabDroits'] )): ?><?php echo $this->_config[0]['vars']['droits_lieux']; ?>
&nbsp;<?php endif; ?>
								<?php if (in_array ( 'ressources_all' , $this->_tpl_vars['userTmp']['tabDroits'] )): ?><?php echo $this->_config[0]['vars']['droits_ressources']; ?>
&nbsp;<?php endif; ?>
									<?php if (in_array ( 'parameters_modify' , $this->_tpl_vars['userTmp']['tabDroits'] )): ?><?php echo $this->_config[0]['vars']['droits_parametres']; ?>
&nbsp;<?php endif; ?>
									&nbsp;
								</td>
								<td>
									<?php if ($this->_tpl_vars['userTmp']['email'] != ""): ?>
										<a href="mailto:<?php echo ((is_array($_tmp=$this->_tpl_vars['userTmp']['email'])) ? $this->_run_mod_handler('xss_protect', true, $_tmp) : xss_protect($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['userTmp']['email'])) ? $this->_run_mod_handler('xss_protect', true, $_tmp) : xss_protect($_tmp)); ?>
</a>
									<?php endif; ?>
									&nbsp;
								</td>
								<td>
									&nbsp;
									<?php $this->assign('couleurTexte', ((is_array($_tmp=((is_array($_tmp='#')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['userTmp']['couleur']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['userTmp']['couleur'])))) ? $this->_run_mod_handler('buttonFontColor', true, $_tmp) : buttonFontColor($_tmp))); ?>
									<span style="padding:3px;color:<?php echo $this->_tpl_vars['couleurTexte']; ?>
;background-color:#<?php echo $this->_tpl_vars['userTmp']['couleur']; ?>
"><?php echo $this->_tpl_vars['userTmp']['user_id']; ?>
</span>
								</td>
								<td><?php echo $this->_tpl_vars['userTmp']['login']; ?>
&nbsp;</td>
								<td>
									<?php $this->assign('valTmp', $this->_tpl_vars['userTmp']['visible_planning']); ?>
									<?php echo $this->_config[0]['vars'][$this->_tpl_vars['valTmp']]; ?>

									&nbsp;
								</td>
								<td>
									<?php $this->assign('cooltip', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_config[0]['vars']['user_liste_NBPeriodes'])) ? $this->_run_mod_handler('cat', true, $_tmp, " : ") : smarty_modifier_cat($_tmp, " : ")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['userTmp']['totalPeriodes']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['userTmp']['totalPeriodes'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "<br>") : smarty_modifier_cat($_tmp, "<br>")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_config[0]['vars']['user_date_dernier_login']) : smarty_modifier_cat($_tmp, $this->_config[0]['vars']['user_date_dernier_login'])))) ? $this->_run_mod_handler('cat', true, $_tmp, " : ") : smarty_modifier_cat($_tmp, " : "))); ?>
									<?php $this->assign('dateLogin', ((is_array($_tmp=$this->_tpl_vars['userTmp']['date_dernier_login'])) ? $this->_run_mod_handler('sqldatetime2userdatetime', true, $_tmp) : sqldatetime2userdatetime($_tmp))); ?>
									<?php $this->assign('cooltip', ((is_array($_tmp=$this->_tpl_vars['cooltip'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['dateLogin']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['dateLogin']))); ?>
									<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_tpl_vars['cooltip'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)"  onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help"></span>
								</td>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
						<?php if ($this->_tpl_vars['nbPages'] > 1): ?>
							<tr>
								<td colspan="7" class="text-right">
									<?php if ($this->_tpl_vars['currentPage'] > 1): ?><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=<?php echo $this->_tpl_vars['currentPage']-1; ?>
">&lt;&lt; <?php echo $this->_config[0]['vars']['action_precedent']; ?>
</a>&nbsp;&nbsp;<?php endif; ?>
									<?php unset($this->_sections['pagination']);
$this->_sections['pagination']['name'] = 'pagination';
$this->_sections['pagination']['loop'] = is_array($_loop=$this->_tpl_vars['nbPages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pagination']['show'] = true;
$this->_sections['pagination']['max'] = $this->_sections['pagination']['loop'];
$this->_sections['pagination']['step'] = 1;
$this->_sections['pagination']['start'] = $this->_sections['pagination']['step'] > 0 ? 0 : $this->_sections['pagination']['loop']-1;
if ($this->_sections['pagination']['show']) {
    $this->_sections['pagination']['total'] = $this->_sections['pagination']['loop'];
    if ($this->_sections['pagination']['total'] == 0)
        $this->_sections['pagination']['show'] = false;
} else
    $this->_sections['pagination']['total'] = 0;
if ($this->_sections['pagination']['show']):

            for ($this->_sections['pagination']['index'] = $this->_sections['pagination']['start'], $this->_sections['pagination']['iteration'] = 1;
                 $this->_sections['pagination']['iteration'] <= $this->_sections['pagination']['total'];
                 $this->_sections['pagination']['index'] += $this->_sections['pagination']['step'], $this->_sections['pagination']['iteration']++):
$this->_sections['pagination']['rownum'] = $this->_sections['pagination']['iteration'];
$this->_sections['pagination']['index_prev'] = $this->_sections['pagination']['index'] - $this->_sections['pagination']['step'];
$this->_sections['pagination']['index_next'] = $this->_sections['pagination']['index'] + $this->_sections['pagination']['step'];
$this->_sections['pagination']['first']      = ($this->_sections['pagination']['iteration'] == 1);
$this->_sections['pagination']['last']       = ($this->_sections['pagination']['iteration'] == $this->_sections['pagination']['total']);
?>
										<?php if ($this->_sections['pagination']['iteration'] == $this->_tpl_vars['currentPage']): ?><b><?php else: ?><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=<?php echo $this->_sections['pagination']['iteration']; ?>
"><?php endif; ?>
										<?php echo $this->_sections['pagination']['iteration']; ?>

										<?php if ($this->_sections['pagination']['iteration'] == $this->_tpl_vars['currentPage']): ?></b><?php else: ?></a><?php endif; ?>&nbsp;
									<?php endfor; endif; ?>
									<?php if ($this->_tpl_vars['currentPage'] < $this->_tpl_vars['nbPages']): ?><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/user_list.php?page=<?php echo $this->_tpl_vars['currentPage']+1; ?>
"><?php echo $this->_config[0]['vars']['action_suivant']; ?>
 &gt;&gt;</a><?php endif; ?>
								</td>
							</tr>
						<?php endif; ?>
					</table>
				</div>
			</div>
		</div>

	<?php else: ?>
	
		<div class="row">
			<div class="col-md-12">
				<div class="soplanning-box margin-top-10">
					<?php echo $this->_config[0]['vars']['info_noRecord']; ?>

				</div>
			</div>
		</div>

	<?php endif; ?>
</div>


<script type="text/javascript">
	<?php echo '

	var yscroll = getCookie(\'yposProjets\');
	window.onscroll = function() {document.cookie=\'yposProjets=\' + window.pageYOffset;};
	addEvent(window, \'load\', chargerYScrollPos);

	'; ?>

</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "www_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>