<?php /* Smarty version 2.6.29, created on 2017-05-03 09:32:56
         compiled from user_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'user_form.tpl', 13, false),array('modifier', 'cat', 'user_form.tpl', 221, false),array('modifier', 'buttonFontColor', 'user_form.tpl', 221, false),array('modifier', 'explode', 'user_form.tpl', 223, false),array('modifier', 'replace', 'user_form.tpl', 224, false),array('modifier', 'substr', 'user_form.tpl', 310, false),)), $this); ?>

<form class="form-horizontal" method="post" action="" onsubmit="return false;" name="formUser" >
<input type="hidden" id="user_id_origine" value="<?php echo $this->_tpl_vars['user_form']['user_id']; ?>
">
<div class="container-fluid">
	<div class="form-group col-md-12">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3"><?php echo $this->_config[0]['vars']['user_identifiant']; ?>
 :</label>
				<div class="col-md-6">
					<?php if ($this->_tpl_vars['user_form']['saved'] == 1): ?>
						<p class="form-control-static"><?php echo ((is_array($_tmp=$this->_tpl_vars['user_form']['user_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</p>
						<input id="user_id" type="hidden" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user_form']['user_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
					<?php else: ?>
						<input class="form-control" id="user_id" type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user_form']['user_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" maxlength="10" />
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3"><?php echo $this->_config[0]['vars']['user_groupe']; ?>
 :</label>
				<div class="col-md-6">
					<select id="user_groupe_id" class="form-control">
						<option value="">- - - - - - - - - - -</option>
						<?php $_from = $this->_tpl_vars['groupes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['groupe']):
?>
							<option value="<?php echo $this->_tpl_vars['groupe']['user_groupe_id']; ?>
" <?php if ($this->_tpl_vars['user_form']['user_groupe_id'] == $this->_tpl_vars['groupe']['user_groupe_id']): ?>selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['groupe']['nom'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group col-md-12">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3"><?php echo $this->_config[0]['vars']['user_nom']; ?>
 :</label>
				<div class="col-md-6">
					<input id="nom" class="form-control" type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user_form']['nom'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" maxlength="100" />
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3"><?php echo $this->_config[0]['vars']['user_email']; ?>
 :</label>
				<div class="col-md-6">
					<input id="email_user" class="form-control" type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user_form']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" maxlength="255" />
				</div>
			</div>
		</div>
	</div>
	<div class="form-group col-md-12">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3"><?php echo $this->_config[0]['vars']['user_login']; ?>
 :</label>
				<div class="col-md-6">
					<input id="login_tmp" class="form-control" type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user_form']['login'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" maxlength="30" />
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3"><?php echo $this->_config[0]['vars']['user_password']; ?>
 :</label>
				<div class="col-md-6">
					<input id="password_tmp" class="form-control" type="password" value="" maxlength="20" />
				</div>
			</div>
		</div>
	</div>
	<ul class="nav nav-tabs">
        <li class="active"><a href="#droits" data-toggle="tab">Droits</a></li>
        <li><a href="#perso" data-toggle="tab">Personalisation & notifications</a></li>
        <li><a href="#infos" data-toggle="tab">Infos personnelles</a></li>
        <li><a href="#calendar"   data-toggle="tab">Calendrier</a></li>
	</ul>
	
	<div class="tab-content">	
		<div class="tab-pane in active" id="droits">
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2"><?php echo $this->_config[0]['vars']['droits_utilisateurs']; ?>
 :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio"name="users_manage" id="droit1" value="" <?php if (! in_array ( 'users_manage_all' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_aucundroitUser']; ?>

							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio"name="users_manage" id="users_manage_all" value="users_manage_all" <?php if (in_array ( 'users_manage_all' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_gererTousUsers']; ?>

							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2"><?php echo $this->_config[0]['vars']['droits_projets']; ?>
 :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="projects_manage" id="droit2" value="" <?php if (! in_array ( 'projects_manage_all' , $this->_tpl_vars['user_form']['tabDroits'] ) && ! in_array ( 'projects_manage_own' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_aucunDroitProjets']; ?>

							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="projects_manage" id="projects_manage_all" value="projects_manage_all" <?php if (in_array ( 'projects_manage_all' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_gererTousProjets']; ?>

							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="projects_manage" id="projects_manage_own" value="projects_manage_own" <?php if (in_array ( 'projects_manage_own' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_uniquementProjProprio']; ?>

							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2"><?php echo $this->_config[0]['vars']['droits_groupesProjets']; ?>
 :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="projectgroups_manage" id="droit3" value="" <?php if (! in_array ( 'projectgroups_manage_all' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_groupesProjetsAucun']; ?>

							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="projectgroups_manage" id="projectgroups_manage_all" value="projectgroups_manage_all" <?php if (in_array ( 'projectgroups_manage_all' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_gererTousGroupes']; ?>

							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2"><?php echo $this->_config[0]['vars']['droits_modifPlanning']; ?>
 :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="planning_modif" id="tasks_readonly" value="tasks_readonly" <?php if (in_array ( 'tasks_readonly' , $this->_tpl_vars['user_form']['tabDroits'] ) || ( ! in_array ( 'tasks_modify_all' , $this->_tpl_vars['user_form']['tabDroits'] ) && ! in_array ( 'tasks_modify_own_project' , $this->_tpl_vars['user_form']['tabDroits'] ) && ! in_array ( 'tasks_modify_own_task' , $this->_tpl_vars['user_form']['tabDroits'] ) )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_planningLectureSeule']; ?>

							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="planning_modif" id="tasks_modify_all" value="tasks_modify_all" <?php if (in_array ( 'tasks_modify_all' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_planningTousProjets']; ?>

							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="planning_modif" id="tasks_modify_own_project" value="tasks_modify_own_project" <?php if (in_array ( 'tasks_modify_own_project' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_planningProjetsProprio']; ?>

							</label>
							<br /><label class="radio-inline tailleDroits">
								<input type="radio" name="planning_modif" id="tasks_modify_own_task" value="tasks_modify_own_task" <?php if (in_array ( 'tasks_modify_own_task' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_planningTachesAssignees']; ?>

							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2"><?php echo $this->_config[0]['vars']['droits_vuePlanning']; ?>
 :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="planning_view" id="tasks_view_all_projects" value="tasks_view_all_projects" <?php if (in_array ( 'tasks_view_all_projects' , $this->_tpl_vars['user_form']['tabDroits'] ) || ! in_array ( 'tasks_view_own_projects' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_vueTousProjets']; ?>

							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="planning_view" id="tasks_view_team_projects" value="tasks_view_team_projects" <?php if (in_array ( 'tasks_view_team_projects' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_vueProjetsEquipe']; ?>

							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="planning_view" id="tasks_view_own_projects" value="tasks_view_own_projects" <?php if (in_array ( 'tasks_view_own_projects' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_vueProjetsAssignes']; ?>

							</label>
							<br /><label class="radio-inline tailleDroits">
								<input type="radio" name="planning_view" id="tasks_view_only_own" value="tasks_view_only_own" <?php if (in_array ( 'tasks_view_only_own' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>><?php echo $this->_config[0]['vars']['droits_tasks_view_only_own']; ?>

							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2"><?php echo $this->_config[0]['vars']['droits_lieux']; ?>
 :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="lieux" id="droit6" value="" <?php if (! in_array ( 'lieux_all' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_aucunLieux']; ?>

							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="lieux" id="lieux_all" value="lieux_all" <?php if (in_array ( 'lieux_all' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_lieuxAcces']; ?>

							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2"><?php echo $this->_config[0]['vars']['droits_ressources']; ?>
 :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="ressources" id="droit7" value="" <?php if (! in_array ( 'ressources_all' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_aucunRessources']; ?>

							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="ressources" id="ressources_all" value="ressources_all" <?php if (in_array ( 'ressources_all' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_ressourcesAcces']; ?>

							</label>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-2"><?php echo $this->_config[0]['vars']['droits_parametres']; ?>
 :</label>
						<div class="col-md-10">
							<label class="radio-inline tailleDroits">
								<input type="radio" name="parameters" id="droit5" value="" <?php if (! in_array ( 'parameters_modify' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_aucunParametres']; ?>

							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" name="parameters" id="parameters_modify" value="parameters_all" <?php if (in_array ( 'parameters_all' , $this->_tpl_vars['user_form']['tabDroits'] )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['droits_parametresAcces']; ?>

							</label>
						</div>
					</div>
				</div>
		</div>
		<div class="tab-pane" id="perso">
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-3"><?php echo $this->_config[0]['vars']['user_visiblePlanning']; ?>
 :</label>
						<div class="col-md-2">
							<label class="radio-inline tailleDroits">
								<input type="radio" id="visible_planningOui" name="visible_planning" value="oui" <?php if (( $this->_tpl_vars['user_form']['saved'] == 0 ) || ( $this->_tpl_vars['user_form']['visible_planning'] == 'oui' )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['oui']; ?>

							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" id="visible_planningNon" name="visible_planning" value="non" <?php if (( $this->_tpl_vars['user_form']['saved'] == 1 ) && ( $this->_tpl_vars['user_form']['visible_planning'] == 'non' )): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['non']; ?>

							</label>
						</div>
						<div class="col-md-2"></div>
						<label class="control-label col-md-2"><?php echo $this->_config[0]['vars']['user_couleur']; ?>
 :</label>
						<div class="col-md-2">
							<?php if ($_SESSION['couleurExUser'] != ""): ?>
								<?php $this->assign('couleurExUser', $_SESSION['couleurExUser']); ?>
							<?php else: ?>
								<?php $this->assign('couleurExUser', 'ffffff'); ?>
							<?php endif; ?>
							<?php if (@CONFIG_PROJECT_COLORS_POSSIBLE != ""): ?>
								<select name="couleur" id="couleur" style="background-color:#<?php echo $this->_tpl_vars['user_form']['couleur']; ?>
;color:<?php echo ((is_array($_tmp=((is_array($_tmp="#")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['user_form']['couleur']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['user_form']['couleur'])))) ? $this->_run_mod_handler('buttonFontColor', true, $_tmp) : buttonFontColor($_tmp)); ?>
" class="form-control jscolor" >
									<?php if ($this->_tpl_vars['user_form']['couleur'] == ""): ?><option value=""><?php echo $this->_config[0]['vars']['winProjet_couleurchoix']; ?>
</option><?php endif; ?>
									<?php $_from = ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, @CONFIG_PROJECT_COLORS_POSSIBLE) : explode($_tmp, @CONFIG_PROJECT_COLORS_POSSIBLE)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['couleurTmp']):
?>
										<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['couleurTmp'])) ? $this->_run_mod_handler('replace', true, $_tmp, '#', '') : smarty_modifier_replace($_tmp, '#', '')); ?>
" style="background-color:<?php echo $this->_tpl_vars['couleurTmp']; ?>
;color:<?php echo ((is_array($_tmp=$this->_tpl_vars['couleurTmp'])) ? $this->_run_mod_handler('buttonFontColor', true, $_tmp) : buttonFontColor($_tmp)); ?>
" <?php if ($this->_tpl_vars['couleurTmp'] == ((is_array($_tmp="#")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['user_form']['couleur']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['user_form']['couleur']))): ?>selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['couleurTmp'])) ? $this->_run_mod_handler('replace', true, $_tmp, '#', '') : smarty_modifier_replace($_tmp, '#', '')); ?>
</option>
									<?php endforeach; endif; unset($_from); ?>
								</select>
								<span class="w50" style="background-color:<?php echo $this->_tpl_vars['user_form']['couleur']; ?>
">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
							<?php else: ?>
								<input id="couleur" type="text" class="form-control" maxlength="6" value="<?php if ($this->_tpl_vars['projet']['couleur'] == ''): ?><?php echo $this->_tpl_vars['couleurExUser']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['user_form']['couleur'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<?php endif; ?>" maxlength="20"/>
							<?php endif; ?>
						</div>
					</div>
			</div>
			<div class="form-group col-md-12">
					<div class="form-group form-inline">
						<label class="control-label col-md-3"><?php echo $this->_config[0]['vars']['user_notifications']; ?>
 :</label>
						<div class="col-md-2">
							<label class="radio-inline tailleDroits">
								<input type="radio" id="notificationsOui" name="notifications" value="oui" <?php if ($this->_tpl_vars['user_form']['notifications'] == 'oui'): ?>checked="checked"<?php endif; ?>> &nbsp;<?php echo $this->_config[0]['vars']['oui']; ?>

							</label>
							<label class="radio-inline tailleDroits">
								<input type="radio" id="notificationsNon" name="notifications" value="non" <?php if ($this->_tpl_vars['user_form']['notifications'] == 'non'): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo $this->_config[0]['vars']['non']; ?>

							</label>
						</div>
				<?php if ($this->_tpl_vars['user_form']['saved'] == 0): ?>
						<div class="col-md-2"></div>
						<div class="col-md-2">
							<label class="checkbox-inline col-md-3">
								<input type="checkbox" id="envoiMailPwd" name="envoiMailPwd" value="true" />&nbsp;<?php echo $this->_config[0]['vars']['user_mailPwd']; ?>

							</label>
						</div>
				<?php else: ?>
					<input type="hidden" id="envoiMailPwd" name="envoiMailPwd" value="false" />
				<?php endif; ?>
				</div>
			</div>
		</div>	
    <div class="tab-pane" id="infos">
			<div class="form-group col-md-12">
				<div class="form-group">
					<label class="control-label col-md-3"><?php echo $this->_config[0]['vars']['user_adress']; ?>
 :</label>
					<div class="col-md-6">
						<input id="user_adress" class="form-control" type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user_form']['adresse'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" maxlength="100" />
					</div>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="form-group">
					<label class="control-label col-md-3"><?php echo $this->_config[0]['vars']['user_phone']; ?>
 :</label>
					<div class="col-md-2">
						<input id="user_phone" class="form-control" type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user_form']['telephone'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" maxlength="20" />
					</div>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="form-group">
					<label class="control-label col-md-3"><?php echo $this->_config[0]['vars']['user_mobile']; ?>
 :</label>
					<div class="col-md-2">
						<input id="user_mobile" class="form-control" type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user_form']['mobile'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" maxlength="20" />
					</div>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="form-group">
					<label class="control-label col-md-3"><?php echo $this->_config[0]['vars']['user_metier']; ?>
 :</label>
					<div class="col-md-4">
						<input id="user_metier" class="form-control" type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user_form']['metier'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" maxlength="100" />
					</div>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="form-group">
					<label class="control-label col-md-3"><?php echo $this->_config[0]['vars']['user_comment']; ?>
 :</label>
					<div class="col-md-4">
						<textarea id="user_comment" class="form-control"><?php echo ((is_array($_tmp=$this->_tpl_vars['user_form']['commentaire'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
					</div>
				</div>
			</div>
		</div>
<!-- Calendrier -->          
		<div class="tab-pane" id="calendar">
      <div class="form-group col-md-4" id='minicalContent'>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "www_minical.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>
      <div class="form-group col-md-2">&nbsp;</div>
      <div class="form-group col-md-6">
        <?php echo $this->_config[0]['vars']['exception']; ?>

        <select name="exceptions" multiple="multiple" size="5" class="form-control" id="listExeptionDays">
          <?php $_from = $this->_tpl_vars['minicalExceptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Exc']):
?>
            <option value="<?php echo $this->_tpl_vars['Exc']; ?>
"><?php echo $this->_tpl_vars['Exc']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['minical'])) ? $this->_run_mod_handler('substr', true, $_tmp, 4, 2) : substr($_tmp, 4, 2)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['minical'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 4) : substr($_tmp, 0, 4)); ?>
</option>
          <?php endforeach; endif; unset($_from); ?>
        </select>
        <?php echo $this->_config[0]['vars']['utilisables']; ?>
 <span id="minicalUseable"><?php echo $this->_tpl_vars['minicalUseable']; ?>
</span> <?php echo $this->_config[0]['vars']['jours']; ?>

        </div>
    </div>
<!-- /Calendrier -->
  </div>
	
	<div class="form-group col-md-12">
		<div class="col-md-12">
			<div class="col-md-6">
				<input type="button" class="btn btn-primary" value="<?php echo $this->_config[0]['vars']['submit']; ?>
" onClick="xajax_submitFormUser($('#user_id').val(), $('#user_id_origine').val(), $('#user_groupe_id').val(), $('#nom').val(), $('#email_user').val(), $('#login_tmp').val(), $('#password_tmp').val(), $('#visible_planningOui').is(':checked'), $('#couleur').val(), $('#notificationsOui').is(':checked'), $('#envoiMailPwd').is(':checked'), new Array(getRadioValue('users_manage'), getRadioValue('projects_manage'), getRadioValue('projectgroups_manage'), getRadioValue('planning_modif'), getRadioValue('planning_view'), getRadioValue('lieux'), getRadioValue('ressources'), getRadioValue('parameters')),$('#user_adress').val(),$('#user_phone').val(),$('#user_mobile').val(),$('#user_metier').val(),$('#user_comment').val());" />
			</div>
		</div>
	</div>
</div>