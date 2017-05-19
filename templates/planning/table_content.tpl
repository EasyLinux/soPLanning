<table class="planningContent" id="tabContenuPlanning">
<tbody>
  <tr>
    <th id="tdUser_0" rowspan="4" style="display: none;"></th>
    {foreach from=$tContent.thMonth item=thM}
    <th class="planning_head_month" colspan="{$thM.colspan}">{$thM.name}</th>
    {/foreach}
  </tr>
  <tr>
    {foreach from=$tContent.thWeeks item=thW}
    <th class="planning_head_week" colspan="{$thW.colspan}">{$thW.name}</th>
    {/foreach}
  </tr>
  <tr>
    {foreach from=$tContent.thDayName item=thD}
      <th class="planning_head_dayname {$thD.class}">{$thD.name}</th>
    {/foreach}
  </tr>
  <tr>
    {foreach from=$tContent.thDayNum item=thD}
    <th class="planning_head_dayname {$thD.class}">{$thD.name}</th>
    {/foreach}
  </tr>
  
  
  
  
<!--
<tr>
<th id="tdUser_1" style="background-color: rgb(85, 23, 255); color: rgb(255, 255, 255); display: none;">&nbsp;<span style="color:#FFFFFF">Chantier 1</span>&nbsp;</th>
<td id="td_AI_20170317" class="week">&nbsp;</td>
<td id="td_AI_20170318" class="weekend">&nbsp;</td>
<td id="td_AI_20170319" class="weekend">&nbsp;</td>
<td id="td_AI_20170320" class="week">&nbsp;</td>
<td id="td_AI_20170321" class="week">&nbsp;</td>
<td id="td_AI_20170322" class="week today">&nbsp;</td>
<td id="td_AI_20170323" class="week">&nbsp;</td>
<td id="td_AI_20170324" class="week">&nbsp;</td>
<td id="td_AI_20170325" class="weekend">&nbsp;</td>
<td id="td_AI_20170326" class="weekend">&nbsp;</td>
<td id="td_AI_20170327" class="week">&nbsp;</td>
<td id="td_AI_20170328" class="week">&nbsp;</td>
<td id="td_AI_20170329" class="week">&nbsp;</td>
<td id="td_AI_20170330" class="week">
<div id="c_25_20170330" class="cellProject" onmouseover="cooltip_25()" style="color: rgb(0, 0, 0); background-color: rgb(176, 255, 161); background-image: url(&quot;assets/img/pictos/half.gif&quot;); background-repeat: no-repeat; background-position: left bottom; left: 0px; top: 0px;"><div class="miniCode">5112A</div></div><div id="c_26_20170330" class="cellProject" onmouseover="cooltip_26()" style="color: rgb(0, 0, 0); background-color: rgb(82, 255, 116); background-image: url(&quot;assets/img/pictos/half.gif&quot;); background-repeat: no-repeat; background-position: left bottom; left: 0px; top: 0px;"><div class="miniCode">snoel</div></div><div class="cellEmpty"></div></td>
<td id="td_AI_20170331" class="week">&nbsp;</td>
<td id="td_AI_20170401" class="weekend">&nbsp;</td>
<td id="td_AI_20170402" class="weekend">&nbsp;</td>
<td id="td_AI_20170403" class="week">&nbsp;</td>
<td id="td_AI_20170404" class="week">&nbsp;</td>
<td id="td_AI_20170405" class="week">&nbsp;</td>
<td id="td_AI_20170406" class="week">&nbsp;</td>
<td id="td_AI_20170407" class="week">&nbsp;</td>
<td id="td_AI_20170408" class="weekend">&nbsp;</td>
<td id="td_AI_20170409" class="weekend">&nbsp;</td>
<td id="td_AI_20170410" class="week">&nbsp;</td>
<td id="td_AI_20170411" class="week">&nbsp;</td>
<td id="td_AI_20170412" class="week">&nbsp;</td>
<td id="td_AI_20170413" class="week">&nbsp;</td>
<td id="td_AI_20170414" class="week">&nbsp;</td>
<td id="td_AI_20170415" class="weekend">&nbsp;</td>
<td id="td_AI_20170416" class="weekend">&nbsp;</td>
<td id="td_AI_20170417" class="week">&nbsp;</td>
<td id="td_AI_20170418" class="week">&nbsp;</td>
<td id="td_AI_20170419" class="week">&nbsp;</td>
<td id="td_AI_20170420" class="week">&nbsp;</td>
<td id="td_AI_20170421" class="week">&nbsp;</td>
<td id="td_AI_20170422" class="weekend">&nbsp;</td>
<td id="td_AI_20170423" class="weekend">&nbsp;</td>
<td id="td_AI_20170424" class="week">&nbsp;</td>
<td id="td_AI_20170425" class="week">&nbsp;</td>
<td id="td_AI_20170426" class="week">&nbsp;</td>
<td id="td_AI_20170427" class="week">&nbsp;</td>
<td id="td_AI_20170428" class="week">&nbsp;</td>
<td id="td_AI_20170429" class="weekend">&nbsp;</td>
<td id="td_AI_20170430" class="weekend">&nbsp;</td>
<td id="td_AI_20170501" class="weekend"><div class="cellHolidays" onmouseover="return coolTip('<b>Fête du Travail</b>')" onmouseout="nd()" onclick="event.stopPropagation();">FER.</div>
</td>
<td id="td_AI_20170502" class="week">&nbsp;</td>
<td id="td_AI_20170503" class="week">&nbsp;</td>
<td id="td_AI_20170504" class="week">&nbsp;</td>
<td id="td_AI_20170505" class="week">&nbsp;</td>
<td id="td_AI_20170506" class="weekend">&nbsp;</td>
<td id="td_AI_20170507" class="weekend">&nbsp;</td>
<td id="td_AI_20170508" class="weekend"><div class="cellHolidays" onmouseover="return coolTip('<b>Armistice 1945</b>')" onmouseout="nd()" onclick="event.stopPropagation();">FER.</div>
</td>
<td id="td_AI_20170509" class="week">&nbsp;</td>
<td id="td_AI_20170510" class="week">&nbsp;</td>
<td id="td_AI_20170511" class="week">&nbsp;</td>
<td id="td_AI_20170512" class="week">&nbsp;</td>
<td id="td_AI_20170513" class="weekend">&nbsp;</td>
<td id="td_AI_20170514" class="weekend">&nbsp;</td>
<td id="td_AI_20170515" class="week">&nbsp;</td>
<td id="td_AI_20170516" class="week">&nbsp;</td>
<td id="td_AI_20170517" class="week">&nbsp;</td>
</tr>
<tr>
<th id="tdUser_2" style="background-color: rgb(138, 255, 102); color: rgb(0, 0, 0); display: none;">&nbsp;<span style="color:#000000">Chantier 4</span>&nbsp;</th>
<td id="td_idProjet_20170317" class="week">&nbsp;</td>
<td id="td_idProjet_20170318" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170319" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170320" class="week">&nbsp;</td>
<td id="td_idProjet_20170321" class="week">&nbsp;</td>
<td id="td_idProjet_20170322" class="week today">&nbsp;</td>
<td id="td_idProjet_20170323" class="week">&nbsp;</td>
<td id="td_idProjet_20170324" class="week">&nbsp;</td>
<td id="td_idProjet_20170325" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170326" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170327" class="week">
<div id="c_24_20170327" class="cellProject" onmouseover="cooltip_24()" style="color: rgb(0, 0, 0); background-color: rgb(250, 250, 250); left: 0px; top: 0px;"><div class="miniCode">1529A</div></div><div class="cellEmpty"></div></td>
<td id="td_idProjet_20170328" class="week">
<div id="c_24_20170328" class="cellProject" onmouseover="cooltip_24()" style="color: rgb(0, 0, 0); background-color: rgb(250, 250, 250); left: 0px; top: 0px;"><div class="miniCode">1529A</div></div><div class="cellEmpty"></div></td>
<td id="td_idProjet_20170329" class="week">&nbsp;</td>
<td id="td_idProjet_20170330" class="week">&nbsp;</td>
<td id="td_idProjet_20170331" class="week">&nbsp;</td>
<td id="td_idProjet_20170401" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170402" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170403" class="week">&nbsp;</td>
<td id="td_idProjet_20170404" class="week">&nbsp;</td>
<td id="td_idProjet_20170405" class="week">&nbsp;</td>
<td id="td_idProjet_20170406" class="week">&nbsp;</td>
<td id="td_idProjet_20170407" class="week">&nbsp;</td>
<td id="td_idProjet_20170408" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170409" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170410" class="week">&nbsp;</td>
<td id="td_idProjet_20170411" class="week">&nbsp;</td>
<td id="td_idProjet_20170412" class="week">&nbsp;</td>
<td id="td_idProjet_20170413" class="week">&nbsp;</td>
<td id="td_idProjet_20170414" class="week">&nbsp;</td>
<td id="td_idProjet_20170415" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170416" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170417" class="week">&nbsp;</td>
<td id="td_idProjet_20170418" class="week">&nbsp;</td>
<td id="td_idProjet_20170419" class="week">&nbsp;</td>
<td id="td_idProjet_20170420" class="week">&nbsp;</td>
<td id="td_idProjet_20170421" class="week">&nbsp;</td>
<td id="td_idProjet_20170422" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170423" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170424" class="week">&nbsp;</td>
<td id="td_idProjet_20170425" class="week">&nbsp;</td>
<td id="td_idProjet_20170426" class="week">&nbsp;</td>
<td id="td_idProjet_20170427" class="week">&nbsp;</td>
<td id="td_idProjet_20170428" class="week">&nbsp;</td>
<td id="td_idProjet_20170429" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170430" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170501" class="weekend"><div class="cellHolidays" onmouseover="return coolTip('<b>Fête du Travail</b>')" onmouseout="nd()" onclick="event.stopPropagation();">FER.</div>
</td>
<td id="td_idProjet_20170502" class="week">&nbsp;</td>
<td id="td_idProjet_20170503" class="week">&nbsp;</td>
<td id="td_idProjet_20170504" class="week">&nbsp;</td>
<td id="td_idProjet_20170505" class="week">&nbsp;</td>
<td id="td_idProjet_20170506" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170507" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170508" class="weekend"><div class="cellHolidays" onmouseover="return coolTip('<b>Armistice 1945</b>')" onmouseout="nd()" onclick="event.stopPropagation();">FER.</div>
</td>
<td id="td_idProjet_20170509" class="week">&nbsp;</td>
<td id="td_idProjet_20170510" class="week">&nbsp;</td>
<td id="td_idProjet_20170511" class="week">&nbsp;</td>
<td id="td_idProjet_20170512" class="week">&nbsp;</td>
<td id="td_idProjet_20170513" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170514" class="weekend">&nbsp;</td>
<td id="td_idProjet_20170515" class="week">&nbsp;</td>
<td id="td_idProjet_20170516" class="week">&nbsp;</td>
<td id="td_idProjet_20170517" class="week">&nbsp;</td>
</tr>
<tr>
<th id="tdUser_3" style="background-color: rgb(122, 255, 215); color: rgb(0, 0, 0); display: none;">&nbsp;<span style="color:#000000">Chantier 5</span>&nbsp;</th>
<td id="td_Essai_20170317" class="week">&nbsp;</td>
<td id="td_Essai_20170318" class="weekend">&nbsp;</td>
<td id="td_Essai_20170319" class="weekend">&nbsp;</td>
<td id="td_Essai_20170320" class="week">&nbsp;</td>
<td id="td_Essai_20170321" class="week">&nbsp;</td>
<td id="td_Essai_20170322" class="week today">&nbsp;</td>
<td id="td_Essai_20170323" class="week">&nbsp;</td>
<td id="td_Essai_20170324" class="week">&nbsp;</td>
<td id="td_Essai_20170325" class="weekend">&nbsp;</td>
<td id="td_Essai_20170326" class="weekend">&nbsp;</td>
<td id="td_Essai_20170327" class="week">&nbsp;</td>
<td id="td_Essai_20170328" class="week">&nbsp;</td>
<td id="td_Essai_20170329" class="week">&nbsp;</td>
<td id="td_Essai_20170330" class="week">&nbsp;</td>
<td id="td_Essai_20170331" class="week">&nbsp;</td>
<td id="td_Essai_20170401" class="weekend">&nbsp;</td>
<td id="td_Essai_20170402" class="weekend">&nbsp;</td>
<td id="td_Essai_20170403" class="week">&nbsp;</td>
<td id="td_Essai_20170404" class="week">&nbsp;</td>
<td id="td_Essai_20170405" class="week">&nbsp;</td>
<td id="td_Essai_20170406" class="week">&nbsp;</td>
<td id="td_Essai_20170407" class="week">&nbsp;</td>
<td id="td_Essai_20170408" class="weekend">&nbsp;</td>
<td id="td_Essai_20170409" class="weekend">&nbsp;</td>
<td id="td_Essai_20170410" class="week">&nbsp;</td>
<td id="td_Essai_20170411" class="week">&nbsp;</td>
<td id="td_Essai_20170412" class="week">&nbsp;</td>
<td id="td_Essai_20170413" class="week">&nbsp;</td>
<td id="td_Essai_20170414" class="week">&nbsp;</td>
<td id="td_Essai_20170415" class="weekend">&nbsp;</td>
<td id="td_Essai_20170416" class="weekend">&nbsp;</td>
<td id="td_Essai_20170417" class="week">&nbsp;</td>
<td id="td_Essai_20170418" class="week">&nbsp;</td>
<td id="td_Essai_20170419" class="week">&nbsp;</td>
<td id="td_Essai_20170420" class="week">&nbsp;</td>
<td id="td_Essai_20170421" class="week">&nbsp;</td>
<td id="td_Essai_20170422" class="weekend">&nbsp;</td>
<td id="td_Essai_20170423" class="weekend">&nbsp;</td>
<td id="td_Essai_20170424" class="week">&nbsp;</td>
<td id="td_Essai_20170425" class="week">&nbsp;</td>
<td id="td_Essai_20170426" class="week">&nbsp;</td>
<td id="td_Essai_20170427" class="week">&nbsp;</td>
<td id="td_Essai_20170428" class="week">&nbsp;</td>
<td id="td_Essai_20170429" class="weekend">&nbsp;</td>
<td id="td_Essai_20170430" class="weekend">&nbsp;</td>
<td id="td_Essai_20170501" class="weekend"><div class="cellHolidays" onmouseover="return coolTip('<b>Fête du Travail</b>')" onmouseout="nd()" onclick="event.stopPropagation();">FER.</div>
</td>
<td id="td_Essai_20170502" class="week">&nbsp;</td>
<td id="td_Essai_20170503" class="week">&nbsp;</td>
<td id="td_Essai_20170504" class="week">&nbsp;</td>
<td id="td_Essai_20170505" class="week">&nbsp;</td>
<td id="td_Essai_20170506" class="weekend">&nbsp;</td>
<td id="td_Essai_20170507" class="weekend">&nbsp;</td>
<td id="td_Essai_20170508" class="weekend"><div class="cellHolidays" onmouseover="return coolTip('<b>Armistice 1945</b>')" onmouseout="nd()" onclick="event.stopPropagation();">FER.</div>
</td>
<td id="td_Essai_20170509" class="week">&nbsp;</td>
<td id="td_Essai_20170510" class="week">&nbsp;</td>
<td id="td_Essai_20170511" class="week">&nbsp;</td>
<td id="td_Essai_20170512" class="week">&nbsp;</td>
<td id="td_Essai_20170513" class="weekend">&nbsp;</td>
<td id="td_Essai_20170514" class="weekend">&nbsp;</td>
<td id="td_Essai_20170515" class="week">&nbsp;</td>
<td id="td_Essai_20170516" class="week">&nbsp;</td>
<td id="td_Essai_20170517" class="week">&nbsp;</td>
</tr>
<tr>
<th id="tdUser_4" style="background-color: rgb(255, 15, 167); color: rgb(255, 255, 255); display: none;">&nbsp;<span style="color:#FFFFFF">Congé</span>&nbsp;</th>
<td id="td_CONGE_20170317" class="week">&nbsp;</td>
<td id="td_CONGE_20170318" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170319" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170320" class="week">&nbsp;</td>
<td id="td_CONGE_20170321" class="week">&nbsp;</td>
<td id="td_CONGE_20170322" class="week today">&nbsp;</td>
<td id="td_CONGE_20170323" class="week">&nbsp;</td>
<td id="td_CONGE_20170324" class="week">&nbsp;</td>
<td id="td_CONGE_20170325" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170326" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170327" class="week">&nbsp;</td>
<td id="td_CONGE_20170328" class="week">&nbsp;</td>
<td id="td_CONGE_20170329" class="week">&nbsp;</td>
<td id="td_CONGE_20170330" class="week">&nbsp;</td>
<td id="td_CONGE_20170331" class="week">&nbsp;</td>
<td id="td_CONGE_20170401" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170402" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170403" class="week">&nbsp;</td>
<td id="td_CONGE_20170404" class="week">&nbsp;</td>
<td id="td_CONGE_20170405" class="week">&nbsp;</td>
<td id="td_CONGE_20170406" class="week">&nbsp;</td>
<td id="td_CONGE_20170407" class="week">&nbsp;</td>
<td id="td_CONGE_20170408" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170409" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170410" class="week">&nbsp;</td>
<td id="td_CONGE_20170411" class="week">&nbsp;</td>
<td id="td_CONGE_20170412" class="week">&nbsp;</td>
<td id="td_CONGE_20170413" class="week">&nbsp;</td>
<td id="td_CONGE_20170414" class="week">&nbsp;</td>
<td id="td_CONGE_20170415" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170416" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170417" class="week">&nbsp;</td>
<td id="td_CONGE_20170418" class="week">&nbsp;</td>
<td id="td_CONGE_20170419" class="week">&nbsp;</td>
<td id="td_CONGE_20170420" class="week">&nbsp;</td>
<td id="td_CONGE_20170421" class="week">&nbsp;</td>
<td id="td_CONGE_20170422" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170423" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170424" class="week">&nbsp;</td>
<td id="td_CONGE_20170425" class="week">&nbsp;</td>
<td id="td_CONGE_20170426" class="week">&nbsp;</td>
<td id="td_CONGE_20170427" class="week">&nbsp;</td>
<td id="td_CONGE_20170428" class="week">&nbsp;</td>
<td id="td_CONGE_20170429" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170430" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170501" class="weekend"><div class="cellHolidays" onmouseover="return coolTip('<b>Fête du Travail</b>')" onmouseout="nd()" onclick="event.stopPropagation();">FER.</div>
</td>
<td id="td_CONGE_20170502" class="week">&nbsp;</td>
<td id="td_CONGE_20170503" class="week">&nbsp;</td>
<td id="td_CONGE_20170504" class="week">&nbsp;</td>
<td id="td_CONGE_20170505" class="week">&nbsp;</td>
<td id="td_CONGE_20170506" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170507" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170508" class="weekend"><div class="cellHolidays" onmouseover="return coolTip('<b>Armistice 1945</b>')" onmouseout="nd()" onclick="event.stopPropagation();">FER.</div>
</td>
<td id="td_CONGE_20170509" class="week">&nbsp;</td>
<td id="td_CONGE_20170510" class="week">&nbsp;</td>
<td id="td_CONGE_20170511" class="week">&nbsp;</td>
<td id="td_CONGE_20170512" class="week">&nbsp;</td>
<td id="td_CONGE_20170513" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170514" class="weekend">&nbsp;</td>
<td id="td_CONGE_20170515" class="week">&nbsp;</td>
<td id="td_CONGE_20170516" class="week">&nbsp;</td>
<td id="td_CONGE_20170517" class="week">&nbsp;</td>
</tr>
</tbody>
</table>
-->