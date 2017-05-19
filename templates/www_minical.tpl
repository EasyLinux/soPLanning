        <input type='hidden' id='minical' value='{$minical}' />


        <div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all" > 
          <div class="ui-icon ui-icon-circle-triangle-w" style="float: left;" onClick="minicalPrev();">&nbsp;</div>  
          <div class="ui-datepicker-title" style="float: left; width: 85%; text-align: center" id="sMonthYear">{$sMonthYear}</div>
          <div class="ui-icon ui-icon-circle-triangle-e" style="float: left;" onClick="minicalNext();">&nbsp;</div>
        </div>
        <table class="miniCalendar">
          <thead>
            <tr>
              <th class="minical-week-col">{#short_week#}</th>
              <th class="minical-day-col"><span title="{#day_1#}">{#initial_day_1#}</span></th>
              <th class="minical-day-col"><span title="{#day_2#}">{#initial_day_2#}</span></th>
              <th class="minical-day-col"><span title="{#day_3#}">{#initial_day_3#}</span></th>
              <th class="minical-day-col"><span title="{#day_4#}">{#initial_day_4#}</span></th>
              <th class="minical-day-col"><span title="{#day_5#}">{#initial_day_5#}</span></th>
              <th class="minical-day-col minical-week-end"><span title="{#day_6#}">{#initial_day_6#}</span></th>
              <th class="minical-day-col minical-week-end"><span title="{#day_0#}">{#initial_day_0#}</span></th>
              </tr>
            </thead>
            <tbody>
              {foreach from=$miniWeeks item=Week}
                <tr>
                  <td class="minical-week-col">{$Week.WeN}</td>
                  {foreach from=$Week.We item=Day name=forDays}
                    <td id="{$minical}{$Day}" 
                        {if ($smarty.foreach.forDays.index < 5) && (substr($Day,4,1) != "E")}onclick="ToggleException(this)"{/if}
                        class="minical-day{if substr($Day,2,1) == "W"} minical-week-end{/if}{if substr($Day,3,1) == "T"} minical-today{/if}{if substr($Day,4,1) == "E"} minical-holiday{/if}">
                          {if $Day != 0}{$Day|truncate:2:"":true}{/if}</td>
                  {/foreach}
                </tr>
              {/foreach}    
            </tbody>
        </table>
