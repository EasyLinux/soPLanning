<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex,follow" />
    <title>{$aCalendar.Title}</title>

    <link type="text/css" href="/www/assets/css/raspi.css" rel="stylesheet" /> 

    <script type="text/javascript" src="/www/assets/js/jquery-1.12.2.min.js"></script>
    <script type="text/javascript" src="/www/assets/plugins/jqueryui/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="/www/assets/plugins/jqueryui/i18n/jquery.ui.datepicker-fr.min.js"></script>
    <script type="text/javascript" src="/www/assets/plugins/bootstrap3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/www/assets/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
    <script type="text/javascript" src="/www/assets/plugins/jscolor/jscolor.js"></script>

    <script type="text/javascript" src="/www/assets/js/cooltip.js"></script>
  </head>
  <body>
    <div class="container">
      <table class='scroll'>
        <thead>
         <tr>
          <th class='fTh' onClick='selectUsers();'>Sem</th>
          {foreach from=$aCalendar.Users item=User}
          <th class='empty'>&nbsp;</th>
          <th colspan='2' width='{$aCalendar.width} px'>{$User.Name}</th>
          {/foreach}
         </tr>
        </thead>
        <tbody>
          {foreach from=$aCalendar.Weeks item=Week name=Week}
          <tr class='empty'>
            <td class='empty' colspan='{$aCalendar.nbUsers*3+1}'>&nbsp;</td>
          </tr>
            {foreach from=$Week.Details item=Line name=Detail}
            {if $smarty.foreach.Week.index == 1}{assign var=Class value='class="current"'}{else}{assign var=Class value=''}{/if}
          <tr {$Class}>
            {if $smarty.foreach.Detail.index == 0}<td rowspan='5' width='65 px'><b>{$Week.Num}</b><br />{$Week.firstDay}</td>{/if}
            {foreach from=$Line item=Detail name=Idx}
              {if $Detail.Project == "F&eacute;ri&eacute;"}{assign var=Ferie value='ferie'}{else}{assign var=Ferie value=''}{/if}
            <td class='emptyCol'></td>
            <td class='day {$Ferie}'>{$aCalendar.weekDays[$smarty.foreach.Detail.index]}</td>
            <td width='{$aCalendar.width-15} px' {$Ferie}' style='Background-color: #{$Detail.Color}' 
                {if isset($Detail.pid)}onmouseover='cooltip_{$Detail.pid}();' onmouseout='nd();'{/if}>
                <div class='raspi'>{$Detail.Project}</div></td>
            {/foreach}
          </tr>
            {/foreach}

          {/foreach}
        </tbody>

      </table>
    </div>

    <div class='Popup' id='Popup'>
      <table cellpadding='10px' align='center'>
        <thead>
          <th class='pTh'>Utilisateur</th>
          <th class='pTh'>Afficher</th>
        </thead>
        <tbody>
          {foreach from=$aCalendar.allUsers item=allUser}
         <tr>
          <td style='cellpadding: 20px;'>{$allUser.Name}</td>
          <td align='center'><input type='checkbox' name='{$allUser.id}' {if $allUser.display == 1}checked{/if} onClick='chgDisplay(this);'></td>
         </tr>
          {/foreach}
        </tbody>
      </table>
      </br />
      <input type='button' value='Quitter' onclick='popOff();'/>
    </div>
    <script type="text/javascript">
setTimeout("ReloadPage();", {$aCalendar.Reload});

function cooltip_0()
{literal}{{/literal}
// Do nothing
return ;
{literal}}{/literal}
{foreach from=$aCalendar.Tasks item=Task}
function cooltip_{$Task.pid}()
{literal}{{/literal}
Html = "<b>Projet:</b> {$Task.Project}"
        +"<br /><b>Tache: </b> {$Task.Titre}"
        +"<br /><b>Note: </b> {$Task.Notes}";
return coolTip(Html);
{literal}}{/literal}

{/foreach}
          
{literal}
      function ReloadPage()
      {
        location.reload(); 
      }

      function selectUsers()
      {
        console.log('Select');
        document.getElementById('Popup').style.display = 'Block';
      }

      function popOff()
      {
        document.getElementById('Popup').style.display = 'none';
        location.reload();
      }

      function chgDisplay(User)
      {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            //alert('OK');
          }
        }
        if( User.checked )
          Val=1;
        else
          Val=0
        xhttp.open('POST','ajax.php',true);
        xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhttp.send('action=switchDisplay&Uid='+User.name+'&Val='+Val);
        //console.log('action=switchDisplay&Uid='+User.name+'&Val='+Val);
      }

    </script>
{/literal}
{include file="wall_footer.tpl"}
