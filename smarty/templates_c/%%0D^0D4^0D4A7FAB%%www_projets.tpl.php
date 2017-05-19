<?php /* Smarty version 2.6.29, created on 2017-05-03 09:24:03
         compiled from www_projets.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'www_projets.tpl', 75, false),array('modifier', 'default', 'www_projets.tpl', 79, false),array('modifier', 'count', 'www_projets.tpl', 97, false),array('modifier', 'xss_protect', 'www_projets.tpl', 149, false),array('modifier', 'cat', 'www_projets.tpl', 161, false),array('modifier', 'buttonFontColor', 'www_projets.tpl', 161, false),array('modifier', 'strpos', 'www_projets.tpl', 173, false),array('modifier', 'sqldate2userdate', 'www_projets.tpl', 186, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "www_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box">
				<div class="btn-group">
					<?php if (in_array ( 'projectgroups_manage_all' , $this->_tpl_vars['user']['tabDroits'] )): ?>
						<a href="groupe_list.php" class="btn btn-sm btn-default"><img src="assets/img/pictos/groupes.png" class="picto" alt=""/> <?php echo $this->_config[0]['vars']['menuListeGroupes']; ?>
</a>
					<?php endif; ?>
					<a href="javascript:xajax_ajoutProjet('projets');undefined;" class="btn btn-sm btn-default"><img src="assets/img/pictos/addprojet.png" class="picto" alt="" /> <?php echo $this->_config[0]['vars']['menuAjouterProjet']; ?>
</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box margin-top-10">
				<form action="projets.php" method="GET" class="form-inline">
					<label><?php echo $this->_config[0]['vars']['projet_liste_afficherProjets']; ?>
 :</label>
					<div class="btn-group" data-toggle="buttons-radio">
						<button type="button" class="btn btn-sm btn-default<?php if ($this->_tpl_vars['filtrageProjet'] == 'tous'): ?> active<?php endif; ?>" onclick="top.location='?filtrageProjet=tous';"><?php echo $this->_config[0]['vars']['projet_liste_afficherProjetsTous']; ?>
</button>
						<button type="button" class="btn btn-sm btn-default<?php if ($this->_tpl_vars['filtrageProjet'] != 'tous'): ?> active<?php endif; ?>" onclick="top.location='?filtrageProjet=date';"><?php echo $this->_config[0]['vars']['projet_liste_afficherProjetsParDate']; ?>
</button>
					</div>
					<?php if ($this->_tpl_vars['filtrageProjet'] != 'tous'): ?>
						<label>
							<?php echo $this->_config[0]['vars']['formNbMois']; ?>
:
						</label>
						<div class="input-group">
							<input name="nb_mois" class="form-control input-sm datepicker" type="text" size="2" value="<?php echo $this->_tpl_vars['nbMois']; ?>
" />
							<span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="submit"><i class="glyphicon glyphicon-share-alt"></i></button>
							</span>
						</div>
						<label>
							<?php echo $this->_config[0]['vars']['formDebut']; ?>
:
						</label>
						<div class="input-group">
							<input name="date_debut_affiche" id="date_debut_affiche" type="text" value="<?php echo $this->_tpl_vars['dateDebut']; ?>
" class="form-control input-sm datepicker" />
							<span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="submit"><i class="glyphicon glyphicon-share-alt"></i></button>
							</span>
						</div>
						<script><?php echo 'addEvent(window, \'load\', function(){jQuery("#date_debut_affiche").datepicker()});'; ?>
</script>
						<label>
							<?php echo $this->_config[0]['vars']['formInfoDateFin']; ?>
 : <?php echo $this->_tpl_vars['dateFin']; ?>

						</label>
					<?php endif; ?>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box">
				<form method="GET" class="form-inline">
					<label class="label-form"><?php echo $this->_config[0]['vars']['projet_liste_afficherProjets']; ?>
 :</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="statut[]" id="a_faire" value="a_faire" <?php if (in_array ( 'a_faire' , $this->_tpl_vars['listeStatuts'] )): ?>checked="checked"<?php endif; ?>><?php echo $this->_config[0]['vars']['projet_liste_statutAfaire']; ?>

					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="statut[]" id="en_cours" value="en_cours" <?php if (in_array ( 'en_cours' , $this->_tpl_vars['listeStatuts'] )): ?>checked="checked"<?php endif; ?>><?php echo $this->_config[0]['vars']['projet_liste_statutEnCours']; ?>

					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="statut[]" id="fait" value="fait" <?php if (in_array ( 'fait' , $this->_tpl_vars['listeStatuts'] )): ?>checked="checked"<?php endif; ?>><?php echo $this->_config[0]['vars']['projet_liste_statutFait']; ?>

					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="statut[]" id="abandon" value="abandon" <?php if (in_array ( 'abandon' , $this->_tpl_vars['listeStatuts'] )): ?>checked="checked"<?php endif; ?>><?php echo $this->_config[0]['vars']['projet_liste_statutAbandon']; ?>

					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="statut[]" id="archive" value="archive" <?php if (in_array ( 'archive' , $this->_tpl_vars['listeStatuts'] )): ?>checked="checked"<?php endif; ?>><?php echo $this->_config[0]['vars']['projet_liste_statutArchive']; ?>

					</label>

					<input type="submit" value="<?php echo ((is_array($_tmp=$this->_config[0]['vars']['formAfficher'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class="btn btn-sm btn-default"/>

					<div class="btn-group padding-left-100">
						<div class="input-group">
							<input type="text" class="form-control input-sm" name="rechercheProjet" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['rechercheProjet'])) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")); ?>
" />
							<span class="input-group-btn">
								<input type="submit" value="<?php echo $this->_config[0]['vars']['projet_liste_chercher']; ?>
" class="btn btn-sm <?php if ($this->_tpl_vars['rechercheProjet'] != ""): ?>btn-danger<?php else: ?>btn-default<?php endif; ?>" />
							</span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box margin-top-10">
				<table class="table table-striped table-hover">
					<tr>
						<td colspan="2">
							<?php if ($this->_tpl_vars['order'] == 'nom'): ?>
								<?php if ($this->_tpl_vars['by'] == 'asc'): ?>
									<a href="?order=nom&by=desc"><?php echo $this->_config[0]['vars']['projet_liste_projet']; ?>
 (<?php echo count($this->_tpl_vars['projets']); ?>
)</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/asc_order.png" alt="" />
								<?php else: ?>
									<a href="?order=nom&by=asc"><?php echo $this->_config[0]['vars']['projet_liste_projet']; ?>
 (<?php echo count($this->_tpl_vars['projets']); ?>
)</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/desc_order.png" alt="" />
								<?php endif; ?>
							<?php else: ?>
								<a href="?order=nom&by=<?php echo $this->_tpl_vars['by']; ?>
"><?php echo $this->_config[0]['vars']['projet_liste_projet']; ?>
 (<?php echo count($this->_tpl_vars['projets']); ?>
)</a>
							<?php endif; ?>
						</td>
						<td>
							<?php if ($this->_tpl_vars['order'] == 'nom_createur'): ?>
								<?php if ($this->_tpl_vars['by'] == 'asc'): ?>
									<a href="?order=nom_createur&by=desc"><?php echo $this->_config[0]['vars']['projet_liste_createur']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/asc_order.png" alt="" />
								<?php else: ?>
									<a href="?order=nom_createur&by=asc"><?php echo $this->_config[0]['vars']['projet_liste_createur']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/desc_order.png" alt="" />
								<?php endif; ?>
							<?php else: ?>
								<a href="?order=nom_createur&by=<?php echo $this->_tpl_vars['by']; ?>
"><?php echo $this->_config[0]['vars']['projet_liste_createur']; ?>
</a>
							<?php endif; ?>
						</td>
						<td>
							<?php if ($this->_tpl_vars['order'] == 'charge'): ?>
								<?php if ($this->_tpl_vars['by'] == 'asc'): ?>
									<a href="?order=charge&by=desc"><?php echo $this->_config[0]['vars']['projet_liste_charge']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/asc_order.png" alt="" />
								<?php else: ?>
									<a href="?order=charge&by=asc"><?php echo $this->_config[0]['vars']['projet_liste_charge']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/desc_order.png" alt="" />
								<?php endif; ?>
							<?php else: ?>
								<a href="?order=charge&by=<?php echo $this->_tpl_vars['by']; ?>
"><?php echo $this->_config[0]['vars']['projet_liste_charge']; ?>
</a>
							<?php endif; ?>
						</td>
						<td>
							<?php if ($this->_tpl_vars['order'] == 'livraison'): ?>
								<?php if ($this->_tpl_vars['by'] == 'asc'): ?>
									<a href="?order=livraison&by=desc"><?php echo $this->_config[0]['vars']['projet_liste_livraison']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/asc_order.png" alt="" />
								<?php else: ?>
									<a href="?order=livraison&by=asc"><?php echo $this->_config[0]['vars']['projet_liste_livraison']; ?>
</a>&nbsp;<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/desc_order.png" alt="" />
								<?php endif; ?>
							<?php else: ?>
								<a href="?order=livraison&by=<?php echo $this->_tpl_vars['by']; ?>
"><?php echo $this->_config[0]['vars']['projet_liste_livraison']; ?>
</a>
							<?php endif; ?>
						</td>
						<td>
							<?php echo $this->_config[0]['vars']['projet_liste_commentaires']; ?>

						</td>
					</tr>
					<tr>
						<td colspan="6" class="project-group-head"><?php echo $this->_config[0]['vars']['projet_liste_sansGroupes']; ?>
</td>
					</tr>
					<?php $this->assign('groupeCourant', ""); ?>
					<?php $_from = $this->_tpl_vars['projets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['projet']):
?>
						<?php if ($this->_tpl_vars['projet']['groupe_id'] != $this->_tpl_vars['groupeCourant']): ?>
							<tr>
							<td colspan="6" class="project-group-head"><?php echo ((is_array($_tmp=$this->_tpl_vars['projet']['nom_groupe'])) ? $this->_run_mod_handler('xss_protect', true, $_tmp) : xss_protect($_tmp)); ?>
</td>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['projet']['statut'] == 'a_faire'): ?>
							<?php $this->assign('couleurLigne', "#ffffff"); ?>
						<?php elseif ($this->_tpl_vars['projet']['statut'] == 'en_cours'): ?>
							<?php $this->assign('couleurLigne', "#B0FB04"); ?>
						<?php elseif ($this->_tpl_vars['projet']['statut'] == 'fait'): ?>
							<?php $this->assign('couleurLigne', "#FFBE7D"); ?>
						<?php elseif ($this->_tpl_vars['projet']['statut'] == 'abandon'): ?>
							<?php $this->assign('couleurLigne', "#9D9D9D"); ?>
						<?php endif; ?>
						<tr>
							<td class="smallFontSize" style="background-color:#<?php echo $this->_tpl_vars['projet']['couleur']; ?>
;color:<?php echo ((is_array($_tmp=((is_array($_tmp="#")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['projet']['couleur']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['projet']['couleur'])))) ? $this->_run_mod_handler('buttonFontColor', true, $_tmp) : buttonFontColor($_tmp)); ?>
"><?php echo $this->_tpl_vars['projet']['projet_id']; ?>
</td>
							<td>
								<?php if (in_array ( 'projects_manage_all' , $this->_tpl_vars['user']['tabDroits'] ) || ( in_array ( 'projects_manage_own' , $this->_tpl_vars['user']['tabDroits'] ) && $this->_tpl_vars['projet']['createur_id'] == $this->_tpl_vars['user']['user_id'] )): ?>
									<a href="javascript:xajax_modifProjet('<?php echo $this->_tpl_vars['projet']['projet_id']; ?>
', 'projets');undefined;"><img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/edit.gif" class="picto" alt="" /></a>
									&nbsp;
									<a href="javascript:xajax_supprimerProjet('<?php echo $this->_tpl_vars['projet']['projet_id']; ?>
');undefined;" 
									onclick="javascript: return confirm('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['projet_liste_confirmSuppr'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
')"><img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/delete.gif" class="picto" alt="" /></a>
								<?php endif; ?>
								&nbsp;
								<a href="<?php echo $this->_tpl_vars['BASE']; ?>
/process/planning.php?filtreSurProjet=<?php echo $this->_tpl_vars['projet']['projet_id']; ?>
" title="<?php echo ((is_array($_tmp=$this->_config[0]['vars']['planning_filtre_sur_projet'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/logo.png" class="picto" alt="" /></a>
								&nbsp;
								<?php if ($this->_tpl_vars['projet']['lien'] <> ''): ?>
								<a href="<?php if (((is_array($_tmp=$this->_tpl_vars['projet']['lien'])) ? $this->_run_mod_handler('strpos', true, $_tmp, 'http') : strpos($_tmp, 'http')) !== 0 && ((is_array($_tmp=$this->_tpl_vars['projet']['lien'])) ? $this->_run_mod_handler('strpos', true, $_tmp, "\\") : strpos($_tmp, "\\")) !== 0): ?>http://<?php endif; ?><?php echo $this->_tpl_vars['projet']['lien']; ?>
" title="<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winProjet_gotoLien'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/web.png" class="picto" alt="" /></a>
								&nbsp;
								<?php else: ?>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['projet']['nom'])) ? $this->_run_mod_handler('xss_protect', true, $_tmp) : xss_protect($_tmp)); ?>

							</td>
							<td>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['projet']['nom_createur'])) ? $this->_run_mod_handler('xss_protect', true, $_tmp) : xss_protect($_tmp)); ?>

							</td>
							<td><?php echo $this->_tpl_vars['projet']['charge']; ?>
</td>
							<td>
								<?php if ($this->_tpl_vars['projet']['livraison'] != '' && $this->_tpl_vars['projet']['livraison'] != '0000-00-00'): ?>
									<a href="planning.php?livraison=<?php echo $this->_tpl_vars['projet']['livraison']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['projet']['livraison'])) ? $this->_run_mod_handler('sqldate2userdate', true, $_tmp) : sqldate2userdate($_tmp)); ?>
</a>
								<?php endif; ?>
							</td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['projet']['iteration'])) ? $this->_run_mod_handler('xss_protect', true, $_tmp) : xss_protect($_tmp)); ?>
</td>
						</tr>
						<?php $this->assign('groupeCourant', $this->_tpl_vars['projet']['groupe_id']); ?>
					<?php endforeach; endif; unset($_from); ?>
				</table>
			</div>
		</div>
	</div>
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