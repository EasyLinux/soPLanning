<?php /* Smarty version 2.6.29, created on 2017-04-28 16:52:53
         compiled from wall_display.tpl */ ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex,follow" />
    <title><?php echo $this->_tpl_vars['aCalendar']['Title']; ?>
</title>

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
      <table style='table-layout: fixed; word-wrap: break-word;'>
        <thead>
          <th class='fTh' onClick='selectUsers();'>Sem</th>
          <?php $_from = $this->_tpl_vars['aCalendar']['Users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['User']):
?>
          <th class='empty'>&nbsp;</th>
          <th colspan='2' width='<?php echo $this->_tpl_vars['aCalendar']['width']; ?>
px'><?php echo $this->_tpl_vars['User']['Name']; ?>
</th>
          <?php endforeach; endif; unset($_from); ?>
        </thead>
        <tbody>
          <?php $_from = $this->_tpl_vars['aCalendar']['Weeks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Week'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Week']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Week']):
        $this->_foreach['Week']['iteration']++;
?>
          <tr class='empty'>
            <td class='empty' colspan='<?php echo $this->_tpl_vars['aCalendar']['nbUsers']*3+1; ?>
'>&nbsp;</td>
          </tr>
            <?php $_from = $this->_tpl_vars['Week']['Details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Detail'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Detail']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Line']):
        $this->_foreach['Detail']['iteration']++;
?>
            <?php if (($this->_foreach['Week']['iteration']-1) == 1): ?><?php $this->assign('Class', 'class="current"'); ?><?php else: ?><?php $this->assign('Class', ''); ?><?php endif; ?>
          <tr <?php echo $this->_tpl_vars['Class']; ?>
>
            <?php if (($this->_foreach['Detail']['iteration']-1) == 0): ?><td rowspan='5'><b><?php echo $this->_tpl_vars['Week']['Num']; ?>
</b><br /><?php echo $this->_tpl_vars['Week']['firstDay']; ?>
</td><?php endif; ?>
            <?php $_from = $this->_tpl_vars['Line']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Idx'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Idx']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Detail']):
        $this->_foreach['Idx']['iteration']++;
?>
              <?php if ($this->_tpl_vars['Detail']['Project'] == "F&eacute;ri&eacute;"): ?><?php $this->assign('Ferie', 'ferie'); ?><?php else: ?><?php $this->assign('Ferie', ''); ?><?php endif; ?>
            <td class='emptyCol'></td>
            <td class='day <?php echo $this->_tpl_vars['Ferie']; ?>
'><?php echo $this->_tpl_vars['aCalendar']['weekDays'][($this->_foreach['Detail']['iteration']-1)]; ?>
</td>
            <td class='<?php echo $this->_tpl_vars['Ferie']; ?>
' style='Background-color: #<?php echo $this->_tpl_vars['Detail']['Color']; ?>
' 
                <?php if (isset ( $this->_tpl_vars['Detail']['pid'] )): ?>onmouseover='cooltip_<?php echo $this->_tpl_vars['Detail']['pid']; ?>
();' onmouseout='nd();'<?php endif; ?>>
                <div class='raspi'><?php echo $this->_tpl_vars['Detail']['Project']; ?>
</div></td>
            <?php endforeach; endif; unset($_from); ?>
          </tr>
            <?php endforeach; endif; unset($_from); ?>

          <?php endforeach; endif; unset($_from); ?>
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
          <?php $_from = $this->_tpl_vars['aCalendar']['allUsers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['allUser']):
?>
         <tr>
          <td style='cellpadding: 20px;'><?php echo $this->_tpl_vars['allUser']['Name']; ?>
</td>
          <td align='center'><input type='checkbox' name='<?php echo $this->_tpl_vars['allUser']['id']; ?>
' <?php if ($this->_tpl_vars['allUser']['display'] == 1): ?>checked<?php endif; ?> onClick='chgDisplay(this);'></td>
         </tr>
          <?php endforeach; endif; unset($_from); ?>
        </tbody>
      </table>
      </br />
      <input type='button' value='Quitter' onclick='popOff();'/>
    </div>
    <script type="text/javascript">
setTimeout("ReloadPage();", <?php echo $this->_tpl_vars['aCalendar']['Reload']; ?>
);

function cooltip_0()
<?php echo '{'; ?>

// Do nothing
return ;
<?php echo '}'; ?>

<?php $_from = $this->_tpl_vars['aCalendar']['Tasks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Task']):
?>
function cooltip_<?php echo $this->_tpl_vars['Task']['pid']; ?>
()
<?php echo '{'; ?>

Html = "<b>Projet:</b> <?php echo $this->_tpl_vars['Task']['Project']; ?>
"
        +"<br /><b>Tache: </b> <?php echo $this->_tpl_vars['Task']['Titre']; ?>
"
        +"<br /><b>Note: </b> <?php echo $this->_tpl_vars['Task']['Notes']; ?>
";
return coolTip(Html);
<?php echo '}'; ?>


<?php endforeach; endif; unset($_from); ?>
          
<?php echo '
      function ReloadPage()
      {
        location.reload(); 
      }

      function selectUsers()
      {
        console.log(\'Select\');
        document.getElementById(\'Popup\').style.display = \'Block\';
      }

      function popOff()
      {
        document.getElementById(\'Popup\').style.display = \'none\';
        location.reload();
      }

      function chgDisplay(User)
      {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            //alert(\'OK\');
          }
        }
        if( User.checked )
          Val=1;
        else
          Val=0
        xhttp.open(\'POST\',\'ajax.php\',true);
        xhttp.setRequestHeader(\'Content-type\',\'application/x-www-form-urlencoded\');
        xhttp.send(\'action=switchDisplay&Uid=\'+User.name+\'&Val=\'+Val);
        //console.log(\'action=switchDisplay&Uid=\'+User.name+\'&Val=\'+Val);
      }
    </script>
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "wall_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>