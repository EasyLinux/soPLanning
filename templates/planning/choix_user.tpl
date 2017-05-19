			<div class="soplanning-box form-inline" id="divPlanningMainFilter">
					{* DIV POUR CHOIX FILTRE USERS *}
					<div class="btn-group">
						<form action="process/planning.php" method="POST">
						<button class="btn {if $filtreUser|@count > 0}btn-danger{else}btn-default{/if} dropdown-toggle btn-sm" data-toggle="dropdown">{#formChoixUser#}&nbsp;<span class="caret"></span></button>
						<ul class="dropdown-menu">
							{if $filtreUser|@count > 0}
			                    <a href="process/planning.php?desactiverFiltreUser=1" class="btn btn-danger btn-sm margin-left-10">{#formFiltreUserDesactiver#}</a>
							{/if}
							<li><a onClick="event.cancelBubble=true;" href="javascript:filtreUserCocheTous(true);undefined;">{#formFiltreUserCocherTous#}</a></li>
							<li><a onClick="event.cancelBubble=true;" href="javascript:filtreUserCocheTous(false);undefined;">{#formFiltreUserDecocherTous#}</a></li>
							<li class="divider"></li>
							<li>
								<input type="hidden" name="filtreUser" value="1">
								<table onClick="event.cancelBubble=true;" class="margin-10">
									<tr>
										<td class="planningDropdownFilter">
											<div class="form-horizontal col-md-12">
											<label class="checkbox">
												<input type="checkbox" id="gu0" value="1" onClick="filtreCocheUserGroupe('0')" /><b>&nbsp;{#cocheUserSansGroupe#}</b>
											</label>
											{assign var=groupeTemp value=""}
											{math assign=nbColonnes equation="ceil(nbUsers / nbUsersParColonnes)" nbUsers=$listeUsers|@count nbUsersParColonnes=$smarty.const.FILTER_NB_USERS_PER_COLUMN}
											{math assign=maxCol equation="ceil(nbUsers / nbColonnes)" nbUsers=$listeUsers|@count nbColonnes=$nbColonnes}
											{assign var=tmpNbDansColCourante value="0"}
											{foreach from=$listeUsers item=userCourant name=loopUsers}
												{if $tmpNbDansColCourante >= $maxCol}
													{assign var=tmpNbDansColCourante value="0"}
													</td>
													<td class="planningDropdownFilter">
												{else}
													{if $userCourant.user_groupe_id neq $groupeTemp}
														<br />
													{/if}
												{/if}
												{if $userCourant.user_groupe_id neq $groupeTemp}
													<label class="checkbox">
														<input type="checkbox" id="gu{$userCourant.user_groupe_id}" value="1" onClick="filtreCocheUserGroupe('{$userCourant.user_groupe_id}')" /><b>&nbsp;{$userCourant.groupe_nom|escape}</b>
													</label>
												{/if}
												<label class="checkbox">
													<input type="checkbox" id="user_{$userCourant.user_id}" value="{$userCourant.user_id}" name="user_{$userCourant.user_id}" onClick="checkStatutUserGroupe(this, '{$userCourant.user_groupe_id}')" {if in_array($userCourant.user_id, $filtreUser)}checked="checked"{/if} />&nbsp;{$userCourant.nom|escape} ({$userCourant.user_id})
												</label>
												{assign var=groupeTemp value=$userCourant.user_groupe_id}
												{assign var=tmpNbDansColCourante value=$tmpNbDansColCourante+1}
											{/foreach}
											</div>
										</td>
									</tr>
								</table>
							</li>
							<li><input type="submit" value="{#submit#}" class="btn btn-default margin-left-10" /></li>
						</ul>
						</form>
					</div>
					{* DIV POUR CHOIX FILTRE PROJETS *}
					<div class="btn-group">
						<form action="process/planning.php" method="POST">
						<button class="btn {if $filtreGroupeProjet|@count > 0}btn-danger{else}btn-default{/if} dropdown-toggle btn-sm" data-toggle="dropdown">{#formChoixProjet#}&nbsp;<span class="caret"></span></button>
						<ul class="dropdown-menu">
							{if $listeProjets|@count eq 0}
								<li class="margin-left-10">&nbsp;{#formFiltreProjetAucunProjet#}</li>
							{else}
								{if $filtreGroupeProjet|@count > 0}
									<a href="process/planning.php?desactiverFiltreGroupeProjet=1" class="btn btn-danger btn-sm margin-left-10">{#formFiltreProjetDesactiver#}</a>
								{/if}
								<li><a onClick="event.cancelBubble=true;" href="javascript:filtreGroupeProjetCocheTous(true);undefined;">{#formFiltreProjetCocherTous#}</a></li>
								<li><a onClick="event.cancelBubble=true;" href="javascript:filtreGroupeProjetCocheTous(false);undefined;">{#formFiltreProjetDecocherTous#}</a></li>
								<li class="divider"></li>
								<li>
									<input type="hidden" name="filtreGroupeProjet" value="1">
									<table onClick="event.cancelBubble=true;" class="planning-filter">
										<tr>
											<td class="planningDropdownFilter">
											<div class="form-horizontal col-md-12">
												<label class="checkbox">
												<input type="checkbox" id="g0" value="1" onClick="filtreCocheGroupe('0')" /><b>&nbsp;{#projet_liste_sansGroupes#}</b>
												</label>
												{assign var=groupeTemp value=""}
												{math assign=nbColonnes equation="ceil(nbProjets / nbProjetsParColonnes)" nbProjets=$listeProjets|@count nbProjetsParColonnes=$smarty.const.FILTER_NB_PROJECTS_PER_COLUMN}
												{math assign=maxCol equation="ceil(nbProjets / nbColonnes)" nbProjets=$listeProjets|@count nbColonnes=$nbColonnes}
												{assign var=tmpNbDansColCourante value="0"}
												{foreach from=$listeProjets item=projetCourant name=loopProjets}
													{if $tmpNbDansColCourante >= $maxCol}
														{assign var=tmpNbDansColCourante value="0"}
														</td>
														<td class="planningDropdownFilter">
													{else}
														{if $projetCourant.groupe_id neq $groupeTemp}
															<br />
														{/if}
													{/if}
													{if $projetCourant.groupe_id neq $groupeTemp}
														<label class="checkbox">
															<input type="checkbox" id="g{$projetCourant.groupe_id}" value="1" onClick="filtreCocheGroupe('{$projetCourant.groupe_id}')" /> <b>{$projetCourant.groupe_nom}</b>
														</label>
													{/if}
													<label class="checkbox">
														<input type="checkbox" id="projet_{$projetCourant.projet_id}" value="{$projetCourant.projet_id}" name="projet_{$projetCourant.projet_id}" onClick="checkStatutGroupe(this, '{$projetCourant.groupe_id}')" {if in_array($projetCourant.projet_id, $filtreGroupeProjet)}checked="checked"{/if} />&nbsp;{$projetCourant.nom|escape} ({$projetCourant.projet_id})
													</label>
													{assign var=groupeTemp value=$projetCourant.groupe_id}
													{assign var=tmpNbDansColCourante value=$tmpNbDansColCourante+1}
												{/foreach}
											</div>
											</td>
										</tr>
									</table>
								</li>
								<li><input type="submit" value="{#submit#}" class="btn btn-default margin-left-10" /></li>
							{/if}
						</ul>
					</form>
					</div>
					{* DIV POUR CHOIX FILTRE AVANCES *}
					<div class="btn-group">
						<form action="process/planning.php" method="POST">
						<button class="btn {if (($filtreStatutTache|@count > 0) or ($filtreGroupeLieu|@count >0) or ($filtreGroupeRessource|@count >0) or ($filtreStatutProjet|@count >0) ) }btn-danger{else}btn-default{/if} dropdown-toggle btn-sm" data-toggle="dropdown">{#filtres_avances#}&nbsp;<span class="caret"></span></button>
						<ul class="dropdown-menu">
							{if (($filtreStatutTache|@count > 0) or ($filtreGroupeLieu|@count >0) or ($filtreGroupeRessource|@count >0) or ($filtreStatutProjet|@count >0)  )}<a href="process/planning.php?desactiverFiltreAvances=1" class="btn btn-danger btn-sm margin-left-10">{#formFiltreAvancesDesactiver#}</a>{/if}
							<li><a onClick="event.cancelBubble=true;" href="javascript:filtreCocheAvancesGroupe(true);undefined;">{#formFiltreUserCocherTous#}</a></li>
							<li><a onClick="event.cancelBubble=true;" href="javascript:filtreCocheAvancesGroupe(false);undefined;">{#formFiltreUserDecocherTous#}</a></li>
							<li class="divider"></li>
							<li>
									<table onClick="event.cancelBubble=true;" class="planning-filter">
										<tr>
											<td class="planningDropdownFilter">
												<input type="hidden" name="filtreStatutTache" value="1">
												<b>{#formChoixStatutTache#}</b><br />
												<div class="form-horizontal col-md-12">
												<label class="checkbox">
													<input type="checkbox" id="statut_a_faire" name="statutsTache[]" value="a_faire" {if in_array('a_faire', $filtreStatutTache)}checked="checked"{/if} />&nbsp;{#winPeriode_statut_a_faire#}	 
												</label>
												<label class="checkbox">
													<input type="checkbox" id="statut_en_cours" name="statutsTache[]" value="en_cours" {if in_array('en_cours', $filtreStatutTache)}checked="checked"{/if} />&nbsp;{#winPeriode_statut_en_cours#}	 
												</label>
												<label class="checkbox">
													<input type="checkbox" id="statut_fait" name="statutsTache[]" value="fait" {if in_array('fait', $filtreStatutTache)}checked="checked"{/if} />&nbsp;{#winPeriode_statut_fait#}	 
												</label>
												<label class="checkbox">
													<input type="checkbox" id="statut_abandon" name="statutsTache[]" value="abandon" {if in_array('abandon', $filtreStatutTache)}checked="checked"{/if} />&nbsp;{#winPeriode_statut_abandon#}	 
												</label>
												</div>
											</td>
											<td class="planningDropdownFilter">
												<input type="hidden" name="filtreStatutProjet" value="1">
												<b>{#formChoixStatutProjet#}</b><br />
												<div class="form-horizontal col-md-12">
												<label class="checkbox">
													<input type="checkbox" id="statut_projet_a_faire" name="statutsProjet[]" value="a_faire" {if in_array('a_faire', $filtreStatutProjet)}checked="checked"{/if} />&nbsp;{#winProjet_statutAFaire#|escape:"html"}<br />
												</label>
												<label class="checkbox">
													<input type="checkbox" id="statut_projet_en_cours" name="statutsProjet[]" value="en_cours" {if in_array('en_cours', $filtreStatutProjet)}checked="checked"{/if} />&nbsp;{#winProjet_statutEnCours#|escape:"html"}<br />
												</label>
												<label class="checkbox">
													<input type="checkbox" id="statut_projet_fait" name="statutsProjet[]" value="fait" {if in_array('fait', $filtreStatutProjet)}checked="checked"{/if} />&nbsp;{#winProjet_statutFait#|escape:"html"}<br />
												</label>
												<label class="checkbox">
													<input type="checkbox" id="statut_projet_abandon" name="statutsProjet[]" value="abandon" {if in_array('abandon', $filtreStatutProjet)}checked="checked"{/if} />&nbsp;{#winProjet_statutAbandon#|escape:"html"}
												</label>
												</div>
											</td>
									{* Filtres avancés emplacement *}
{if $smarty.const.CONFIG_SOPLANNING_OPTION_LIEUX == 1 and ($listeLieux|@count) > 0 }
											<td class="planningDropdownFilter">											<input type="hidden" name="filtreGroupeLieu" value="1">
											<input type="hidden" name="maxGroupeLieu" value="{$listeLieux|@count}">
												<b>{#menuLieux#}</b>												
												<div class="form-horizontal col-md-12">
												{assign var=groupeTemp value=""}
												{math assign=nbColonnes equation="ceil(nbLieux / nbLieuxParColonnes)" nbLieux=$listeLieux|@count nbLieuxParColonnes=$smarty.const.FILTER_NB_AERA_PER_COLUMN}
												{math assign=maxCol equation="ceil(nbLieux / nbColonnes)" nbLieux=$listeLieux|@count nbColonnes=$nbColonnes}
												{assign var=tmpNbDansColCourante value="0"}
												{foreach from=$listeLieux item=lieuCourant name=loopLieux}
													{if $tmpNbDansColCourante >= $maxCol}
														{assign var=tmpNbDansColCourante value="0"}
														</td>
											<td class="planningDropdownFilter">
													{/if}
													<label class="checkbox">
														<input type="checkbox" id="lieu_{$lieuCourant.lieu_id}" name="lieu[]" value="{$lieuCourant.lieu_id}" {if in_array($lieuCourant.lieu_id, $filtreGroupeLieu)}checked="checked"{/if} /> {$lieuCourant.nom|escape}
													</label>	
													{assign var=tmpNbDansColCourante value=$tmpNbDansColCourante+1}
												{/foreach}
												</div>
											</td>
									{/if}
									{* Filtres avancés ressources *}
									{if $smarty.const.CONFIG_SOPLANNING_OPTION_RESSOURCES == 1 and ($listeRessources|@count) > 0 }									
											<td class="planningDropdownFilter">
											<input type="hidden" name="maxGroupeRessource" value="{$listeRessources|@count}">
											<input type="hidden" name="filtreGroupeRessource" value="1">
												<b>{#menuRessources#}</b>												
												<div class="form-horizontal col-md-12">
												{assign var=groupeTemp value=""}
												{math assign=nbColonnes equation="ceil(nbRessources / nbRessourcesParColonnes)" nbRessources=$listeRessources|@count nbRessourcesParColonnes=$smarty.const.FILTER_NB_RESSOURCES_PER_COLUMN}
												{math assign=maxCol equation="ceil(nbRessources / nbColonnes)" nbRessources=$listeRessources|@count nbColonnes=$nbColonnes}
												{assign var=tmpNbDansColCourante value="0"}
												{foreach from=$listeRessources item=ressourceCourant name=loopRessources}
													{if $tmpNbDansColCourante >= $maxCol}
														{assign var=tmpNbDansColCourante value="0"}
														</td>
														<td class="planningDropdownFilter">
													{/if}
													<label class="checkbox">
														<input type="checkbox" id="ressource_{$ressourceCourant.ressource_id}" value="{$ressourceCourant.ressource_id}" name="ressource[]" {if in_array($ressourceCourant.ressource_id, $filtreGroupeRessource)}checked="checked"{/if} /> {$ressourceCourant.nom|escape}
													</label>
													{assign var=tmpNbDansColCourante value=$tmpNbDansColCourante+1}
												{/foreach}
												</div>
											</td>
									{/if}
										</tr>
									</table>
							</li>
							<li><input type="submit" value="{#submit#}" class="btn btn-default margin-left-10" /></li>
						</ul>
						</form>
					</div>
					{* DIV POUR TRI AFFICHAGE *}
					<div class="btn-group">
						<button class="btn dropdown-toggle btn-sm btn-default" data-toggle="dropdown">{#formTrierPar#}&nbsp;<span class="caret"></span></button>
						<ul class="dropdown-menu">
							{if $inverserUsersProjets}
								{foreach from=$triPlanningPossibleProjet item=triTemp}
									{assign var=chaineTmp value="triProjet_"|cat:$triTemp|replace:' ':'_'|replace:',':'_'}
									<li {if $triTemp eq $triPlanning}class="active"{/if}><a href="process/planning.php?triPlanning={$triTemp|urlencode}">{$smarty.config.$chaineTmp}</a></li>
								{/foreach}
							{else}
								{foreach from=$triPlanningPossibleUser item=triTemp}
									{assign var=chaineTmp value="triUser_"|cat:$triTemp|replace:' ':'_'|replace:',':'_'}
									<li {if $triTemp eq $triPlanning}class="active"{/if}><a href="process/planning.php?triPlanning={$triTemp|urlencode}">{$smarty.config.$chaineTmp}</a></li>
								{/foreach}
							{/if}
						</ul>
					</div>
					{* DIV POUR CHOIX EXPORT *}
					<div class="btn-group">
						<button class="btn dropdown-toggle btn-sm btn-default" data-toggle="dropdown">{#choix_export#}&nbsp;<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="javascript:window.print();"><img align="absbottom" src="assets/img/pictos/printButton.png" alt='' /> {#printAll#|escape}</a></li>
							<li><a href="export_csv.php"><img align="absbottom" src="assets/img/pictos/CSVIcon.gif" alt='' /> {#CSVExport#|escape}</a></li>
							<li><a href="javascript:xajax_choixPDF();undefined;"><img align="absbottom" src="assets/img/pictos/pdf.png" alt='' /> {#PDFExport#|escape}</a></li>
							<li><a href="export_xls.php" target="_blank"><img align="absbottom" src="assets/img/pictos/xls.png" alt='' /> {#xlsExport#|escape}</a></li>
							<li><a href="export_gantt.php" target="_blank"><img align="absbottom" src="assets/img/pictos/gantt.png" alt='' /> {#ganttExport#|escape}</a></li>
							<li><a href="export_pdf_calendrier.php" target="_blank"><img align="absbottom" src="assets/img/pictos/calendar.png" alt='' /> {#calendarExport#|escape}</a></li>
							<li><a href="javascript:xajax_choixIcal();undefined;"><img align="absbottom" src="assets/img/pictos/ical.png" alt='' /> {#icalExport#|escape}</a></li>
						</ul>
					</div>
					{* DIV POUR CHOIX DIMENSION CASE ET AFFICHAGE LARGE REDUIT *}
					<div class="btn-group">
						{if $dimensionCase eq "reduit"}
							<a class="btn btn-sm btn-default" title="{#menuPlanningLarge#}" href="process/planning.php?dimensionCase=large"><img class="vmiddle" src="assets/img/pictos/zoomin.png" alt='' /></a>
						{else}
							<a class="btn btn-sm btn-default" title="{#menuPlanningReduit#}" href="process/planning.php?dimensionCase=reduit"><img class="vmiddle" src="assets/img/pictos/zoomout.png" alt='' /></a>
						{/if}
						{if $affichageLarge eq 0}
							<a href="?affichageLarge=1" class="btn btn-sm btn-default" title="{#affichageReduit#|escape}"><img class="vmiddle" src="assets/img/pictos/scroll.png" alt='' /></a>
						{else}
							<a href="?affichageLarge=0" class="btn btn-sm btn-default" title="{#affichageEtendu#|escape}"><img class="vmiddle" src="assets/img/pictos/scroll.png" alt='' /></a>
						{/if}
					</div>
					{* DIV POUR RECHERCHE TEXTE *}
					<div class="btn-group">
						<form action="process/planning.php" method="POST">
							<div class="input-group">
								<input type="text" class="form-control input-sm w70" name="filtreTexte" value="{$filtreTexte|escape:"html"}" maxlength="50" title="{#formFiltreTexte#|escape}" id="filtreTexte" />
								<span class="input-group-btn">
									<button type="submit" class="btn btn-sm {if $filtreTexte != ""}btn-danger{else}btn-default{/if}"><i class="glyphicon glyphicon-search"></i></button>
								</span>
								{if $filtreTexte != ""}
									<div class="btn-group">
										<button class="btn dropdown-toggle" data-toggle="dropdown">&nbsp;<span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="process/planning.php?desactiverFiltreTexte=1">{#formFiltreUserDesactiver#}</a></li>
										</ul>
									</div>
								{/if}
							</div>
						</form>
					</div>
					{* DIV POUR CHOIX VUE JOUR MOIS *}
					<div class="btn-group">
							{if $modeAffichage eq "mois"}
								<a class="btn btn-info btn-sm" href="planning_per_day.php">{#menuPlanningJour#}</a>
							{elseif $modeAffichage eq "annee"}
								<a class="btn btn-info btn-sm" href="planning.php">{#menuPlanningMois#}</a>
              {else}
                <a class="btn btn-info btn-sm" href="planning_year.php">{#menuPlanningAnnee#}</a>
							{/if}
					</div>
			</div>
