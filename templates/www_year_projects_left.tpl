
{foreach from=$TabData.Users item=User name=usrForEach}
        <tr>
          <td class="clTdUser"{if $smarty.foreach.usrForEach.index==0} style="width: 10px"{/if}></td>
          <td class="clTdUser"{if $smarty.foreach.usrForEach.index==0} style="width: 10px"{/if}></td>
          <td class="clTdUser"{if $smarty.foreach.usrForEach.index==0} style="width: 80px;"{/if}>{$User}</td>
        </tr>
{/foreach}
        <tr>
          <td class="clTdUser">&nbsp;</td>
          <td class="clTdUser"></td>
          <td class="clTdUser"></td>
        </tr>
        <tr>
          <td colspan="3" class="clTdGroup">Projets</td>
        </tr>
{foreach from=$TabData.Projects item=Project name=prjForEach}
        <tr>
          <td ></td>
          <td colspan="2" class="clTdProject">{$Project.Name}</td>
        </tr>
  {foreach from=$Project.Users item=User}
        <tr>
          <td class="clTdUser"></td>
          <td class="clTdUser"></td>
          <td class="clTdUser">{$User.Name}</td>
        </tr>
        <tr>
  {/foreach}
{/foreach}

        <tr>
          <td ></td>
          <td colspan="2" class="clTdProject">Totaux</td>
        </tr>
{foreach from=$TabData.Users item=User name=usrForEach}
        <tr>
          <td class="clTdUser"></td>
          <td class="clTdUser"></td>
          <td class="clTdUser">{$User}</td>
        </tr>
{/foreach}
        <tr>
          <td class="clTdUser">&nbsp;</td>
          <td class="clTdUser"></td>
          <td class="clTdUser"></td>
        </tr>
        <tr>
          <td colspan="3" class="clTdGroup">Disponible pour devis</td>
        </tr>
{foreach from=$TabData.Users item=User name=usrForEach}
        <tr>
          <td class="clTdUser"></td>
          <td class="clTdUser"></td>
          <td class="clTdUser">{$User}</td>
        </tr>
{/foreach}
      </table>

