			<div class="soplanning-box" id="divPlanningDateSelector">
				<form action="process/planning.php" method="GET" class="form-inline" id="formChoixDates">
					<div class="btn-group" id="dropdownDateSelector">
						<button id="buttonDateSelector" class="btn dropdown-toggle btn-sm btn-default bigFontSize" data-toggle="dropdown">{#planning_affichage#} : {$dateDebutTexte} - {$dateFinTexte}&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li>
								<table class="planning-dateselector">
								<tr>
									<td>
										{#formDebut#} :&nbsp;
									</td>
									<td>
										<input name="date_debut_affiche" id="date_debut_affiche" type="text" value="{$dateDebut}" class="form-control datepicker w50"  onChange="$('date_debut_custom').value= '----------------';" />
										<script>{literal}addEvent(window, 'load', function(){jQuery("#date_debut_affiche").datepicker();});{/literal}</script>
										<br>
										<select id="date_debut_custom" class="form-control" name="date_debut_custom" onChange="$('date_debut_affiche').value= '----------------';">
											<option value="">{#raccourci#}...</option>
											<option value="aujourdhui">{#raccourci_aujourdhui#}</option>
											<option value="semaine_derniere">{#raccourci_semaine_derniere#}</option>
											<option value="mois_dernier">{#raccourci_mois_dernier#}</option>
											<option value="debut_semaine">{#raccourci_debut_semaine#}</option>
											<option value="debut_mois">{#raccourci_debut_mois#}</option>
										</select>
									</td>
									<td>
										&nbsp;{#formFin#} :&nbsp;
									</td>
									<td>
										<input name="date_fin_affiche" id="date_fin_affiche" type="text" value="{$dateFin}" class="form-control datepicker"  onChange="$('date_fin_custom').value= '----------------';" />
										<script>{literal}addEvent(window, 'load', function(){jQuery("#date_fin_affiche").datepicker();});{/literal}</script>
										<br>
										<select id="date_fin_custom" name="date_fin_custom" class="form-control" onChange="$('date_fin_affiche').value= '----------------';">
											<option value="">{#raccourci#}...</option>
											<option value="1_semaine">{#raccourci_1_semaine#}</option>
											<option value="2_semaines">{#raccourci_2_semaines#}</option>
											<option value="3_semaines">{#raccourci_3_semaines#}</option>
											<option value="1_mois">{#raccourci_1_mois#}</option>
											<option value="2_mois">{#raccourci_2_mois#}</option>
											<option value="3_mois">{#raccourci_3_mois#}</option>
										</select>
									</td>
									<td>
										<button class="btn btn-sm btn-default margin-left-10 margin-right-10" onClick="$('formChoixDates').submit();">{#planning_afficher#}</button>
									</td>
								</tr>
								</table>
							</li>
						</ul>
					</div>

					<div class="btn-group margin-left-20">
						<a class="btn btn-sm btn-default" onClick="document.location='process/planning.php?raccourci_date=-{$nbJours}';"><i class="glyphicon glyphicon-backward"></i> {$dateBoutonInferieur}</a>
						<a class="btn btn-sm btn-default" onClick="document.location='process/planning.php?raccourci_date=+{$nbJours}';">{$dateBoutonSuperieur} <i class="glyphicon glyphicon-forward"></i></a>
					</div>
					{if !in_array("tasks_readonly", $user.tabDroits)}
						<label class="margin-left-20">
							<a class="btn btn-info btn-sm" href="javascript:Reloader.stopRefresh();xajax_ajoutPeriode();undefined;">
								{if !$smarty.server.HTTP_USER_AGENT|strstr:"MSIE 8.0"}
									<img src="{$BASE}/assets/img/pictos/addplanning.png" alt='' />
								{/if}
								{#menuAjouterPeriode#}
							</a>
						</label>
					{/if}
				</form>
			</div>
