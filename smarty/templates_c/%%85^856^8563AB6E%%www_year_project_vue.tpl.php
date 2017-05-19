<?php /* Smarty version 2.6.29, created on 2017-04-28 17:00:37
         compiled from www_year_project_vue.tpl */ ?>
<table class='planning_year'>
  <colgroup>
    <?php $_from = $this->_tpl_vars['TabData']['ColWidth']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Col']):
?>
    <col width='<?php echo $this->_tpl_vars['Col']; ?>
px' />
    <?php endforeach; endif; unset($_from); ?>
  </colgroup>
    <tr>
    <th class="planning_head_title" colspan="15"><?php echo $this->_tpl_vars['TabData']['Title']; ?>
</th>
  </tr>
    <tr>
    <th colspan="3" class="planning_head_month"></th>
    <?php $_from = $this->_tpl_vars['TabData']['Years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Year']):
?>
    <?php if ($this->_tpl_vars['Year']['Number'] != 0): ?><th class="planning_head_year" colspan="<?php echo $this->_tpl_vars['Year']['Number']; ?>
"><?php echo $this->_tpl_vars['Year']['Display']; ?>
</th><?php endif; ?><?php endforeach; endif; unset($_from); ?>
  </tr>
    <tr>
    <td colspan="3" class="planning_head_month"></td>
  <?php $_from = $this->_tpl_vars['TabData']['Months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Month']):
?>
    <td class="planning_head_year"><?php echo $this->_tpl_vars['Month']; ?>
</td>
  <?php endforeach; endif; unset($_from); ?>
  </tr>
    <tr>
    <td colspan="3" class="planning_col_year_group">Ressources Employables</td>
  <?php $_from = $this->_tpl_vars['TabData']['Months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Month']):
?>
    <td></td>
  <?php endforeach; endif; unset($_from); ?>
  </tr>
<?php $_from = $this->_tpl_vars['TabData']['Users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['usrForEach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['usrForEach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['User']):
        $this->_foreach['usrForEach']['iteration']++;
?>
  <tr>
    <td></td><td></td><td class="planning_col_year_user" style='background-color: #<?php echo $this->_tpl_vars['User']['Color']; ?>
;'><?php echo $this->_tpl_vars['User']['Name']; ?>
</td>
  <?php $_from = $this->_tpl_vars['User']['Available']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Available']):
?>
    <td class="planning_col_year_data"><?php if ($this->_tpl_vars['Available'] > 0): ?><?php echo $this->_tpl_vars['Available']; ?>
 j<?php endif; ?></td>
  <?php endforeach; endif; unset($_from); ?>
  </tr>
<?php endforeach; endif; unset($_from); ?>  
  <tr>
    <td>&nbsp;</td><td></td><td></td><?php $_from = $this->_tpl_vars['TabData']['Months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Month']):
?><td></td><?php endforeach; endif; unset($_from); ?>
  </tr>
  <tr>
    <td colspan='3' class='planning_col_year_group'>Projets</td><?php $_from = $this->_tpl_vars['TabData']['Months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Month']):
?><td></td><?php endforeach; endif; unset($_from); ?>
  </tr>
  
<?php $_from = $this->_tpl_vars['TabData']['Projects']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['prjForEach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['prjForEach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Project']):
        $this->_foreach['prjForEach']['iteration']++;
?>
  <tr>
    <td ></td>
    <td colspan="2" class="planning_col_year_project<?php if ($this->_tpl_vars['Project']['Priority'] == 1): ?> project_alert<?php endif; ?>"><?php echo $this->_tpl_vars['Project']['Name']; ?>
<?php if ($this->_tpl_vars['Project']['Priority'] == 1): ?> - Prioritaire<?php endif; ?></td>
    <?php $_from = $this->_tpl_vars['TabData']['Months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Month']):
?><td></td><?php endforeach; endif; unset($_from); ?>
  </tr>
  <?php $_from = $this->_tpl_vars['Project']['Users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['User']):
?>
        <tr>
          <td></td>
          <td></td>
          <td class="planning_col_year_user" style='background-color: #<?php echo $this->_tpl_vars['User']['Color']; ?>
;'><?php echo $this->_tpl_vars['User']['Name']; ?>
</td>
          <?php $_from = $this->_tpl_vars['User']['Use']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Use']):
?>
            <td class="planning_col_year_data<?php if ($this->_tpl_vars['Project']['Priority'] == 1): ?> project_alert<?php endif; ?>"><?php if ($this->_tpl_vars['Use'] > 0): ?><?php echo $this->_tpl_vars['Use']; ?>
 j<?php endif; ?></td>  
          <?php endforeach; endif; unset($_from); ?>
        </tr>
        <tr>
  <?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>

        <tr>
          <td ></td>
          <td colspan="2" class="planning_col_year_project">Totaux</td>
          <?php $_from = $this->_tpl_vars['TabData']['Months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Month']):
?><td></td><?php endforeach; endif; unset($_from); ?>
        </tr>
        
      <?php $_from = $this->_tpl_vars['TabData']['Users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['User']):
?>
        <tr>
          <td></td>
          <td></td>
          <td class="planning_col_year_user_inv" style='background-color: #<?php echo $this->_tpl_vars['User']['Color']; ?>
;'><?php echo $this->_tpl_vars['User']['Name']; ?>
</td>
          <?php $_from = $this->_tpl_vars['User']['MaxUse']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fUse'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fUse']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['MaxUse']):
        $this->_foreach['fUse']['iteration']++;
?><td class="planning_col_year_data_inv
                <?php if ($this->_tpl_vars['User']['MaxUse'][($this->_foreach['fUse']['iteration']-1)] > $this->_tpl_vars['User']['Available'][($this->_foreach['fUse']['iteration']-1)]): ?> project_alert<?php endif; ?>"><?php if ($this->_tpl_vars['MaxUse'] > 0): ?><?php echo $this->_tpl_vars['MaxUse']; ?>
 j<?php endif; ?></td><?php endforeach; endif; unset($_from); ?>
        </tr>
      <?php endforeach; endif; unset($_from); ?>

  <tr>
    <td>&nbsp;</td><td></td><td></td><?php $_from = $this->_tpl_vars['TabData']['Months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Month']):
?><td></td><?php endforeach; endif; unset($_from); ?>
  </tr>

  <tr>
    <td colspan="3" class="planning_col_year_group">Disponible pour devis</td>
    <?php $_from = $this->_tpl_vars['TabData']['Months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Month']):
?><td></td><?php endforeach; endif; unset($_from); ?>
  </tr>
  <?php $_from = $this->_tpl_vars['TabData']['Users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['User']):
?>
  <tr>
    <td></td><td></td><td class="planning_col_year_user" style='background-color: #<?php echo $this->_tpl_vars['User']['Color']; ?>
;'><?php echo $this->_tpl_vars['User']['Name']; ?>
</td>
    <?php $_from = $this->_tpl_vars['User']['Remain']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Remain']):
?><td class="planning_col_year_data<?php if ($this->_tpl_vars['Remain'] < 0): ?> project_alert<?php endif; ?>"><?php if ($this->_tpl_vars['Remain'] != 0): ?><?php echo $this->_tpl_vars['Remain']; ?>
 j<?php endif; ?></td><?php endforeach; endif; unset($_from); ?>
  </tr>
  <?php endforeach; endif; unset($_from); ?> 
</table>
<!-- 
<?php echo $this->_tpl_vars['Debug']; ?>

-->