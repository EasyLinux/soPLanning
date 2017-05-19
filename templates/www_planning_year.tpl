{* Smarty *}
{include file="www_header.tpl"}
<div class="container-fluid">
	<div class="row noprint">
		<div class="col-md-12">
			<div class="soplanning-box" id="divPlanningDateSelector">
					{* DIV POUR CHOIX DATE *}
					<div class="btn-group" id="dropdownDateSelector">
            <select id='StartMonth' name='StartMonth' onchange="window.location='planning_year.php?YearMonth='+this.value;">
              {foreach from=$TabData.YearMonths item=Month name=Ym}
                <option value='{$Month.id}'{if $smarty.foreach.Ym.index == 2}selected='selected'{/if}>{$Month.text}</option>
              {/foreach}
            </select>
					</div> 
					{* DIV POUR CHOIX VUE JOUR MOIS *}
					<div class="btn-group">
						<a class="btn btn-info btn-sm" href="planning.php">{#menuPlanningMois#}</a>
					</div>

			</div>
		</div>
	</div>
              
{* le planning *}  
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box" id="divPlanning">
        {include file='www_year_project_vue.tpl'}
			</div>
		</div>
	</div>
	<div class="row noprint">
		<div class="col-md-12">
			<div class="soplanning-box" id="divPlanningRecap">
        {include file='www_year_capacity.tpl'}
			</div>
		</div>
	</div> 
</div>

{include file="www_footer.tpl"}