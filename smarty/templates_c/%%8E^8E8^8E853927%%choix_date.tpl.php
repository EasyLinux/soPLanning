<?php /* Smarty version 2.6.29, created on 2017-04-28 12:43:24
         compiled from planning/choix_date.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strstr', 'planning/choix_date.tpl', 58, false),)), $this); ?>
			<div class="soplanning-box" id="divPlanningDateSelector">
				<form action="process/planning.php" method="GET" class="form-inline" id="formChoixDates">
					<div class="btn-group" id="dropdownDateSelector">
						<button id="buttonDateSelector" class="btn dropdown-toggle btn-sm btn-default bigFontSize" data-toggle="dropdown"><?php echo $this->_config[0]['vars']['planning_affichage']; ?>
 : <?php echo $this->_tpl_vars['dateDebutTexte']; ?>
 - <?php echo $this->_tpl_vars['dateFinTexte']; ?>
&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li>
								<table class="planning-dateselector">
								<tr>
									<td>
										<?php echo $this->_config[0]['vars']['formDebut']; ?>
 :&nbsp;
									</td>
									<td>
										<input name="date_debut_affiche" id="date_debut_affiche" type="text" value="<?php echo $this->_tpl_vars['dateDebut']; ?>
" class="form-control datepicker w50"  onChange="$('date_debut_custom').value= '----------------';" />
										<script><?php echo 'addEvent(window, \'load\', function(){jQuery("#date_debut_affiche").datepicker();});'; ?>
</script>
										<br>
										<select id="date_debut_custom" class="form-control" name="date_debut_custom" onChange="$('date_debut_affiche').value= '----------------';">
											<option value=""><?php echo $this->_config[0]['vars']['raccourci']; ?>
...</option>
											<option value="aujourdhui"><?php echo $this->_config[0]['vars']['raccourci_aujourdhui']; ?>
</option>
											<option value="semaine_derniere"><?php echo $this->_config[0]['vars']['raccourci_semaine_derniere']; ?>
</option>
											<option value="mois_dernier"><?php echo $this->_config[0]['vars']['raccourci_mois_dernier']; ?>
</option>
											<option value="debut_semaine"><?php echo $this->_config[0]['vars']['raccourci_debut_semaine']; ?>
</option>
											<option value="debut_mois"><?php echo $this->_config[0]['vars']['raccourci_debut_mois']; ?>
</option>
										</select>
									</td>
									<td>
										&nbsp;<?php echo $this->_config[0]['vars']['formFin']; ?>
 :&nbsp;
									</td>
									<td>
										<input name="date_fin_affiche" id="date_fin_affiche" type="text" value="<?php echo $this->_tpl_vars['dateFin']; ?>
" class="form-control datepicker"  onChange="$('date_fin_custom').value= '----------------';" />
										<script><?php echo 'addEvent(window, \'load\', function(){jQuery("#date_fin_affiche").datepicker();});'; ?>
</script>
										<br>
										<select id="date_fin_custom" name="date_fin_custom" class="form-control" onChange="$('date_fin_affiche').value= '----------------';">
											<option value=""><?php echo $this->_config[0]['vars']['raccourci']; ?>
...</option>
											<option value="1_semaine"><?php echo $this->_config[0]['vars']['raccourci_1_semaine']; ?>
</option>
											<option value="2_semaines"><?php echo $this->_config[0]['vars']['raccourci_2_semaines']; ?>
</option>
											<option value="3_semaines"><?php echo $this->_config[0]['vars']['raccourci_3_semaines']; ?>
</option>
											<option value="1_mois"><?php echo $this->_config[0]['vars']['raccourci_1_mois']; ?>
</option>
											<option value="2_mois"><?php echo $this->_config[0]['vars']['raccourci_2_mois']; ?>
</option>
											<option value="3_mois"><?php echo $this->_config[0]['vars']['raccourci_3_mois']; ?>
</option>
										</select>
									</td>
									<td>
										<button class="btn btn-sm btn-default margin-left-10 margin-right-10" onClick="$('formChoixDates').submit();"><?php echo $this->_config[0]['vars']['planning_afficher']; ?>
</button>
									</td>
								</tr>
								</table>
							</li>
						</ul>
					</div>

					<div class="btn-group margin-left-20">
						<a class="btn btn-sm btn-default" onClick="document.location='process/planning.php?raccourci_date=-<?php echo $this->_tpl_vars['nbJours']; ?>
';"><i class="glyphicon glyphicon-backward"></i> <?php echo $this->_tpl_vars['dateBoutonInferieur']; ?>
</a>
						<a class="btn btn-sm btn-default" onClick="document.location='process/planning.php?raccourci_date=+<?php echo $this->_tpl_vars['nbJours']; ?>
';"><?php echo $this->_tpl_vars['dateBoutonSuperieur']; ?>
 <i class="glyphicon glyphicon-forward"></i></a>
					</div>
					<?php if (! in_array ( 'tasks_readonly' , $this->_tpl_vars['user']['tabDroits'] )): ?>
						<label class="margin-left-20">
							<a class="btn btn-info btn-sm" href="javascript:Reloader.stopRefresh();xajax_ajoutPeriode();undefined;">
								<?php if (! ((is_array($_tmp=$_SERVER['HTTP_USER_AGENT'])) ? $this->_run_mod_handler('strstr', true, $_tmp, "MSIE 8.0") : strstr($_tmp, "MSIE 8.0"))): ?>
									<img src="<?php echo $this->_tpl_vars['BASE']; ?>
/assets/img/pictos/addplanning.png" alt='' />
								<?php endif; ?>
								<?php echo $this->_config[0]['vars']['menuAjouterPeriode']; ?>

							</a>
						</label>
					<?php endif; ?>
				</form>
			</div>