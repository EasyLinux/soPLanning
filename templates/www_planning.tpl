{* Smarty *}
{include file="www_header.tpl"}
<div class="container-fluid">
	<div class="row noprint">
		<div class="col-md-12">
    {include file="planning/choix_date.tpl"}
		</div>
	</div>
	<script type="text/javascript">
	{literal}
	// hack pour empecher fermeture du layer au click sur les boutons du calendrier
	jQuery(document).on('click', function(e) {
		if (!jQuery(e.target).hasClass('ui-datpicker-next') || !jQuery(e.target).hasClass('ui-datpicker-prev')) {
			e.stopImmediatePropagation();
		}
	});
	jQuery('#dropdownDateSelector .dropdown-menu').on({
			"click":function(e){
			  e.stopPropagation();
			}
		});
	{/literal}
	</script>

	<div class="row noprint">
		<div class="col-md-12">
      {include file="planning/choix_user.tpl"}
		</div>
	</div>
<hr />
Planning
<hr />
	{* le planning *}  
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
										<td class="text-center"><br /><br />{#loading#}<br /><br /><br /></td>
									</tr>
								</tbody>
							</table>
						</td>
						<td>
							{if $affichageLarge eq 1}
								<div id="divScrollHautInterne"></div>
							{else}
								<div id="divScrollHaut">
									<div id="divScrollHautInterne"></div>
								</div>
							{/if}
							<div id="divConteneurPlanning" {if $affichageLarge eq 0}style="width:700px; overflow-x:scroll"{/if}{if $modeAffichage eq "mois"} onscroll="document.cookie='xposMois=' + document.getElementById('divConteneurPlanning').scrollLeft;"{else}onscroll="document.cookie='xposJours=' + document.getElementById('divConteneurPlanning').scrollLeft;"{/if}>
								{$htmlTableau}
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
					{* PAGINATION *}
					{if $nbPagesLignes > 1}
						<div class="btn-group">
							<ul class="pagination pagination-sm">
							{section loop=$nbPagesLignes name=loopPages}
								{if $pageLignes eq $smarty.section.loopPages.iteration}
									<li class="active"><a href="#">{$smarty.section.loopPages.iteration}</a></li>
									{else}
									<li><a href="{$BASE}/process/planning.php?page_lignes={$smarty.section.loopPages.iteration}">{$smarty.section.loopPages.iteration}</a></li>
									{/if}
									{if !$smarty.section.loopPages.last}
									{/if}
								{/section}
							</ul>
						</div>
					{/if}
					<div class="btn-group">
						<a class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown" href="#">{$nbLignes} {#planning_nbLignes#} <span class="caret"></span></a>
						{assign var=tabPages value=","|explode:$smarty.const.CONFIG_PLANNING_PAGES}
						<ul class="dropdown-menu">
							{foreach from=$tabPages item=valTemp}
							<li>
								<a onClick="top.location='{$BASE}/process/planning.php?nb_lignes=+{$valTemp}'">{$valTemp} {#planning_nbLignes#}</a>
							</li>
							{/foreach}
						</ul>
					</div>
					<div class="btn-group">
						<a class="btn dropdown-toggle btn-sm {if $masquerLigneVide eq 1}btn-danger{else}btn-default{/if}" data-toggle="dropdown" href="#">{#planning_masquerLignesVides#} <span class="caret"></span></a>
						<ul class="dropdown-menu">
							 {if $masquerLigneVide eq 1}
							<li>
								<a onClick="top.location='process/planning.php?masquerLigneVide=0'">{#planning_masquerLignesVides_non#}</a>
							</li>
							 {else}
							<li>
								<a onClick="top.location='process/planning.php?masquerLigneVide=1'">{#planning_masquerLignesVides_oui#}</a>
							</li>
							{/if}
						</ul>
					</div>
					<div class="btn-group">
						<a class="btn dropdown-toggle btn-sm {if $afficherLigneTotal eq 1}btn-danger{else}btn-default{/if}" data-toggle="dropdown" href="#">{#planning_afficherLigneTotal#} <span class="caret"></span></a>
						<ul class="dropdown-menu">
							 {if $afficherLigneTotal eq 1}
							<li>
								<a onClick="top.location='process/planning.php?afficherLigneTotal=0'">{#non#}</a>
							</li>
							 {else}
							<li>
								<a onClick="top.location='process/planning.php?afficherLigneTotal=1'">{#oui#}</a>
							</li>
							{/if}
						</ul>
					</div>
					<div class="btn-group">
						<a class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown"  onclick="javascript:toggle2('divProjectTable');" >{#hide_show_table#}</a>
					</div>
					{* PAGINATION *}
			</div>
		</div>
	</div>
	<div class="row noprint">
		<div class="col-md-12">
			<div class="soplanning-box" id="divPlanningRecap">
				{$htmlRecap}
			</div>
		</div>
	</div>
</div>

{* GESTION DU DRAG N DROP *}
{literal}
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

{/literal}
{$js}
{literal}

</script>
{/literal}
{* FIN GESTION DU DRAG N DROP *}
{* JAVASCRIPT POUR CHOIX FILTRE PROJETS *}
<script type="text/javascript">
var listeProjets = new Array();
listeProjets[0] = new Array();
{assign var=groupeTemp value=""}
{foreach from=$listeProjets item=projetCourant}
	{if $projetCourant.groupe_id neq $groupeTemp}
		listeProjets[{$projetCourant.groupe_id}] = new Array();
	{/if}
	{if $projetCourant.groupe_id eq ''}
		listeProjets[0].push('{$projetCourant.projet_id}');
	{else}
		listeProjets[{$projetCourant.groupe_id}].push('{$projetCourant.projet_id}');
	{/if}
	{assign var=groupeTemp value=$projetCourant.groupe_id}
{/foreach}

{literal}
// coche ou decoche tous les projets
function filtreGroupeProjetCocheTous(action) {
	for (var groupe in listeProjets) {
		if (!document.getElementById('g' + groupe)) {
			// si pas une case ? cocher existantes, on sort
			continue;
		}
		document.getElementById('g' + groupe).checked = action;
		for (var projet in listeProjets[groupe]) {
			if (!document.getElementById('projet_' + listeProjets[groupe][projet])) {
				// si pas une case ? cocher existantes, on sort
				continue;
			}
			document.getElementById('projet_' + listeProjets[groupe][projet]).checked = action;
		}
	}
}

// coche ou decoche les projets d'un groupe
function filtreCocheGroupe(groupe) {
	var action = document.getElementById('g' + groupe).checked;
	for (var projet in listeProjets[groupe]) {
		if (!document.getElementById('projet_' + listeProjets[groupe][projet])) {
			// si pas une case ? cocher existantes, on sort
			continue;
		}
		document.getElementById('projet_' + listeProjets[groupe][projet]).checked = action;
	}
}

// decoche le groupe si on decoche un projet
function checkStatutGroupe(obj, groupe) {
	if (groupe == '') {
		groupe = '0';
	}
	if (!obj.checked) {
		document.getElementById('g' + groupe).checked = false;
	}
}

{/literal}
</script>
{* FIN JAVASCRIPT POUR CHOIX FILTRE PROJETS *}

{* MENU POUR CHOIX ACTION APRES DRAG AND DROP CASE *}
<script type="text/javascript">
	var idCaseEnCoursDeplacement = false;
	var idCaseDestination = false;
</script>

<div id="divChoixDragNDrop" onMouseOut="masquerSousMenuDelai('divChoixDragNDrop');" onMouseOver="AnnuleMasquerSousMenu('divChoixDragNDrop');" onfocus="AnnuleMasquerSousMenu('divChoixDragNDrop')">
	<a href="javascript:windowPatienter();xajax_moveCasePeriode(idCaseEnCoursDeplacement, destination, false);undefined;">{#planning_deplacer#}</a>
	<br /><br />
	<a href="javascript:windowPatienter();xajax_moveCasePeriode(idCaseEnCoursDeplacement, destination, true);undefined;">{#planning_copier#}</a>
	<br /><br />
	<a href="javascript:location.reload();undefined;">{#planning_annuler#}</a>
</div>

{* JAVASCRIPT POUR CHOIX FILTRE USERS *}
<script type="text/javascript">
var listeUsers = new Array();
listeUsers[0] = new Array();
{assign var=groupeTemp value=""}
{foreach from=$listeUsers item=userCourant}
	{if $userCourant.user_groupe_id neq $groupeTemp}
		listeUsers[{$userCourant.user_groupe_id}] = new Array();
	{/if}
	{if $userCourant.user_groupe_id eq ''}
		listeUsers[0].push('{$userCourant.user_id}');
	{else}
		listeUsers[{$userCourant.user_groupe_id}].push('{$userCourant.user_id}');
	{/if}
	{assign var=groupeTemp value=$userCourant.user_groupe_id}
{/foreach}


{literal}
// coche ou decoche tous les Users
function filtreUserCocheTous(action) {
	for (var groupe in listeUsers) {
		if (!document.getElementById('gu' + groupe)) {
			// si pas une case ? cocher existantes, on sort
			continue;
		}
		document.getElementById('gu' + groupe).checked = action;
		for (var user in listeUsers[groupe]) {
			if (!document.getElementById('user_' + listeUsers[groupe][user])) {
				// si pas une case ? cocher existantes, on sort
				continue;
			}
			document.getElementById('user_' + listeUsers[groupe][user]).checked = action;
		}
	}
}

// coche ou decoche les users d'un groupe
function filtreCocheUserGroupe(groupe) {
	var action = document.getElementById('gu' + groupe).checked;
	for (var user in listeUsers[groupe]) {
		if (!document.getElementById('user_' + listeUsers[groupe][user])) {
			// si pas une case ? cocher existantes, on sort
			continue;
		}
		document.getElementById('user_' + listeUsers[groupe][user]).checked = action;
	}
}



function CocheDecocheTout(ref, name) {
	var elements = document.getElementsByTagName('input');
 
	for (var i = 0; i < elements.length; i++) {
		if (elements[i].type == 'checkbox' && elements[i].name == name) {
			elements[i].checked = ref;
		}
	}
}

// coche ou decoche les cases d'un filtre avancé
function filtreCocheAvancesGroupe(statut) {
CocheDecocheTout(statut,"statutsTache[]");
CocheDecocheTout(statut,"statutsProjet[]");
CocheDecocheTout(statut,"lieu[]");
CocheDecocheTout(statut,"ressource[]");
}

// decoche le groupe si on decoche un user
function checkStatutUserGroupe(obj, groupe) {
	if (groupe == '') {
		groupe = '0';
	}
	if (!obj.checked) {
		document.getElementById('gu' + groupe).checked = false;
	}
}
{/literal}
</script>
{* FIN JAVASCRIPT POUR CHOIX FILTRE USERS *}
{* FONCTION POUR COPIER LE TABLEAU DES PERSONNES *}
<script type="text/javascript">
{literal}
function copierTableauPersonnes () {
	document.getElementById('loadingPeople').style.display = 'none';
	// size div to window width
	document.getElementById('divConteneurPlanning').style.width = document.body.offsetWidth - 110 - document.getElementById('tdUser_0').offsetWidth + 'px';
	// copy first cell (link to switch view)
	trTemp = document.createElement("tr");
	thTemp = document.createElement("th");
	thTemp.setAttribute('id', 'tdUserCopie_0');
	trTemp.appendChild(thTemp);
	document.getElementById('bodyPeople').appendChild(trTemp);
	document.getElementById('tdUserCopie_0').style.height = document.getElementById('tdUser_0').offsetHeight + 'px';
	document.getElementById('tdUserCopie_0').innerHTML = '<div class="text-center"><a class="linkSwitchView" id="lienInverse" href="process/planning.php?inverserUsersProjets={/literal}{if $inverserUsersProjets eq 0}1{else}0{/if}{literal}"><img src="assets/img/pictos/switch.png" alt="" /></a></div>';

	var table = document.getElementById("tabContenuPlanning");
	numeroCellule = 1;
	for (var i = {/literal}{if $modeAffichage eq "mois"}4{else}2{/if}{literal}, row; row = table.rows[i]; i++) {
		for (var j = 0, col; col = row.cells[j]; j++) {
			if (j == 0) {
				thACopier = col.cloneNode(true);
				thACopier.setAttribute('id', 'tdUserCopie_' + numeroCellule);
				trTemp = document.createElement("tr");
				trTemp.appendChild(thACopier);
				document.getElementById('bodyPeople').appendChild(trTemp);
				document.getElementById('tdUserCopie_' + numeroCellule).style.height = col.offsetHeight + 'px';
				numeroCellule++;
				col.style.display = 'none';
			}
		}
	}
	document.getElementById("tdUser_0").style.display = 'none';
}
{/literal}

</script>
{* FONCTION POUR COPIER LE TABLEAU DES PERSONNES *}
<script type="text/javascript">
{literal}
var displayMode = {/literal}{$modeAffichage|@json_encode}{literal};
var dateDebut = {/literal}{$dateDebut|@json_encode}{literal};
var dateFin = {/literal}{$dateFin|@json_encode}{literal};
var cookieDateDebut = getCookie('dateDebut');
var cookieDateFin = getCookie('dateFin');
if (dateDebut != cookieDateDebut || dateFin != cookieDateFin)  {
	document.cookie='dateDebut=' + dateDebut ;
	document.cookie='dateFin=' + dateFin ;
	document.cookie='xposMoisWin=0';
	document.cookie='xposMois=0';
	document.cookie='xposJoursWin=0';
	document.cookie='xposJours=0';
}

function writeCookie(displayMode){
	if (displayMode == 'mois'){
		document.cookie='yposMois=' + window.pageYOffset;
		document.cookie='xposMoisWin=' + window.pageXOffset;
	}else if (displayMode == 'jour'){
		document.cookie='yposJours=' + window.pageYOffset;
		document.cookie='xposJoursWin=' + window.pageXOffset;
	}
}

if (displayMode == 'mois'){
var xscroll = getCookie('xposMois');
var xscrollWin = getCookie('xposMoisWin');
var yscroll = getCookie('yposMois');
window.onscroll = function() {writeCookie(displayMode)};
}else if (displayMode == 'jour'){
var xscroll = getCookie('xposJours');
var xscrollWin = getCookie('xposJoursWin');
var yscroll = getCookie('yposJours');
window.onscroll = function() {writeCookie(displayMode)};
}
{/literal}
</script>
{* SCROLLBAR EN HAUT DU PLANNING *}
<script type="text/javascript">
{literal}
function chargerScrollHaut(){
	document.getElementById('divScrollHaut').style.width = document.body.offsetWidth - 85 - document.getElementById('tdUserCopie_0').offsetWidth + 'px';
	document.getElementById('divScrollHautInterne').style.width = jQuery('#tabContenuPlanning').width() + 'px';
	
	jQuery("#divScrollHaut").scroll(function(){
		jQuery("#divConteneurPlanning").scrollLeft(jQuery("#divScrollHaut").scrollLeft());
	});
	jQuery("#divConteneurPlanning").scroll(function(){
		jQuery("#divScrollHaut").scrollLeft(jQuery("#divConteneurPlanning").scrollLeft());
	});
}
{/literal}
</script>
<script type="text/javascript">
{literal}
addEvent(window, 'load', copierTableauPersonnes);
addEvent(window, 'load', chargerScrollHaut);
addEvent(window, 'load', chargerScrollPos);
Reloader.init({/literal}{$smarty.const.CONFIG_REFRESH_TIMER}{literal});
{/literal}
{* textes pour erreur dans fichier JS *}
var js_choisirProjet = '{#js_choisirProjet#|escape:"javascript"}';
var js_choisirUtilisateur = '{#js_choisirUtilisateur#|escape:"javascript"}';
var js_choisirDateDebut = '{#js_choisirDateDebut#|escape:"javascript"}';
var js_saisirFormatDate = '{#js_saisirFormatDate#|escape:"javascript"}';
var js_dateFinInferieure = '{#js_dateFinInferieure#|escape:"javascript"}';
var js_deposerCaseSurDate = '{#js_deposerCaseSurDate#|escape:"javascript"}';
var js_deplacementOk = '{#js_deplacementOk#|escape:"javascript"}';
var js_patienter = '{#js_patienter#|escape:"javascript"}';
</script>
		<script type="text/javascript">
			{* initialisation de toutes les fonctions importantes *}
			{literal}
			jQuery(function() {
				jQuery( "div.cellProject" ).mouseout(function(){nd();});
				jQuery( "div.cellProject" ).click(function( event ){
				event.stopPropagation();
				 var id=this.id;
				 idtab=id.split('_');
				 var periode=idtab[1];
				 // Formulaire ajout periode
				 modifPeriode(this, periode);
				});
			{/literal}
			{if isset($droitAjoutPeriode) and $droitAjoutPeriode== true}
			{literal}			
				jQuery("td.week,td.weekend").on("click",(function(){
				 var id=this.id;
				 idtab=id.split('_');
				 var projet=idtab[1];
				 var annee=idtab[2].substring(0, 4);
				 var mois=idtab[2].substring(4, 6);
				 var jour=idtab[2].substring(6, 8);
				 var datedebut=annee+'-'+mois+'-'+jour;
				 // Arret du refresh
				 Reloader.stopRefresh();
				 // Formulaire ajout periode
				 if (idtab[3] == null)
				 {
				 xajax_ajoutPeriode(datedebut, projet);
				 }else xajax_ajoutPeriode(datedebut, projet,'',idtab[3]);
				}));
			{/literal}
			{/if}
			{literal}			
				});
			{/literal}
		</script>
{include file="www_footer.tpl"}