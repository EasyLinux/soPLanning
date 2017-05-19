<?php /* Smarty version 2.6.29, created on 2017-04-28 12:43:24
         compiled from www_planning.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'www_planning.tpl', 87, false),array('modifier', 'json_encode', 'www_planning.tpl', 358, false),array('modifier', 'escape', 'www_planning.tpl', 419, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "www_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="container-fluid">
	<div class="row noprint">
		<div class="col-md-12">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "planning/choix_date.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
	</div>
	<script type="text/javascript">
	<?php echo '
	// hack pour empecher fermeture du layer au click sur les boutons du calendrier
	jQuery(document).on(\'click\', function(e) {
		if (!jQuery(e.target).hasClass(\'ui-datpicker-next\') || !jQuery(e.target).hasClass(\'ui-datpicker-prev\')) {
			e.stopImmediatePropagation();
		}
	});
	jQuery(\'#dropdownDateSelector .dropdown-menu\').on({
			"click":function(e){
			  e.stopPropagation();
			}
		});
	'; ?>

	</script>

	<div class="row noprint">
		<div class="col-md-12">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "planning/choix_user.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
	</div>
<hr />
Planning
<hr />
	  
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box" id="divPlanning">
				<table id="tablePlanning">
					<tr>
						<td class="w100 text-right">
							<div class="h17"></div>
							<table id="divPeople">
								<tbody id="bodyPeople">
									<tr id="loadingPeople">
										<td class="text-center"><br /><br /><?php echo $this->_config[0]['vars']['loading']; ?>
<br /><br /><br /></td>
									</tr>
								</tbody>
							</table>
						</td>
						<td>
							<?php if ($this->_tpl_vars['affichageLarge'] == 1): ?>
								<div id="divScrollHautInterne"></div>
							<?php else: ?>
								<div id="divScrollHaut">
									<div id="divScrollHautInterne"></div>
								</div>
							<?php endif; ?>
							<div id="divConteneurPlanning" <?php if ($this->_tpl_vars['affichageLarge'] == 0): ?>style="width:700px; overflow-x:scroll"<?php endif; ?><?php if ($this->_tpl_vars['modeAffichage'] == 'mois'): ?> onscroll="document.cookie='xposMois=' + document.getElementById('divConteneurPlanning').scrollLeft;"<?php else: ?>onscroll="document.cookie='xposJours=' + document.getElementById('divConteneurPlanning').scrollLeft;"<?php endif; ?>>
								<?php echo $this->_tpl_vars['htmlTableau']; ?>

							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="row noprint">
		<div class="col-md-12">
			<div class="soplanning-box" id="divPlanningSecondFilter">
										<?php if ($this->_tpl_vars['nbPagesLignes'] > 1): ?>
						<div class="btn-group">
							<ul class="pagination pagination-sm">
							<?php unset($this->_sections['loopPages']);
$this->_sections['loopPages']['loop'] = is_array($_loop=$this->_tpl_vars['nbPagesLignes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['loopPages']['name'] = 'loopPages';
$this->_sections['loopPages']['show'] = true;
$this->_sections['loopPages']['max'] = $this->_sections['loopPages']['loop'];
$this->_sections['loopPages']['step'] = 1;
$this->_sections['loopPages']['start'] = $this->_sections['loopPages']['step'] > 0 ? 0 : $this->_sections['loopPages']['loop']-1;
if ($this->_sections['loopPages']['show']) {
    $this->_sections['loopPages']['total'] = $this->_sections['loopPages']['loop'];
    if ($this->_sections['loopPages']['total'] == 0)
        $this->_sections['loopPages']['show'] = false;
} else
    $this->_sections['loopPages']['total'] = 0;
if ($this->_sections['loopPages']['show']):

            for ($this->_sections['loopPages']['index'] = $this->_sections['loopPages']['start'], $this->_sections['loopPages']['iteration'] = 1;
                 $this->_sections['loopPages']['iteration'] <= $this->_sections['loopPages']['total'];
                 $this->_sections['loopPages']['index'] += $this->_sections['loopPages']['step'], $this->_sections['loopPages']['iteration']++):
$this->_sections['loopPages']['rownum'] = $this->_sections['loopPages']['iteration'];
$this->_sections['loopPages']['index_prev'] = $this->_sections['loopPages']['index'] - $this->_sections['loopPages']['step'];
$this->_sections['loopPages']['index_next'] = $this->_sections['loopPages']['index'] + $this->_sections['loopPages']['step'];
$this->_sections['loopPages']['first']      = ($this->_sections['loopPages']['iteration'] == 1);
$this->_sections['loopPages']['last']       = ($this->_sections['loopPages']['iteration'] == $this->_sections['loopPages']['total']);
?>
								<?php if ($this->_tpl_vars['pageLignes'] == $this->_sections['loopPages']['iteration']): ?>
									<li class="active"><a href="#"><?php echo $this->_sections['loopPages']['iteration']; ?>
</a></li>
									<?php else: ?>
									<li><a href="<?php echo $this->_tpl_vars['BASE']; ?>
/process/planning.php?page_lignes=<?php echo $this->_sections['loopPages']['iteration']; ?>
"><?php echo $this->_sections['loopPages']['iteration']; ?>
</a></li>
									<?php endif; ?>
									<?php if (! $this->_sections['loopPages']['last']): ?>
									<?php endif; ?>
								<?php endfor; endif; ?>
							</ul>
						</div>
					<?php endif; ?>
					<div class="btn-group">
						<a class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown" href="#"><?php echo $this->_tpl_vars['nbLignes']; ?>
 <?php echo $this->_config[0]['vars']['planning_nbLignes']; ?>
 <span class="caret"></span></a>
						<?php $this->assign('tabPages', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, @CONFIG_PLANNING_PAGES) : explode($_tmp, @CONFIG_PLANNING_PAGES))); ?>
						<ul class="dropdown-menu">
							<?php $_from = $this->_tpl_vars['tabPages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['valTemp']):
?>
							<li>
								<a onClick="top.location='<?php echo $this->_tpl_vars['BASE']; ?>
/process/planning.php?nb_lignes=+<?php echo $this->_tpl_vars['valTemp']; ?>
'"><?php echo $this->_tpl_vars['valTemp']; ?>
 <?php echo $this->_config[0]['vars']['planning_nbLignes']; ?>
</a>
							</li>
							<?php endforeach; endif; unset($_from); ?>
						</ul>
					</div>
					<div class="btn-group">
						<a class="btn dropdown-toggle btn-sm <?php if ($this->_tpl_vars['masquerLigneVide'] == 1): ?>btn-danger<?php else: ?>btn-default<?php endif; ?>" data-toggle="dropdown" href="#"><?php echo $this->_config[0]['vars']['planning_masquerLignesVides']; ?>
 <span class="caret"></span></a>
						<ul class="dropdown-menu">
							 <?php if ($this->_tpl_vars['masquerLigneVide'] == 1): ?>
							<li>
								<a onClick="top.location='process/planning.php?masquerLigneVide=0'"><?php echo $this->_config[0]['vars']['planning_masquerLignesVides_non']; ?>
</a>
							</li>
							 <?php else: ?>
							<li>
								<a onClick="top.location='process/planning.php?masquerLigneVide=1'"><?php echo $this->_config[0]['vars']['planning_masquerLignesVides_oui']; ?>
</a>
							</li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="btn-group">
						<a class="btn dropdown-toggle btn-sm <?php if ($this->_tpl_vars['afficherLigneTotal'] == 1): ?>btn-danger<?php else: ?>btn-default<?php endif; ?>" data-toggle="dropdown" href="#"><?php echo $this->_config[0]['vars']['planning_afficherLigneTotal']; ?>
 <span class="caret"></span></a>
						<ul class="dropdown-menu">
							 <?php if ($this->_tpl_vars['afficherLigneTotal'] == 1): ?>
							<li>
								<a onClick="top.location='process/planning.php?afficherLigneTotal=0'"><?php echo $this->_config[0]['vars']['non']; ?>
</a>
							</li>
							 <?php else: ?>
							<li>
								<a onClick="top.location='process/planning.php?afficherLigneTotal=1'"><?php echo $this->_config[0]['vars']['oui']; ?>
</a>
							</li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="btn-group">
						<a class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown"  onclick="javascript:toggle2('divProjectTable');" ><?php echo $this->_config[0]['vars']['hide_show_table']; ?>
</a>
					</div>
								</div>
		</div>
	</div>
	<div class="row noprint">
		<div class="col-md-12">
			<div class="soplanning-box" id="divPlanningRecap">
				<?php echo $this->_tpl_vars['htmlRecap']; ?>

			</div>
		</div>
	</div>
</div>

<?php echo '
<script type="text/javascript">
destinationsDrag = new Array();

var origineCaseX;
var origineCaseY;
function modifPeriode(obj, periode_id){
	if(origineCaseX != parseInt(obj.style.left) || origineCaseY != parseInt(obj.style.top)) {
		return false;
	}
	xajax_modifPeriode(periode_id);
}

'; ?>

<?php echo $this->_tpl_vars['js']; ?>

<?php echo '

</script>
'; ?>

<script type="text/javascript">
var listeProjets = new Array();
listeProjets[0] = new Array();
<?php $this->assign('groupeTemp', ""); ?>
<?php $_from = $this->_tpl_vars['listeProjets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['projetCourant']):
?>
	<?php if ($this->_tpl_vars['projetCourant']['groupe_id'] != $this->_tpl_vars['groupeTemp']): ?>
		listeProjets[<?php echo $this->_tpl_vars['projetCourant']['groupe_id']; ?>
] = new Array();
	<?php endif; ?>
	<?php if ($this->_tpl_vars['projetCourant']['groupe_id'] == ''): ?>
		listeProjets[0].push('<?php echo $this->_tpl_vars['projetCourant']['projet_id']; ?>
');
	<?php else: ?>
		listeProjets[<?php echo $this->_tpl_vars['projetCourant']['groupe_id']; ?>
].push('<?php echo $this->_tpl_vars['projetCourant']['projet_id']; ?>
');
	<?php endif; ?>
	<?php $this->assign('groupeTemp', $this->_tpl_vars['projetCourant']['groupe_id']); ?>
<?php endforeach; endif; unset($_from); ?>

<?php echo '
// coche ou decoche tous les projets
function filtreGroupeProjetCocheTous(action) {
	for (var groupe in listeProjets) {
		if (!document.getElementById(\'g\' + groupe)) {
			// si pas une case ? cocher existantes, on sort
			continue;
		}
		document.getElementById(\'g\' + groupe).checked = action;
		for (var projet in listeProjets[groupe]) {
			if (!document.getElementById(\'projet_\' + listeProjets[groupe][projet])) {
				// si pas une case ? cocher existantes, on sort
				continue;
			}
			document.getElementById(\'projet_\' + listeProjets[groupe][projet]).checked = action;
		}
	}
}

// coche ou decoche les projets d\'un groupe
function filtreCocheGroupe(groupe) {
	var action = document.getElementById(\'g\' + groupe).checked;
	for (var projet in listeProjets[groupe]) {
		if (!document.getElementById(\'projet_\' + listeProjets[groupe][projet])) {
			// si pas une case ? cocher existantes, on sort
			continue;
		}
		document.getElementById(\'projet_\' + listeProjets[groupe][projet]).checked = action;
	}
}

// decoche le groupe si on decoche un projet
function checkStatutGroupe(obj, groupe) {
	if (groupe == \'\') {
		groupe = \'0\';
	}
	if (!obj.checked) {
		document.getElementById(\'g\' + groupe).checked = false;
	}
}

'; ?>

</script>

<script type="text/javascript">
	var idCaseEnCoursDeplacement = false;
	var idCaseDestination = false;
</script>

<div id="divChoixDragNDrop" onMouseOut="masquerSousMenuDelai('divChoixDragNDrop');" onMouseOver="AnnuleMasquerSousMenu('divChoixDragNDrop');" onfocus="AnnuleMasquerSousMenu('divChoixDragNDrop')">
	<a href="javascript:windowPatienter();xajax_moveCasePeriode(idCaseEnCoursDeplacement, destination, false);undefined;"><?php echo $this->_config[0]['vars']['planning_deplacer']; ?>
</a>
	<br /><br />
	<a href="javascript:windowPatienter();xajax_moveCasePeriode(idCaseEnCoursDeplacement, destination, true);undefined;"><?php echo $this->_config[0]['vars']['planning_copier']; ?>
</a>
	<br /><br />
	<a href="javascript:location.reload();undefined;"><?php echo $this->_config[0]['vars']['planning_annuler']; ?>
</a>
</div>

<script type="text/javascript">
var listeUsers = new Array();
listeUsers[0] = new Array();
<?php $this->assign('groupeTemp', ""); ?>
<?php $_from = $this->_tpl_vars['listeUsers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['userCourant']):
?>
	<?php if ($this->_tpl_vars['userCourant']['user_groupe_id'] != $this->_tpl_vars['groupeTemp']): ?>
		listeUsers[<?php echo $this->_tpl_vars['userCourant']['user_groupe_id']; ?>
] = new Array();
	<?php endif; ?>
	<?php if ($this->_tpl_vars['userCourant']['user_groupe_id'] == ''): ?>
		listeUsers[0].push('<?php echo $this->_tpl_vars['userCourant']['user_id']; ?>
');
	<?php else: ?>
		listeUsers[<?php echo $this->_tpl_vars['userCourant']['user_groupe_id']; ?>
].push('<?php echo $this->_tpl_vars['userCourant']['user_id']; ?>
');
	<?php endif; ?>
	<?php $this->assign('groupeTemp', $this->_tpl_vars['userCourant']['user_groupe_id']); ?>
<?php endforeach; endif; unset($_from); ?>


<?php echo '
// coche ou decoche tous les Users
function filtreUserCocheTous(action) {
	for (var groupe in listeUsers) {
		if (!document.getElementById(\'gu\' + groupe)) {
			// si pas une case ? cocher existantes, on sort
			continue;
		}
		document.getElementById(\'gu\' + groupe).checked = action;
		for (var user in listeUsers[groupe]) {
			if (!document.getElementById(\'user_\' + listeUsers[groupe][user])) {
				// si pas une case ? cocher existantes, on sort
				continue;
			}
			document.getElementById(\'user_\' + listeUsers[groupe][user]).checked = action;
		}
	}
}

// coche ou decoche les users d\'un groupe
function filtreCocheUserGroupe(groupe) {
	var action = document.getElementById(\'gu\' + groupe).checked;
	for (var user in listeUsers[groupe]) {
		if (!document.getElementById(\'user_\' + listeUsers[groupe][user])) {
			// si pas une case ? cocher existantes, on sort
			continue;
		}
		document.getElementById(\'user_\' + listeUsers[groupe][user]).checked = action;
	}
}



function CocheDecocheTout(ref, name) {
	var elements = document.getElementsByTagName(\'input\');
 
	for (var i = 0; i < elements.length; i++) {
		if (elements[i].type == \'checkbox\' && elements[i].name == name) {
			elements[i].checked = ref;
		}
	}
}

// coche ou decoche les cases d\'un filtre avancé
function filtreCocheAvancesGroupe(statut) {
CocheDecocheTout(statut,"statutsTache[]");
CocheDecocheTout(statut,"statutsProjet[]");
CocheDecocheTout(statut,"lieu[]");
CocheDecocheTout(statut,"ressource[]");
}

// decoche le groupe si on decoche un user
function checkStatutUserGroupe(obj, groupe) {
	if (groupe == \'\') {
		groupe = \'0\';
	}
	if (!obj.checked) {
		document.getElementById(\'gu\' + groupe).checked = false;
	}
}
'; ?>

</script>
<script type="text/javascript">
<?php echo '
function copierTableauPersonnes () {
	document.getElementById(\'loadingPeople\').style.display = \'none\';
	// size div to window width
	document.getElementById(\'divConteneurPlanning\').style.width = document.body.offsetWidth - 110 - document.getElementById(\'tdUser_0\').offsetWidth + \'px\';
	// copy first cell (link to switch view)
	trTemp = document.createElement("tr");
	thTemp = document.createElement("th");
	thTemp.setAttribute(\'id\', \'tdUserCopie_0\');
	trTemp.appendChild(thTemp);
	document.getElementById(\'bodyPeople\').appendChild(trTemp);
	document.getElementById(\'tdUserCopie_0\').style.height = document.getElementById(\'tdUser_0\').offsetHeight + \'px\';
	document.getElementById(\'tdUserCopie_0\').innerHTML = \'<div class="text-center"><a class="linkSwitchView" id="lienInverse" href="process/planning.php?inverserUsersProjets='; ?>
<?php if ($this->_tpl_vars['inverserUsersProjets'] == 0): ?>1<?php else: ?>0<?php endif; ?><?php echo '"><img src="assets/img/pictos/switch.png" alt="" /></a></div>\';

	var table = document.getElementById("tabContenuPlanning");
	numeroCellule = 1;
	for (var i = '; ?>
<?php if ($this->_tpl_vars['modeAffichage'] == 'mois'): ?>4<?php else: ?>2<?php endif; ?><?php echo ', row; row = table.rows[i]; i++) {
		for (var j = 0, col; col = row.cells[j]; j++) {
			if (j == 0) {
				thACopier = col.cloneNode(true);
				thACopier.setAttribute(\'id\', \'tdUserCopie_\' + numeroCellule);
				trTemp = document.createElement("tr");
				trTemp.appendChild(thACopier);
				document.getElementById(\'bodyPeople\').appendChild(trTemp);
				document.getElementById(\'tdUserCopie_\' + numeroCellule).style.height = col.offsetHeight + \'px\';
				numeroCellule++;
				col.style.display = \'none\';
			}
		}
	}
	document.getElementById("tdUser_0").style.display = \'none\';
}
'; ?>


</script>
<script type="text/javascript">
<?php echo '
var displayMode = '; ?>
<?php echo json_encode($this->_tpl_vars['modeAffichage']); ?>
<?php echo ';
var dateDebut = '; ?>
<?php echo json_encode($this->_tpl_vars['dateDebut']); ?>
<?php echo ';
var dateFin = '; ?>
<?php echo json_encode($this->_tpl_vars['dateFin']); ?>
<?php echo ';
var cookieDateDebut = getCookie(\'dateDebut\');
var cookieDateFin = getCookie(\'dateFin\');
if (dateDebut != cookieDateDebut || dateFin != cookieDateFin)  {
	document.cookie=\'dateDebut=\' + dateDebut ;
	document.cookie=\'dateFin=\' + dateFin ;
	document.cookie=\'xposMoisWin=0\';
	document.cookie=\'xposMois=0\';
	document.cookie=\'xposJoursWin=0\';
	document.cookie=\'xposJours=0\';
}

function writeCookie(displayMode){
	if (displayMode == \'mois\'){
		document.cookie=\'yposMois=\' + window.pageYOffset;
		document.cookie=\'xposMoisWin=\' + window.pageXOffset;
	}else if (displayMode == \'jour\'){
		document.cookie=\'yposJours=\' + window.pageYOffset;
		document.cookie=\'xposJoursWin=\' + window.pageXOffset;
	}
}

if (displayMode == \'mois\'){
var xscroll = getCookie(\'xposMois\');
var xscrollWin = getCookie(\'xposMoisWin\');
var yscroll = getCookie(\'yposMois\');
window.onscroll = function() {writeCookie(displayMode)};
}else if (displayMode == \'jour\'){
var xscroll = getCookie(\'xposJours\');
var xscrollWin = getCookie(\'xposJoursWin\');
var yscroll = getCookie(\'yposJours\');
window.onscroll = function() {writeCookie(displayMode)};
}
'; ?>

</script>
<script type="text/javascript">
<?php echo '
function chargerScrollHaut(){
	document.getElementById(\'divScrollHaut\').style.width = document.body.offsetWidth - 85 - document.getElementById(\'tdUserCopie_0\').offsetWidth + \'px\';
	document.getElementById(\'divScrollHautInterne\').style.width = jQuery(\'#tabContenuPlanning\').width() + \'px\';
	
	jQuery("#divScrollHaut").scroll(function(){
		jQuery("#divConteneurPlanning").scrollLeft(jQuery("#divScrollHaut").scrollLeft());
	});
	jQuery("#divConteneurPlanning").scroll(function(){
		jQuery("#divScrollHaut").scrollLeft(jQuery("#divConteneurPlanning").scrollLeft());
	});
}
'; ?>

</script>
<script type="text/javascript">
<?php echo '
addEvent(window, \'load\', copierTableauPersonnes);
addEvent(window, \'load\', chargerScrollHaut);
addEvent(window, \'load\', chargerScrollPos);
Reloader.init('; ?>
<?php echo @CONFIG_REFRESH_TIMER; ?>
<?php echo ');
'; ?>

var js_choisirProjet = '<?php echo ((is_array($_tmp=$this->_config[0]['vars']['js_choisirProjet'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
var js_choisirUtilisateur = '<?php echo ((is_array($_tmp=$this->_config[0]['vars']['js_choisirUtilisateur'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
var js_choisirDateDebut = '<?php echo ((is_array($_tmp=$this->_config[0]['vars']['js_choisirDateDebut'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
var js_saisirFormatDate = '<?php echo ((is_array($_tmp=$this->_config[0]['vars']['js_saisirFormatDate'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
var js_dateFinInferieure = '<?php echo ((is_array($_tmp=$this->_config[0]['vars']['js_dateFinInferieure'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
var js_deposerCaseSurDate = '<?php echo ((is_array($_tmp=$this->_config[0]['vars']['js_deposerCaseSurDate'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
var js_deplacementOk = '<?php echo ((is_array($_tmp=$this->_config[0]['vars']['js_deplacementOk'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
var js_patienter = '<?php echo ((is_array($_tmp=$this->_config[0]['vars']['js_patienter'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
</script>
		<script type="text/javascript">
						<?php echo '
			jQuery(function() {
				jQuery( "div.cellProject" ).mouseout(function(){nd();});
				jQuery( "div.cellProject" ).click(function( event ){
				event.stopPropagation();
				 var id=this.id;
				 idtab=id.split(\'_\');
				 var periode=idtab[1];
				 // Formulaire ajout periode
				 modifPeriode(this, periode);
				});
			'; ?>

			<?php if (isset ( $this->_tpl_vars['droitAjoutPeriode'] ) && $this->_tpl_vars['droitAjoutPeriode'] == true): ?>
			<?php echo '			
				jQuery("td.week,td.weekend").on("click",(function(){
				 var id=this.id;
				 idtab=id.split(\'_\');
				 var projet=idtab[1];
				 var annee=idtab[2].substring(0, 4);
				 var mois=idtab[2].substring(4, 6);
				 var jour=idtab[2].substring(6, 8);
				 var datedebut=annee+\'-\'+mois+\'-\'+jour;
				 // Arret du refresh
				 Reloader.stopRefresh();
				 // Formulaire ajout periode
				 if (idtab[3] == null)
				 {
				 xajax_ajoutPeriode(datedebut, projet);
				 }else xajax_ajoutPeriode(datedebut, projet,\'\',idtab[3]);
				}));
			'; ?>

			<?php endif; ?>
			<?php echo '			
				});
			'; ?>

		</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "www_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>