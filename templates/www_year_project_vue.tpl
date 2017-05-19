<table class='planning_year'>
  <colgroup>
    {foreach from=$TabData.ColWidth item=Col}
    <col width='{$Col}px' />
    {/foreach}
  </colgroup>
  {* Table year recap Header *}
  <tr>
    <th class="planning_head_title" colspan="15">{$TabData.Title}</th>
  </tr>
  {* Display year *}
  <tr>
    <th colspan="3" class="planning_head_month"></th>
    {foreach from=$TabData.Years item=Year}
    {if $Year.Number!= 0}<th class="planning_head_year" colspan="{$Year.Number}">{$Year.Display}</th>{/if}{/foreach}
  </tr>
  {* Display Months *}
  <tr>
    <td colspan="3" class="planning_head_month"></td>
  {foreach from=$TabData.Months item=Month}
    <td class="planning_head_year">{$Month}</td>
  {/foreach}
  </tr>
  {* Display available ressources *}
  <tr>
    <td colspan="3" class="planning_col_year_group">Ressources Employables</td>
  {foreach from=$TabData.Months item=Month}
    <td></td>
  {/foreach}
  </tr>
{foreach from=$TabData.Users item=User name=usrForEach}
  <tr>
    <td></td><td></td><td class="planning_col_year_user" style='background-color: #{$User.Color};'>{$User.Name}</td>
  {foreach from=$User.Available item=Available}
    <td class="planning_col_year_data">{if $Available > 0 }{$Available} j{/if}</td>
  {/foreach}
  </tr>
{/foreach}  
{* Empty line *}
  <tr>
    <td>&nbsp;</td><td></td><td></td>{foreach from=$TabData.Months item=Month}<td></td>{/foreach}
  </tr>
{* Les projets *}
  <tr>
    <td colspan='3' class='planning_col_year_group'>Projets</td>{foreach from=$TabData.Months item=Month}<td></td>{/foreach}
  </tr>
  
{* Affiche les projets *}
{foreach from=$TabData.Projects item=Project name=prjForEach}
  <tr>
    <td ></td>
    <td colspan="2" class="planning_col_year_project{if $Project.Priority == 1} project_alert{/if}">{$Project.Name}{if $Project.Priority == 1} - Prioritaire{/if}</td>
    {foreach from=$TabData.Months item=Month}<td></td>{/foreach}
  </tr>
  {foreach from=$Project.Users item=User}
        <tr>
          <td></td>
          <td></td>
          <td class="planning_col_year_user" style='background-color: #{$User.Color};'>{$User.Name}</td>
          {foreach from=$User.Use item=Use}
            <td class="planning_col_year_data{if $Project.Priority == 1} project_alert{/if}">{if $Use > 0 }{$Use} j{/if}</td>  
          {/foreach}
        </tr>
        <tr>
  {/foreach}
{/foreach}

{* Affiche les Totaux *}
        <tr>
          <td ></td>
          <td colspan="2" class="planning_col_year_project">Totaux</td>
          {foreach from=$TabData.Months item=Month}<td></td>{/foreach}
        </tr>
        
      {foreach from=$TabData.Users item=User}
        <tr>
          <td></td>
          <td></td>
          <td class="planning_col_year_user_inv" style='background-color: #{$User.Color};'>{$User.Name}</td>
          {foreach from=$User.MaxUse item=MaxUse name=fUse}<td class="planning_col_year_data_inv
                {if $User.MaxUse[$smarty.foreach.fUse.index] > $User.Available[$smarty.foreach.fUse.index]} project_alert{/if}">{if $MaxUse > 0 }{$MaxUse} j{/if}</td>{/foreach}
        </tr>
      {/foreach}

{* Empty line *}
  <tr>
    <td>&nbsp;</td><td></td><td></td>{foreach from=$TabData.Months item=Month}<td></td>{/foreach}
  </tr>

  <tr>
    <td colspan="3" class="planning_col_year_group">Disponible pour devis</td>
    {foreach from=$TabData.Months item=Month}<td></td>{/foreach}
  </tr>
  {foreach from=$TabData.Users item=User}
  <tr>
    <td></td><td></td><td class="planning_col_year_user" style='background-color: #{$User.Color};'>{$User.Name}</td>
    {foreach from=$User.Remain item=Remain}<td class="planning_col_year_data{if $Remain < 0 } project_alert{/if}">{if $Remain != 0 }{$Remain} j{/if}</td>{/foreach}
  </tr>
  {/foreach} 
</table>
<!-- 
{$Debug}
-->