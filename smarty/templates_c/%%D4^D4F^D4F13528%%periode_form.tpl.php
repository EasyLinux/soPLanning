<?php /* Smarty version 2.6.29, created on 2017-04-28 16:07:48
         compiled from periode_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'sqldate2userdate', 'periode_form.tpl', 55, false),array('modifier', 'sprintf', 'periode_form.tpl', 82, false),array('modifier', 'escape', 'periode_form.tpl', 90, false),array('modifier', 'sqltime2usertime', 'periode_form.tpl', 91, false),array('modifier', 'usertime2sqltime', 'periode_form.tpl', 91, false),array('modifier', 'strpos', 'periode_form.tpl', 330, false),)), $this); ?>
<form class="form-horizontal" method="POST" action="" target="_blank">
	<input type="hidden" id="periode_id" name="periode_id" value="<?php echo $this->_tpl_vars['periode']['periode_id']; ?>
" />
	<input type="hidden" id="saved" name="saved" value="<?php echo $this->_tpl_vars['periode']['saved']; ?>
" />
	<div class="container-fluid">
		<div class="form-group col-md-12">
			<label class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['winPeriode_projet']; ?>
 :</label>
			<div class="col-md-4">
				<select name="projet_id" id="projet_id" class="form-control select2" tabindex="1">
					<option value="">- - - - - - - - - - -</option>
					<?php $this->assign('groupeCourant', "-1"); ?>
					<?php $_from = $this->_tpl_vars['listeProjets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['projet']):
?>
						<?php if ($this->_tpl_vars['groupeCourant'] != $this->_tpl_vars['projet']['groupe_id']): ?>
							<?php $this->assign('groupeCourant', $this->_tpl_vars['projet']['groupe_id']); ?>
							<?php if ($this->_tpl_vars['projet']['groupe_id'] == ""): ?>
								<?php $this->assign('nomgroupe', $this->_config[0]['vars']['projet_liste_sansGroupes']); ?>
							<?php else: ?>
								<?php $this->assign('nomgroupe', $this->_tpl_vars['projet']['nom_groupe']); ?>
							<?php endif; ?>
							<optgroup label="<?php echo $this->_tpl_vars['nomgroupe']; ?>
"></optgroup>
						<?php endif; ?>
						<option value="<?php echo $this->_tpl_vars['projet']['projet_id']; ?>
" <?php if ($this->_tpl_vars['periode']['projet_id'] == $this->_tpl_vars['projet']['projet_id']): ?>selected="selected"<?php endif; ?> <?php if (isset ( $this->_tpl_vars['projet_id_choisi'] ) && $this->_tpl_vars['projet_id_choisi'] == $this->_tpl_vars['projet']['projet_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['projet']['nom']; ?>
 (<?php echo $this->_tpl_vars['projet']['projet_id']; ?>
) <?php if ($this->_tpl_vars['projet']['livraison'] != ''): ?> - S<?php echo $this->_tpl_vars['projet']['livraison']; ?>
<?php endif; ?></option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</div>
			<label class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['winPeriode_user']; ?>
 :</label>
			<div class="col-md-4">
				<select multiple="multiple" name="user_id" id="user_id" class="form-control" tabindex="2">
							<?php $this->assign('groupeTemp', ""); ?>
							<?php $_from = $this->_tpl_vars['listeUsers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loopUsers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loopUsers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['userCourant']):
        $this->_foreach['loopUsers']['iteration']++;
?>
								<?php if ($this->_tpl_vars['userCourant']['user_groupe_id'] != $this->_tpl_vars['groupeTemp']): ?>
									<optgroup label="<?php echo $this->_tpl_vars['userCourant']['groupe_nom']; ?>
">
								<?php endif; ?>
								<option value="<?php echo $this->_tpl_vars['userCourant']['user_id']; ?>
" <?php if ($this->_tpl_vars['periode']['user_id'] == $this->_tpl_vars['userCourant']['user_id']): ?>selected="selected"<?php endif; ?> <?php if (isset ( $this->_tpl_vars['user_id_choisi'] ) && $this->_tpl_vars['user_id_choisi'] == $this->_tpl_vars['userCourant']['user_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['userCourant']['nom']; ?>
 - <?php echo $this->_tpl_vars['userCourant']['user_id']; ?>
</option>
								<?php if ($this->_tpl_vars['userCourant']['user_groupe_id'] != $this->_tpl_vars['groupeTemp']): ?>
									</optgroup>
								<?php endif; ?>
								<?php $this->assign('groupeTemp', $this->_tpl_vars['userCourant']['user_groupe_id']); ?>
						<?php endforeach; endif; unset($_from); ?>
				</select>
			</div>
		</div>
		<?php if (isset ( $this->_tpl_vars['estFilleOuParente'] )): ?>
		<div class="form-group col-md-12">
			<label class="col-md-2 control-label"></label>
			<div class="col-md-4">
				<label class="checkbox-inline"><input type="checkbox" checked="checked" id="appliquerATous" value="1">	<?php echo $this->_config[0]['vars']['winPeriode_appliquerATous']; ?>
</label>
			</div>
		</div>
		<?php endif; ?>
		<div class='col-md-12 top-5'><hr /></div>
		<div class="form-group col-md-12">
			<label class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['winPeriode_debut']; ?>
 :</label>
			<div class="col-md-2">
				<input type="text" class="form-control" name="date_debut" id="date_debut" maxlength="10" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['periode']['date_debut'])) ? $this->_run_mod_handler('sqldate2userdate', true, $_tmp) : sqldate2userdate($_tmp)); ?>
" class="datepicker" tabindex="4" />
			</div>
		</div>
		<div class="form-group col-md-12">		
			<label class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['winPeriode_fin']; ?>
 :</label>
			<div class="col-md-6">
				<label class="radio-inline">
					<input type="radio" name="radioChoixFin" id="radioChoixFinDate" value="" <?php if ($this->_tpl_vars['periode']['duree_details'] == ""): ?>checked="checked"<?php endif; ?> onChange="$('#divFinChoixDate').removeClass('hidden');$('#divFinChoixDuree').addClass('hidden');" tabindex="5" />&nbsp;<?php echo $this->_config[0]['vars']['winPeriode_finChoixDate']; ?>

				</label>
				<label class="radio-inline">
					<input type="radio" name="radioChoixFin" id="radioChoixFinDuree" value="" <?php if ($this->_tpl_vars['periode']['duree_details'] != ""): ?>checked="checked"<?php endif; ?> onChange="$('#divFinChoixDuree').removeClass('hidden');$('#divFinChoixDate').addClass('hidden');" tabindex="6" />&nbsp;<?php echo $this->_config[0]['vars']['winPeriode_finChoixDuree']; ?>

				</label>
			</div>
		</div>
					<div class="form-group col-md-12 form-inline<?php if ($this->_tpl_vars['periode']['duree_details'] != ""): ?> hidden<?php endif; ?>" id="divFinChoixDate">
			<div class="col-md-2"></div>
			<div class="col-md-4">
				<input type="text" class="form-control datepicker" name="date_fin" id="date_fin" maxlength="10" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['periode']['date_fin'])) ? $this->_run_mod_handler('sqldate2userdate', true, $_tmp) : sqldate2userdate($_tmp)); ?>
" onFocus="remplirDateFinPeriode();videChampsFinTache(this.id);" onChange="videChampsFinTache(this.id);" tabindex="7" />
			<?php if ($this->_tpl_vars['periode']['periode_id'] == 0): ?>
				<?php echo $this->_config[0]['vars']['winPeriode_ouNBJours']; ?>
 :
				<input type="text" class="form-control" name="nb_jours" id="nb_jours" size="1" maxlength="2" onChange="videChampsFinTache(this.id);" tabindex="10" />
				<input type="hidden" id="conserver_duree" value="" />
			<?php else: ?>
				<input type="hidden" id="nb_jours" value="" />
			<?php endif; ?>
			<?php if ($this->_tpl_vars['periode']['periode_id'] != 0 && $this->_tpl_vars['periode']['date_fin'] != ""): ?>
				<label class="checkbox-inline" ><input type="checkbox" id="conserver_duree" name="conserver_duree" value="1" onClick="toggle2('bloc_date_fin');" tabindex="11" /><?php echo ((is_array($_tmp=$this->_config[0]['vars']['winPeriode_conserverDuree'])) ? $this->_run_mod_handler('sprintf', true, $_tmp, $this->_tpl_vars['nbJours']) : sprintf($_tmp, $this->_tpl_vars['nbJours'])); ?>
</label>
			<?php endif; ?>
			</div>
		</div>
						<div class="form-group col-md-12 form-inline <?php if ($this->_tpl_vars['periode']['duree_details'] == ''): ?> hidden<?php endif; ?>" id="divFinChoixDuree">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					<?php echo $this->_config[0]['vars']['winPeriode_ouNBHeures']; ?>
 <span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winPeriode_FormatDuree'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 200)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span> :
					<input type="text" class="form-control" name="duree" id="duree" size="3" maxlength="5" value="<?php if ($this->_tpl_vars['periode']['duree_details'] == 'duree'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['periode']['duree'])) ? $this->_run_mod_handler('sqltime2usertime', true, $_tmp) : sqltime2usertime($_tmp)); ?>
<?php endif; ?>" onFocus="if(this.value == '')this.value='<?php echo ((is_array($_tmp=@CONFIG_DURATION_DAY)) ? $this->_run_mod_handler('usertime2sqltime', true, $_tmp, 'short') : usertime2sqltime($_tmp, 'short')); ?>
';" onChange="videChampsFinTache(this.id);" tabindex="12" />
				</div>
				<div class="col-md-7">
					<?php echo $this->_config[0]['vars']['winPeriode_heureDebut']; ?>
 <span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winPeriode_FormatDuree'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 200)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span> :
					<input type="text" class="form-control" id="heure_debut" id="heure_debut" size="3" maxlength="5" value="<?php if (isset ( $this->_tpl_vars['periode']['duree_details_heure_debut'] )): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['periode']['duree_details_heure_debut'])) ? $this->_run_mod_handler('sqltime2usertime', true, $_tmp) : sqltime2usertime($_tmp)); ?>
<?php endif; ?>" onChange="videChampsFinTache(this.id);" tabindex="13" />
					<?php echo $this->_config[0]['vars']['winPeriode_heureFin']; ?>
 <span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winPeriode_FormatDuree'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 200)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span> : 
					<input type="text" class="form-control" id="heure_fin" size="3" maxlength="5" value="<?php if (isset ( $this->_tpl_vars['periode']['duree_details_heure_fin'] )): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['periode']['duree_details_heure_fin'])) ? $this->_run_mod_handler('sqltime2usertime', true, $_tmp) : sqltime2usertime($_tmp)); ?>
<?php endif; ?>" onChange="videChampsFinTache(this.id);" tabindex="14" />
					<br />
					<label class="checkbox-inline"><input type="checkbox" id="matin" onChange="videChampsFinTache(this.id);" <?php if ($this->_tpl_vars['periode']['duree_details'] == 'AM'): ?>checked="checked"<?php endif; ?> tabindex="15"><?php echo $this->_config[0]['vars']['winPeriode_matin']; ?>
 (<?php echo @CONFIG_DURATION_AM; ?>
<?php echo $this->_config[0]['vars']['tab_h']; ?>
)</label>
					<label class="checkbox-inline"><input type="checkbox" id="apresmidi" onChange="videChampsFinTache(this.id);" <?php if ($this->_tpl_vars['periode']['duree_details'] == 'PM'): ?>checked="checked"<?php endif; ?> tabindex="16"><?php echo $this->_config[0]['vars']['winPeriode_apresmidi']; ?>
 (<?php echo @CONFIG_DURATION_PM; ?>
<?php echo $this->_config[0]['vars']['tab_h']; ?>
)</label>
				</div>
			</div>
		<div class="form-group col-md-12">
			<?php if (! isset ( $this->_tpl_vars['estFilleOuParente'] )): ?>
				<input type="hidden" id="appliquerATous" value="0">
				<label class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['winPeriode_repeter']; ?>
 :</label>
				<div class="col-md-3">
					<select name="repetition" id="repetition" 
						onChange="<?php echo '
						if(this.value==\'jour\'){$(\'#divOptionsRepetitionJour\').removeClass(\'hidden\');$(\'#divExceptionRepetition\').removeClass(\'hidden\');}else{$(\'#divOptionsRepetitionJour\').addClass(\'hidden\');}	if(this.value==\'semaine\'){$(\'#divOptionsRepetitionSemaine\').removeClass(\'hidden\');$(\'#divExceptionRepetition\').removeClass(\'hidden\');}else{$(\'#divOptionsRepetitionSemaine\').addClass(\'hidden\');}
						if(this.value==\'mois\'){$(\'#divOptionsRepetitionMois\').removeClass(\'hidden\');$(\'#divExceptionRepetition\').removeClass(\'hidden\');}else{$(\'#divOptionsRepetitionMois\').addClass(\'hidden\');}
						if(this.value==\'\'){$(\'#divOptionsRepetitionJour\').addClass(\'hidden\');$(\'#divOptionsRepetitionSemaine\').addClass(\'hidden\');$(\'#divOptionsRepetitionMois\').addClass(\'hidden\');$(\'#divExceptionRepetition\').addClass(\'hidden\');}
						'; ?>
" class="form-control" tabindex="17">
							<option value=""><?php echo $this->_config[0]['vars']['winPeriode_repeter_pasderepetition']; ?>
</option>
							<option value="jour"><?php echo $this->_config[0]['vars']['winPeriode_repeter_jour']; ?>
</option>
							<option value="semaine"><?php echo $this->_config[0]['vars']['winPeriode_repeter_semaine']; ?>
</option>
							<option value="mois"><?php echo $this->_config[0]['vars']['winPeriode_repeter_mois']; ?>
</option>
					</select>
				</div>
				<div class="col-md-7 form-inline">				
						<span id="divOptionsRepetitionJour" class="hidden" tabindex="18">
							<?php echo $this->_config[0]['vars']['winPeriode_repeter_tousles']; ?>

							<select name='nbRepetitionJour' class="form-control input-2-digit">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							</select>
							<?php echo $this->_config[0]['vars']['winPeriode_jour']; ?>
&nbsp;<?php echo $this->_config[0]['vars']['winPeriode_repeter_jusque']; ?>

						<input type="text" class="form-control" id="dateFinRepetitionJour" value="" size="11" maxlength="10" class="datepicker" onFocus="remplirDateRepetition(this.id);" tabindex="18">
						</span>
						<span id="divOptionsRepetitionSemaine" class="hidden" tabindex="19">
							<?php echo $this->_config[0]['vars']['winPeriode_repeter_tousles']; ?>

							<select name='nbRepetitionSemaine' id='nbRepetitionSemaine' class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							</select>
							&nbsp;<?php echo $this->_config[0]['vars']['winPeriode_semaine']; ?>
&nbsp;<?php echo $this->_config[0]['vars']['winPeriode_repeter_jusque']; ?>

							<input type="text" class="form-control datepicker" id="dateFinRepetitionSemaine" value="" size="11" maxlength="10" onFocus="remplirDateRepetition(this.id);" tabindex="18">
							<br />
							<label class="radio control-label"><?php echo $this->_config[0]['vars']['winPeriode_repeter_jourderepetition']; ?>
 :</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="1" checked="checked" /><?php echo $this->_config[0]['vars']['initial_day_1']; ?>
</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="2" /><?php echo $this->_config[0]['vars']['initial_day_2']; ?>
</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="3" /><?php echo $this->_config[0]['vars']['initial_day_3']; ?>
</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="4" /><?php echo $this->_config[0]['vars']['initial_day_4']; ?>
</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="5" /><?php echo $this->_config[0]['vars']['initial_day_5']; ?>
</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="6" /><?php echo $this->_config[0]['vars']['initial_day_6']; ?>
</label>
							<label class="radio-inline"><input type="radio" name="jourSemaine" id="jourSemaine" value="0" /><?php echo $this->_config[0]['vars']['initial_day_0']; ?>
</label>
							</span>
						<span id="divOptionsRepetitionMois" class="hidden" tabindex="18">
							<?php echo $this->_config[0]['vars']['winPeriode_repeter_tousles']; ?>

							<select name='nbRepetitionMois' id='nbRepetitionMois' class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							</select>
							&nbsp;<?php echo $this->_config[0]['vars']['winPeriode_mois']; ?>
&nbsp;<?php echo $this->_config[0]['vars']['winPeriode_repeter_jusque']; ?>

							<input type="text" class="form-control datepicker" id="dateFinRepetitionMois" value="" size="11" maxlength="10" class="datepicker" onFocus="remplirDateRepetition(this.id);" tabindex="18">
							<br />
							<label class="radio control-label"><?php echo $this->_config[0]['vars']['winPeriode_repeter_jourderepetition']; ?>
 :</label>
							<label class="radio-inline"><input type="radio" name="radioChoixJourRepetition" id="radioChoixJourRepetition" value="0" checked="checked" /><?php echo $this->_config[0]['vars']['winPeriode_repeter_jourderepetition_jourmois']; ?>
</label>
						</span>
						<div id="divExceptionRepetition" class="form-group form-inline hidden" tabindex="19">
							<label class="radio control-label"><?php echo $this->_config[0]['vars']['winPeriode_repeter_exception_siferie']; ?>
 :</label>
							<label class="radio-inline"><input type="radio" name="exceptionRepetition" id="exceptionRepetition" value="1" checked="checked" /><?php echo $this->_config[0]['vars']['winPeriode_repeter_exception_decaler']; ?>
</label>
							<label class="radio-inline"><input type="radio" name="exceptionRepetition" id="exceptionRepetition" value="2" /><?php echo $this->_config[0]['vars']['winPeriode_repeter_exception_pasajout']; ?>
</label>
							<label class="radio-inline"><input type="radio" name="exceptionRepetition" id="exceptionRepetition" value="3" /><?php echo $this->_config[0]['vars']['winPeriode_repeter_exception_ajout']; ?>
</label>
						</div>
					</div>
			<?php else: ?>
					<label class="col-md-1 control-label"><?php echo $this->_config[0]['vars']['winPeriode_repeter']; ?>
 :</label>
					<div class="col-md-6">
					<br />
						<b><?php echo $this->_config[0]['vars']['winPeriode_recurrente']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['prochaineOccurence'])) ? $this->_run_mod_handler('sqldate2userdate', true, $_tmp) : sqldate2userdate($_tmp)); ?>
</b>
					</div>
					<input type="hidden" name="repetition" />
					<input type="hidden" name="dateFinRepetitionJour" />
					<input type="hidden" name="dateFinRepetitionSemaine" />
					<input type="hidden" name="dateFinRepetitionMois" />
					<input type="hidden" name="nbRepetitionJour" />
					<input type="hidden" name="nbRepetitionSemaine" />
					<input type="hidden" name="nbRepetitionMois" />
					<input type="hidden" name="jourSemaine" />
			<?php endif; ?>
		</div>
		<div class='col-md-12 top-5'><hr /></div>
		<div class="form-group col-md-12">
			<label class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['winPeriode_statut']; ?>
 :</label>
			<div class="col-md-3">
				<select name="statut_tache" id="statut_tache" class="form-control" tabindex="19">
					<option value="a_faire" <?php if ($this->_tpl_vars['periode']['statut_tache'] == 'a_faire'): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['winPeriode_statut_a_faire']; ?>
</option>
					<option value="en_cours" <?php if ($this->_tpl_vars['periode']['statut_tache'] == 'en_cours'): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['winPeriode_statut_en_cours']; ?>
</option>
					<option value="fait" <?php if ($this->_tpl_vars['periode']['statut_tache'] == 'fait'): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['winPeriode_statut_fait']; ?>
</option>
					<option value="abandon" <?php if ($this->_tpl_vars['periode']['statut_tache'] == 'abandon'): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['winPeriode_statut_abandon']; ?>
</option>
				</select>
			</div>
			<div class="col-md-1"></div>
			<label class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['winPeriode_livrable']; ?>
 :</label>
			<div class="col-md-3" >
				<select name="livrable" id="livrable" class="form-control" tabindex="20">
					<option value="oui" <?php if ($this->_tpl_vars['periode']['livrable'] == 'oui'): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['oui']; ?>
</option>
					<option value="non" <?php if ($this->_tpl_vars['periode']['livrable'] == 'non'): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['non']; ?>
</option>
				</select>
			</div>
		</div>
		<div class="form-group col-md-12">
		<?php if (@CONFIG_SOPLANNING_OPTION_LIEUX == 1): ?>
			<label class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['winPeriode_lieu']; ?>
 :</label>
				<div class="col-md-3">
					<select name="lieu" id="lieu" class="form-control select2" tabindex="19">
						<option value="">- - - - - - - - - - -</option>
						<?php $_from = $this->_tpl_vars['listeLieux']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lieuTmp']):
?>
							<option value="<?php echo $this->_tpl_vars['lieuTmp']['lieu_id']; ?>
" <?php if ($this->_tpl_vars['periode']['lieu'] == $this->_tpl_vars['lieuTmp']['lieu_id']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['lieuTmp']['nom']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</div>
				<div class="col-md-1"></div>
		<?php endif; ?>
		<?php if (@CONFIG_SOPLANNING_OPTION_RESSOURCES == 1): ?>		
			<label class="col-md-2 control-label" <?php if (@CONFIG_SOPLANNING_OPTION_LIEUX == 1): ?> <?php endif; ?>><?php echo $this->_config[0]['vars']['winPeriode_ressource']; ?>
 :</label>
				<div class="col-md-3" <?php if (@CONFIG_SOPLANNING_OPTION_LIEUX == 1): ?><?php endif; ?>>
					<select name="ressource" id="ressource" class="form-control select2" tabindex="20">
						<option value="">- - - - - - - - - - -</option>
						<?php $_from = $this->_tpl_vars['listeRessources']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ressourceTmp']):
?>
							<option value="<?php echo $this->_tpl_vars['ressourceTmp']['ressource_id']; ?>
" <?php if ($this->_tpl_vars['periode']['ressource'] == $this->_tpl_vars['ressourceTmp']['ressource_id']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['ressourceTmp']['nom']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</div>
		<?php endif; ?>
		<?php if (@CONFIG_SOPLANNING_OPTION_LIEUX == 0): ?>
		<input type="hidden" name="lieu" id="lieu" value="">
		<?php endif; ?>
		<?php if (@CONFIG_SOPLANNING_OPTION_RESSOURCES == 0): ?>		
		<input type="hidden" name="ressource" id="ressource" value="">
		<?php endif; ?>		
		</div>
		<div class='col-md-12 top-5'><hr /></div>
		<div class="form-group col-md-12">
			<label class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['winPeriode_titre']; ?>
 :</label>
			<div class="col-md-9">
				<input type="text" class="form-control input-xxxlarge" name="titre" id="titre" maxlength="2000" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['periode']['titre'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onFocus="xajax_autocompleteTitreTache($('#projet_id').val());" class="input-xxlarge" tabindex="21" />
			</div>
		</div>
		<div class="form-group col-md-12 form-inline">
			<label class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['winPeriode_lien']; ?>
 :</label>
			<div class="col-md-10">
				<input type="text" class="form-control input-xxxlarge" name="lien" id="lien" maxlength="2000" value="<?php echo $this->_tpl_vars['periode']['lien']; ?>
" tabindex="22" />
				<?php if ($this->_tpl_vars['periode']['lien'] != ""): ?>
				<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winPeriode_gotoLien'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', WIDTH, 270)" onmouseout="nd()" onclick="window.open('<?php if (((is_array($_tmp=$this->_tpl_vars['periode']['lien'])) ? $this->_run_mod_handler('strpos', true, $_tmp, 'http') : strpos($_tmp, 'http')) !== 0 && ((is_array($_tmp=$this->_tpl_vars['periode']['lien'])) ? $this->_run_mod_handler('strpos', true, $_tmp, "\\") : strpos($_tmp, "\\")) !== 0): ?>http://<?php endif; ?><?php echo $this->_tpl_vars['periode']['lien']; ?>
', '_blank')" target="_blank" class="glyphicon glyphicon-share"></span>
				<?php endif; ?>
			</div>
		</div>
		<div class="form-group col-md-12">
			<label class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['winPeriode_commentaires']; ?>
 :</label>
			<div class="col-md-9">
				<textarea class="form-control input-xxxlarge" id="notes" name="notes" tabindex="23"><?php echo ((is_array($_tmp=$this->_tpl_vars['periode']['notes_xajax'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
			</div>
		</div>
		<div class="form-group col-md-12 form-inline">
			<label class="col-md-2 control-label"><?php echo $this->_config[0]['vars']['winPeriode_custom']; ?>
 :</label>
			<div class="col-md-10">
				<input type="text" class="form-control input-xxxlarge" name="custom" id="custom" maxlength="255" value="<?php echo $this->_tpl_vars['periode']['custom']; ?>
" tabindex="23" />
				<span onmouseover="return coolTip('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winPeriode_custom_aide'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
', WIDTH, 270)" onmouseout="nd()" class="glyphicon glyphicon-question-sign cursor-help small"></span>
			</div>
		</div>

	<?php if (! in_array ( 'tasks_readonly' , $this->_tpl_vars['user']['tabDroits'] )): ?>
		<div class="col-md-12 text-right form-inline">
		<div class="btn-group pull-right form-group">
			<input id="butSubmitPeriode" type="button" class="btn btn-primary" tabindex="24" value="<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winPeriode_valider'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onClick="$('#divPatienter').removeClass('hidden');this.disabled=true;users_ids=getSelectValue('user_id');xajax_submitFormPeriode('<?php echo $this->_tpl_vars['periode']['periode_id']; ?>
', $('#projet_id').val(), users_ids, $('#date_debut').val(), $('#conserver_duree').is(':checked'), $('#date_fin').val(), $('#nb_jours').val(), $('#duree').val(), $('#heure_debut').val(), $('#heure_fin').val(), $('#matin').is(':checked'), $('#apresmidi').is(':checked'), $('#repetition option:selected').val(), $('#dateFinRepetitionJour').val(),$('#dateFinRepetitionSemaine').val(),$('#dateFinRepetitionMois').val(), $('#nbRepetitionJour option:selected').val(),$('#nbRepetitionSemaine option:selected').val(),$('#nbRepetitionMois option:selected').val(),getRadioValue('jourSemaine'),getRadioValue('exceptionRepetition'),$('#appliquerATous').is(':checked'), $('#statut_tache').val(),$('#lieu option:selected').val(), $('#ressource option:selected').val(), $('#livrable').val(), $('#titre').val(), $('#notes').val(), $('#lien').val(), $('#custom').val());" />
			<?php if ($this->_tpl_vars['periode']['periode_id'] != 0 && ( in_array ( 'projects_manage_all' , $this->_tpl_vars['user']['tabDroits'] ) || in_array ( 'projects_manage_own' , $this->_tpl_vars['user']['tabDroits'] ) || ( in_array ( 'tasks_modify_own_task' , $this->_tpl_vars['user']['tabDroits'] ) && $this->_tpl_vars['periode']['user_id'] == $this->_tpl_vars['user']['user_id'] ) )): ?>
				<input type="button" class="btn btn-default" onClick="if(confirm('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winPeriode_dupliquer'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
 ?'))xajax_ajoutPeriode('', '', <?php echo $this->_tpl_vars['periode']['periode_id']; ?>
);" value="<?php echo $this->_config[0]['vars']['winPeriode_dupliquer']; ?>
" />
				<input type="button" class="btn btn-warning" onClick="if(confirm('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winPeriode_confirmSuppr'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
'))xajax_supprimerPeriode(<?php echo $this->_tpl_vars['periode']['periode_id']; ?>
, false);" value="<?php echo $this->_config[0]['vars']['winPeriode_supprimer']; ?>
" />
				<?php if (isset ( $this->_tpl_vars['estFilleOuParente'] )): ?>
					<input type="button" class="btn btn-default" onClick="if(confirm('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winPeriode_confirmSupprRepetition'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
'))xajax_supprimerPeriode(<?php echo $this->_tpl_vars['periode']['periode_id']; ?>
, true);" value="<?php echo $this->_config[0]['vars']['winPeriode_supprimer_repetition']; ?>
" />
					<input type="button" class="btn btn-default" onClick="if(confirm('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winPeriode_confirmSupprRepetition'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
'))xajax_supprimerPeriode(<?php echo $this->_tpl_vars['periode']['periode_id']; ?>
, 'avant');" value="<?php echo $this->_config[0]['vars']['winPeriode_supprimer_repetition_avant']; ?>
" />
					<input type="button" class="btn btn-default" onClick="if(confirm('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['winPeriode_confirmSupprRepetition'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
'))xajax_supprimerPeriode(<?php echo $this->_tpl_vars['periode']['periode_id']; ?>
, 'apres');" value="<?php echo $this->_config[0]['vars']['winPeriode_supprimer_repetition_apres']; ?>
" />
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div id="divPatienter" class="hidden form-group"><img src="assets/img/pictos/loading16.gif" class="picto" /></div>
		</div>
		
	</div>
	<?php endif; ?>
</form>
<?php echo '
	<script language="javascript">
		jQuery(\'#user_id\').multiselect({
			enableCaseInsensitiveFiltering: true,
			numberDisplayed: 4,
			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,
			buttonWidth: 250,
			maxHeight: 400,
			filterPlaceholder: '; ?>
"<?php echo ((is_array($_tmp=$this->_config[0]['vars']['js_choisirUtilisateur'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
"<?php echo ',
			enableFiltering: true,
			includeSelectAllOption: true,
			selectAllText: '; ?>
"<?php echo ((is_array($_tmp=$this->_config[0]['vars']['js_selectionnerTout'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
"<?php echo ',
			nonSelectedText: '; ?>
"<?php echo ((is_array($_tmp=$this->_config[0]['vars']['js_selectionAucuns'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
"<?php echo ',
			nSelectedText: '; ?>
"<?php echo ((is_array($_tmp=$this->_config[0]['vars']['js_nSelection'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
"<?php echo ',
			allSelectedText: '; ?>
"<?php echo ((is_array($_tmp=$this->_config[0]['vars']['js_selectionTous'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
"<?php echo ',
			selectAllJustVisible: true
		});
	</script>
'; ?>