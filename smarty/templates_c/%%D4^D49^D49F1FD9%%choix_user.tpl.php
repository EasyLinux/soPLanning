<?php /* Smarty version 2.6.29, created on 2017-04-28 12:43:24
         compiled from planning/choix_user.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'planning/choix_user.tpl', 5, false),array('modifier', 'escape', 'planning/choix_user.tpl', 38, false),array('modifier', 'cat', 'planning/choix_user.tpl', 224, false),array('modifier', 'replace', 'planning/choix_user.tpl', 224, false),array('modifier', 'urlencode', 'planning/choix_user.tpl', 225, false),array('function', 'math', 'planning/choix_user.tpl', 23, false),)), $this); ?>
			<div class="soplanning-box form-inline" id="divPlanningMainFilter">
										<div class="btn-group">
						<form action="process/planning.php" method="POST">
						<button class="btn <?php if (count($this->_tpl_vars['filtreUser']) > 0): ?>btn-danger<?php else: ?>btn-default<?php endif; ?> dropdown-toggle btn-sm" data-toggle="dropdown"><?php echo $this->_config[0]['vars']['formChoixUser']; ?>
&nbsp;<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<?php if (count($this->_tpl_vars['filtreUser']) > 0): ?>
			                    <a href="process/planning.php?desactiverFiltreUser=1" class="btn btn-danger btn-sm margin-left-10"><?php echo $this->_config[0]['vars']['formFiltreUserDesactiver']; ?>
</a>
							<?php endif; ?>
							<li><a onClick="event.cancelBubble=true;" href="javascript:filtreUserCocheTous(true);undefined;"><?php echo $this->_config[0]['vars']['formFiltreUserCocherTous']; ?>
</a></li>
							<li><a onClick="event.cancelBubble=true;" href="javascript:filtreUserCocheTous(false);undefined;"><?php echo $this->_config[0]['vars']['formFiltreUserDecocherTous']; ?>
</a></li>
							<li class="divider"></li>
							<li>
								<input type="hidden" name="filtreUser" value="1">
								<table onClick="event.cancelBubble=true;" class="margin-10">
									<tr>
										<td class="planningDropdownFilter">
											<div class="form-horizontal col-md-12">
											<label class="checkbox">
												<input type="checkbox" id="gu0" value="1" onClick="filtreCocheUserGroupe('0')" /><b>&nbsp;<?php echo $this->_config[0]['vars']['cocheUserSansGroupe']; ?>
</b>
											</label>
											<?php $this->assign('groupeTemp', ""); ?>
											<?php echo smarty_function_math(array('assign' => 'nbColonnes','equation' => "ceil(nbUsers / nbUsersParColonnes)",'nbUsers' => count($this->_tpl_vars['listeUsers']),'nbUsersParColonnes' => @FILTER_NB_USERS_PER_COLUMN), $this);?>

											<?php echo smarty_function_math(array('assign' => 'maxCol','equation' => "ceil(nbUsers / nbColonnes)",'nbUsers' => count($this->_tpl_vars['listeUsers']),'nbColonnes' => $this->_tpl_vars['nbColonnes']), $this);?>

											<?php $this->assign('tmpNbDansColCourante', '0'); ?>
											<?php $_from = $this->_tpl_vars['listeUsers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loopUsers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loopUsers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['userCourant']):
        $this->_foreach['loopUsers']['iteration']++;
?>
												<?php if ($this->_tpl_vars['tmpNbDansColCourante'] >= $this->_tpl_vars['maxCol']): ?>
													<?php $this->assign('tmpNbDansColCourante', '0'); ?>
													</td>
													<td class="planningDropdownFilter">
												<?php else: ?>
													<?php if ($this->_tpl_vars['userCourant']['user_groupe_id'] != $this->_tpl_vars['groupeTemp']): ?>
														<br />
													<?php endif; ?>
												<?php endif; ?>
												<?php if ($this->_tpl_vars['userCourant']['user_groupe_id'] != $this->_tpl_vars['groupeTemp']): ?>
													<label class="checkbox">
														<input type="checkbox" id="gu<?php echo $this->_tpl_vars['userCourant']['user_groupe_id']; ?>
" value="1" onClick="filtreCocheUserGroupe('<?php echo $this->_tpl_vars['userCourant']['user_groupe_id']; ?>
')" /><b>&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['userCourant']['groupe_nom'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</b>
													</label>
												<?php endif; ?>
												<label class="checkbox">
													<input type="checkbox" id="user_<?php echo $this->_tpl_vars['userCourant']['user_id']; ?>
" value="<?php echo $this->_tpl_vars['userCourant']['user_id']; ?>
" name="user_<?php echo $this->_tpl_vars['userCourant']['user_id']; ?>
" onClick="checkStatutUserGroupe(this, '<?php echo $this->_tpl_vars['userCourant']['user_groupe_id']; ?>
')" <?php if (in_array ( $this->_tpl_vars['userCourant']['user_id'] , $this->_tpl_vars['filtreUser'] )): ?>checked="checked"<?php endif; ?> />&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['userCourant']['nom'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 (<?php echo $this->_tpl_vars['userCourant']['user_id']; ?>
)
												</label>
												<?php $this->assign('groupeTemp', $this->_tpl_vars['userCourant']['user_groupe_id']); ?>
												<?php $this->assign('tmpNbDansColCourante', $this->_tpl_vars['tmpNbDansColCourante']+1); ?>
											<?php endforeach; endif; unset($_from); ?>
											</div>
										</td>
									</tr>
								</table>
							</li>
							<li><input type="submit" value="<?php echo $this->_config[0]['vars']['submit']; ?>
" class="btn btn-default margin-left-10" /></li>
						</ul>
						</form>
					</div>
										<div class="btn-group">
						<form action="process/planning.php" method="POST">
						<button class="btn <?php if (count($this->_tpl_vars['filtreGroupeProjet']) > 0): ?>btn-danger<?php else: ?>btn-default<?php endif; ?> dropdown-toggle btn-sm" data-toggle="dropdown"><?php echo $this->_config[0]['vars']['formChoixProjet']; ?>
&nbsp;<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<?php if (count($this->_tpl_vars['listeProjets']) == 0): ?>
								<li class="margin-left-10">&nbsp;<?php echo $this->_config[0]['vars']['formFiltreProjetAucunProjet']; ?>
</li>
							<?php else: ?>
								<?php if (count($this->_tpl_vars['filtreGroupeProjet']) > 0): ?>
									<a href="process/planning.php?desactiverFiltreGroupeProjet=1" class="btn btn-danger btn-sm margin-left-10"><?php echo $this->_config[0]['vars']['formFiltreProjetDesactiver']; ?>
</a>
								<?php endif; ?>
								<li><a onClick="event.cancelBubble=true;" href="javascript:filtreGroupeProjetCocheTous(true);undefined;"><?php echo $this->_config[0]['vars']['formFiltreProjetCocherTous']; ?>
</a></li>
								<li><a onClick="event.cancelBubble=true;" href="javascript:filtreGroupeProjetCocheTous(false);undefined;"><?php echo $this->_config[0]['vars']['formFiltreProjetDecocherTous']; ?>
</a></li>
								<li class="divider"></li>
								<li>
									<input type="hidden" name="filtreGroupeProjet" value="1">
									<table onClick="event.cancelBubble=true;" class="planning-filter">
										<tr>
											<td class="planningDropdownFilter">
											<div class="form-horizontal col-md-12">
												<label class="checkbox">
												<input type="checkbox" id="g0" value="1" onClick="filtreCocheGroupe('0')" /><b>&nbsp;<?php echo $this->_config[0]['vars']['projet_liste_sansGroupes']; ?>
</b>
												</label>
												<?php $this->assign('groupeTemp', ""); ?>
												<?php echo smarty_function_math(array('assign' => 'nbColonnes','equation' => "ceil(nbProjets / nbProjetsParColonnes)",'nbProjets' => count($this->_tpl_vars['listeProjets']),'nbProjetsParColonnes' => @FILTER_NB_PROJECTS_PER_COLUMN), $this);?>

												<?php echo smarty_function_math(array('assign' => 'maxCol','equation' => "ceil(nbProjets / nbColonnes)",'nbProjets' => count($this->_tpl_vars['listeProjets']),'nbColonnes' => $this->_tpl_vars['nbColonnes']), $this);?>

												<?php $this->assign('tmpNbDansColCourante', '0'); ?>
												<?php $_from = $this->_tpl_vars['listeProjets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loopProjets'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loopProjets']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['projetCourant']):
        $this->_foreach['loopProjets']['iteration']++;
?>
													<?php if ($this->_tpl_vars['tmpNbDansColCourante'] >= $this->_tpl_vars['maxCol']): ?>
														<?php $this->assign('tmpNbDansColCourante', '0'); ?>
														</td>
														<td class="planningDropdownFilter">
													<?php else: ?>
														<?php if ($this->_tpl_vars['projetCourant']['groupe_id'] != $this->_tpl_vars['groupeTemp']): ?>
															<br />
														<?php endif; ?>
													<?php endif; ?>
													<?php if ($this->_tpl_vars['projetCourant']['groupe_id'] != $this->_tpl_vars['groupeTemp']): ?>
														<label class="checkbox">
															<input type="checkbox" id="g<?php echo $this->_tpl_vars['projetCourant']['groupe_id']; ?>
" value="1" onClick="filtreCocheGroupe('<?php echo $this->_tpl_vars['projetCourant']['groupe_id']; ?>
')" /> <b><?php echo $this->_tpl_vars['projetCourant']['groupe_nom']; ?>
</b>
														</label>
													<?php endif; ?>
													<label class="checkbox">
														<input type="checkbox" id="projet_<?php echo $this->_tpl_vars['projetCourant']['projet_id']; ?>
" value="<?php echo $this->_tpl_vars['projetCourant']['projet_id']; ?>
" name="projet_<?php echo $this->_tpl_vars['projetCourant']['projet_id']; ?>
" onClick="checkStatutGroupe(this, '<?php echo $this->_tpl_vars['projetCourant']['groupe_id']; ?>
')" <?php if (in_array ( $this->_tpl_vars['projetCourant']['projet_id'] , $this->_tpl_vars['filtreGroupeProjet'] )): ?>checked="checked"<?php endif; ?> />&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['projetCourant']['nom'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 (<?php echo $this->_tpl_vars['projetCourant']['projet_id']; ?>
)
													</label>
													<?php $this->assign('groupeTemp', $this->_tpl_vars['projetCourant']['groupe_id']); ?>
													<?php $this->assign('tmpNbDansColCourante', $this->_tpl_vars['tmpNbDansColCourante']+1); ?>
												<?php endforeach; endif; unset($_from); ?>
											</div>
											</td>
										</tr>
									</table>
								</li>
								<li><input type="submit" value="<?php echo $this->_config[0]['vars']['submit']; ?>
" class="btn btn-default margin-left-10" /></li>
							<?php endif; ?>
						</ul>
					</form>
					</div>
										<div class="btn-group">
						<form action="process/planning.php" method="POST">
						<button class="btn <?php if (( ( count($this->_tpl_vars['filtreStatutTache']) > 0 ) || ( count($this->_tpl_vars['filtreGroupeLieu']) > 0 ) || ( count($this->_tpl_vars['filtreGroupeRessource']) > 0 ) || ( count($this->_tpl_vars['filtreStatutProjet']) > 0 ) )): ?>btn-danger<?php else: ?>btn-default<?php endif; ?> dropdown-toggle btn-sm" data-toggle="dropdown"><?php echo $this->_config[0]['vars']['filtres_avances']; ?>
&nbsp;<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<?php if (( ( count($this->_tpl_vars['filtreStatutTache']) > 0 ) || ( count($this->_tpl_vars['filtreGroupeLieu']) > 0 ) || ( count($this->_tpl_vars['filtreGroupeRessource']) > 0 ) || ( count($this->_tpl_vars['filtreStatutProjet']) > 0 ) )): ?><a href="process/planning.php?desactiverFiltreAvances=1" class="btn btn-danger btn-sm margin-left-10"><?php echo $this->_config[0]['vars']['formFiltreAvancesDesactiver']; ?>
</a><?php endif; ?>
							<li><a onClick="event.cancelBubble=true;" href="javascript:filtreCocheAvancesGroupe(true);undefined;"><?php echo $this->_config[0]['vars']['formFiltreUserCocherTous']; ?>
</a></li>
							<li><a onClick="event.cancelBubble=true;" href="javascript:filtreCocheAvancesGroupe(false);undefined;"><?php echo $this->_config[0]['vars']['formFiltreUserDecocherTous']; ?>
</a></li>
							<li class="divider"></li>
							<li>
									<table onClick="event.cancelBubble=true;" class="planning-filter">
										<tr>
											<td class="planningDropdownFilter">
												<input type="hidden" name="filtreStatutTache" value="1">
												<b><?php echo $this->_config[0]['vars']['formChoixStatutTache']; ?>
</b><br />
												<div class="form-horizontal col-md-12">
												<label class="checkbox">
													<input type="checkbox" id="statut_a_faire" name="statutsTache[]" value="a_faire" <?php if (in_array ( 'a_faire' , $this->_tpl_vars['filtreStatutTache'] )): ?>checked="checked"<?php endif; ?> />&nbsp;<?php echo $this->_config[0]['vars']['winPeriode_statut_a_faire']; ?>
	 
												</label>
												<label class="checkbox">
													<input type="checkbox" id="statut_en_cours" name="statutsTache[]" value="en_cours" <?php if (in_array ( 'en_cours' , $this->_tpl_vars['filtreStatutTache'] )): ?>checked="checked"<?php endif; ?> />&nbsp;<?php echo $this->_config[0]['vars']['winPeriode_statut_en_cours']; ?>
	 
												</label>
												<label class="checkbox">
													<input type="checkbox" id="statut_fait" name="statutsTache[]" value="fait" <?php if (in_array ( 'fait' , $this->_tpl_vars['filtreStatutTache'] )): ?>checked="checked"<?php endif; ?> />&nbsp;<?php echo $this->_config[0]['vars']['winPeriode_statut_fait']; ?>
	 
												</label>
												<label class="checkbox">
													<input type="checkbox" id="statut_abandon" name="statutsTache[]" value="abandon" <?php if (in_array ( 'abandon' , $this->_tpl_vars['filtreStatutTache'] )): ?>checked="checked"<?php endif; ?> />&nbsp;<?php echo $this->_config[0]['vars']['winPeriode_statut_abandon']; ?>
	 
												</label>
												</div>
											</td>
											<td class="planningDropdownFilter">
												<input type="hidden" name="filtreStatutProjet" value="1">
												<b><?php echo $this->_config[0]['vars']['formChoixStatutProjet']; ?>
</b><br />
												<div class="form-horizontal col-md-12">
												<label class="checkbox">
													<input type="checkbox" id="statut_projet_a_faire" name="statutsProjet[]" value="a_faire" <?php if (in_array ( 'a_faire' , $this->_tpl_vars['filtreStatutProjet'] )): ?>checked="checked"<?php endif; ?> />&nbsp;<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winProjet_statutAFaire'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<br />
												</label>
												<label class="checkbox">
													<input type="checkbox" id="statut_projet_en_cours" name="statutsProjet[]" value="en_cours" <?php if (in_array ( 'en_cours' , $this->_tpl_vars['filtreStatutProjet'] )): ?>checked="checked"<?php endif; ?> />&nbsp;<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winProjet_statutEnCours'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<br />
												</label>
												<label class="checkbox">
													<input type="checkbox" id="statut_projet_fait" name="statutsProjet[]" value="fait" <?php if (in_array ( 'fait' , $this->_tpl_vars['filtreStatutProjet'] )): ?>checked="checked"<?php endif; ?> />&nbsp;<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winProjet_statutFait'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<br />
												</label>
												<label class="checkbox">
													<input type="checkbox" id="statut_projet_abandon" name="statutsProjet[]" value="abandon" <?php if (in_array ( 'abandon' , $this->_tpl_vars['filtreStatutProjet'] )): ?>checked="checked"<?php endif; ?> />&nbsp;<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winProjet_statutAbandon'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>

												</label>
												</div>
											</td>
									<?php if (@CONFIG_SOPLANNING_OPTION_LIEUX == 1 && ( count($this->_tpl_vars['listeLieux']) ) > 0): ?>
											<td class="planningDropdownFilter">											<input type="hidden" name="filtreGroupeLieu" value="1">
											<input type="hidden" name="maxGroupeLieu" value="<?php echo count($this->_tpl_vars['listeLieux']); ?>
">
												<b><?php echo $this->_config[0]['vars']['menuLieux']; ?>
</b>												
												<div class="form-horizontal col-md-12">
												<?php $this->assign('groupeTemp', ""); ?>
												<?php echo smarty_function_math(array('assign' => 'nbColonnes','equation' => "ceil(nbLieux / nbLieuxParColonnes)",'nbLieux' => count($this->_tpl_vars['listeLieux']),'nbLieuxParColonnes' => @FILTER_NB_AERA_PER_COLUMN), $this);?>

												<?php echo smarty_function_math(array('assign' => 'maxCol','equation' => "ceil(nbLieux / nbColonnes)",'nbLieux' => count($this->_tpl_vars['listeLieux']),'nbColonnes' => $this->_tpl_vars['nbColonnes']), $this);?>

												<?php $this->assign('tmpNbDansColCourante', '0'); ?>
												<?php $_from = $this->_tpl_vars['listeLieux']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loopLieux'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loopLieux']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lieuCourant']):
        $this->_foreach['loopLieux']['iteration']++;
?>
													<?php if ($this->_tpl_vars['tmpNbDansColCourante'] >= $this->_tpl_vars['maxCol']): ?>
														<?php $this->assign('tmpNbDansColCourante', '0'); ?>
														</td>
											<td class="planningDropdownFilter">
													<?php endif; ?>
													<label class="checkbox">
														<input type="checkbox" id="lieu_<?php echo $this->_tpl_vars['lieuCourant']['lieu_id']; ?>
" name="lieu[]" value="<?php echo $this->_tpl_vars['lieuCourant']['lieu_id']; ?>
" <?php if (in_array ( $this->_tpl_vars['lieuCourant']['lieu_id'] , $this->_tpl_vars['filtreGroupeLieu'] )): ?>checked="checked"<?php endif; ?> /> <?php echo ((is_array($_tmp=$this->_tpl_vars['lieuCourant']['nom'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

													</label>	
													<?php $this->assign('tmpNbDansColCourante', $this->_tpl_vars['tmpNbDansColCourante']+1); ?>
												<?php endforeach; endif; unset($_from); ?>
												</div>
											</td>
									<?php endif; ?>
																		<?php if (@CONFIG_SOPLANNING_OPTION_RESSOURCES == 1 && ( count($this->_tpl_vars['listeRessources']) ) > 0): ?>									
											<td class="planningDropdownFilter">
											<input type="hidden" name="maxGroupeRessource" value="<?php echo count($this->_tpl_vars['listeRessources']); ?>
">
											<input type="hidden" name="filtreGroupeRessource" value="1">
												<b><?php echo $this->_config[0]['vars']['menuRessources']; ?>
</b>												
												<div class="form-horizontal col-md-12">
												<?php $this->assign('groupeTemp', ""); ?>
												<?php echo smarty_function_math(array('assign' => 'nbColonnes','equation' => "ceil(nbRessources / nbRessourcesParColonnes)",'nbRessources' => count($this->_tpl_vars['listeRessources']),'nbRessourcesParColonnes' => @FILTER_NB_RESSOURCES_PER_COLUMN), $this);?>

												<?php echo smarty_function_math(array('assign' => 'maxCol','equation' => "ceil(nbRessources / nbColonnes)",'nbRessources' => count($this->_tpl_vars['listeRessources']),'nbColonnes' => $this->_tpl_vars['nbColonnes']), $this);?>

												<?php $this->assign('tmpNbDansColCourante', '0'); ?>
												<?php $_from = $this->_tpl_vars['listeRessources']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loopRessources'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loopRessources']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ressourceCourant']):
        $this->_foreach['loopRessources']['iteration']++;
?>
													<?php if ($this->_tpl_vars['tmpNbDansColCourante'] >= $this->_tpl_vars['maxCol']): ?>
														<?php $this->assign('tmpNbDansColCourante', '0'); ?>
														</td>
														<td class="planningDropdownFilter">
													<?php endif; ?>
													<label class="checkbox">
														<input type="checkbox" id="ressource_<?php echo $this->_tpl_vars['ressourceCourant']['ressource_id']; ?>
" value="<?php echo $this->_tpl_vars['ressourceCourant']['ressource_id']; ?>
" name="ressource[]" <?php if (in_array ( $this->_tpl_vars['ressourceCourant']['ressource_id'] , $this->_tpl_vars['filtreGroupeRessource'] )): ?>checked="checked"<?php endif; ?> /> <?php echo ((is_array($_tmp=$this->_tpl_vars['ressourceCourant']['nom'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

													</label>
													<?php $this->assign('tmpNbDansColCourante', $this->_tpl_vars['tmpNbDansColCourante']+1); ?>
												<?php endforeach; endif; unset($_from); ?>
												</div>
											</td>
									<?php endif; ?>
										</tr>
									</table>
							</li>
							<li><input type="submit" value="<?php echo $this->_config[0]['vars']['submit']; ?>
" class="btn btn-default margin-left-10" /></li>
						</ul>
						</form>
					</div>
										<div class="btn-group">
						<button class="btn dropdown-toggle btn-sm btn-default" data-toggle="dropdown"><?php echo $this->_config[0]['vars']['formTrierPar']; ?>
&nbsp;<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<?php if ($this->_tpl_vars['inverserUsersProjets']): ?>
								<?php $_from = $this->_tpl_vars['triPlanningPossibleProjet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['triTemp']):
?>
									<?php $this->assign('chaineTmp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='triProjet_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['triTemp']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['triTemp'])))) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '_') : smarty_modifier_replace($_tmp, ' ', '_')))) ? $this->_run_mod_handler('replace', true, $_tmp, ',', '_') : smarty_modifier_replace($_tmp, ',', '_'))); ?>
									<li <?php if ($this->_tpl_vars['triTemp'] == $this->_tpl_vars['triPlanning']): ?>class="active"<?php endif; ?>><a href="process/planning.php?triPlanning=<?php echo ((is_array($_tmp=$this->_tpl_vars['triTemp'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><?php echo $this->_config[0]['vars'][$this->_tpl_vars['chaineTmp']]; ?>
</a></li>
								<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
								<?php $_from = $this->_tpl_vars['triPlanningPossibleUser']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['triTemp']):
?>
									<?php $this->assign('chaineTmp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='triUser_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['triTemp']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['triTemp'])))) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '_') : smarty_modifier_replace($_tmp, ' ', '_')))) ? $this->_run_mod_handler('replace', true, $_tmp, ',', '_') : smarty_modifier_replace($_tmp, ',', '_'))); ?>
									<li <?php if ($this->_tpl_vars['triTemp'] == $this->_tpl_vars['triPlanning']): ?>class="active"<?php endif; ?>><a href="process/planning.php?triPlanning=<?php echo ((is_array($_tmp=$this->_tpl_vars['triTemp'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><?php echo $this->_config[0]['vars'][$this->_tpl_vars['chaineTmp']]; ?>
</a></li>
								<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>
						</ul>
					</div>
										<div class="btn-group">
						<button class="btn dropdown-toggle btn-sm btn-default" data-toggle="dropdown"><?php echo $this->_config[0]['vars']['choix_export']; ?>
&nbsp;<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="javascript:window.print();"><img align="absbottom" src="assets/img/pictos/printButton.png" alt='' /> <?php echo ((is_array($_tmp=$this->_config[0]['vars']['printAll'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li>
							<li><a href="export_csv.php"><img align="absbottom" src="assets/img/pictos/CSVIcon.gif" alt='' /> <?php echo ((is_array($_tmp=$this->_config[0]['vars']['CSVExport'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li>
							<li><a href="javascript:xajax_choixPDF();undefined;"><img align="absbottom" src="assets/img/pictos/pdf.png" alt='' /> <?php echo ((is_array($_tmp=$this->_config[0]['vars']['PDFExport'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li>
							<li><a href="export_xls.php" target="_blank"><img align="absbottom" src="assets/img/pictos/xls.png" alt='' /> <?php echo ((is_array($_tmp=$this->_config[0]['vars']['xlsExport'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li>
							<li><a href="export_gantt.php" target="_blank"><img align="absbottom" src="assets/img/pictos/gantt.png" alt='' /> <?php echo ((is_array($_tmp=$this->_config[0]['vars']['ganttExport'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li>
							<li><a href="export_pdf_calendrier.php" target="_blank"><img align="absbottom" src="assets/img/pictos/calendar.png" alt='' /> <?php echo ((is_array($_tmp=$this->_config[0]['vars']['calendarExport'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li>
							<li><a href="javascript:xajax_choixIcal();undefined;"><img align="absbottom" src="assets/img/pictos/ical.png" alt='' /> <?php echo ((is_array($_tmp=$this->_config[0]['vars']['icalExport'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li>
						</ul>
					</div>
										<div class="btn-group">
						<?php if ($this->_tpl_vars['dimensionCase'] == 'reduit'): ?>
							<a class="btn btn-sm btn-default" title="<?php echo $this->_config[0]['vars']['menuPlanningLarge']; ?>
" href="process/planning.php?dimensionCase=large"><img class="vmiddle" src="assets/img/pictos/zoomin.png" alt='' /></a>
						<?php else: ?>
							<a class="btn btn-sm btn-default" title="<?php echo $this->_config[0]['vars']['menuPlanningReduit']; ?>
" href="process/planning.php?dimensionCase=reduit"><img class="vmiddle" src="assets/img/pictos/zoomout.png" alt='' /></a>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['affichageLarge'] == 0): ?>
							<a href="?affichageLarge=1" class="btn btn-sm btn-default" title="<?php echo ((is_array($_tmp=$this->_config[0]['vars']['affichageReduit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><img class="vmiddle" src="assets/img/pictos/scroll.png" alt='' /></a>
						<?php else: ?>
							<a href="?affichageLarge=0" class="btn btn-sm btn-default" title="<?php echo ((is_array($_tmp=$this->_config[0]['vars']['affichageEtendu'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><img class="vmiddle" src="assets/img/pictos/scroll.png" alt='' /></a>
						<?php endif; ?>
					</div>
										<div class="btn-group">
						<form action="process/planning.php" method="POST">
							<div class="input-group">
								<input type="text" class="form-control input-sm w70" name="filtreTexte" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['filtreTexte'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" maxlength="50" title="<?php echo ((is_array($_tmp=$this->_config[0]['vars']['formFiltreTexte'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="filtreTexte" />
								<span class="input-group-btn">
									<button type="submit" class="btn btn-sm <?php if ($this->_tpl_vars['filtreTexte'] != ""): ?>btn-danger<?php else: ?>btn-default<?php endif; ?>"><i class="glyphicon glyphicon-search"></i></button>
								</span>
								<?php if ($this->_tpl_vars['filtreTexte'] != ""): ?>
									<div class="btn-group">
										<button class="btn dropdown-toggle" data-toggle="dropdown">&nbsp;<span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="process/planning.php?desactiverFiltreTexte=1"><?php echo $this->_config[0]['vars']['formFiltreUserDesactiver']; ?>
</a></li>
										</ul>
									</div>
								<?php endif; ?>
							</div>
						</form>
					</div>
										<div class="btn-group">
							<?php if ($this->_tpl_vars['modeAffichage'] == 'mois'): ?>
								<a class="btn btn-info btn-sm" href="planning_per_day.php"><?php echo $this->_config[0]['vars']['menuPlanningJour']; ?>
</a>
							<?php elseif ($this->_tpl_vars['modeAffichage'] == 'annee'): ?>
								<a class="btn btn-info btn-sm" href="planning.php"><?php echo $this->_config[0]['vars']['menuPlanningMois']; ?>
</a>
              <?php else: ?>
                <a class="btn btn-info btn-sm" href="planning_year.php"><?php echo $this->_config[0]['vars']['menuPlanningAnnee']; ?>
</a>
							<?php endif; ?>
					</div>
			</div>