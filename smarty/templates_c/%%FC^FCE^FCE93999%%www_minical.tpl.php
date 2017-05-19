<?php /* Smarty version 2.6.29, created on 2017-05-03 09:32:56
         compiled from www_minical.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'www_minical.tpl', 30, false),)), $this); ?>
        <input type='hidden' id='minical' value='<?php echo $this->_tpl_vars['minical']; ?>
' />


        <div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all" > 
          <div class="ui-icon ui-icon-circle-triangle-w" style="float: left;" onClick="minicalPrev();">&nbsp;</div>  
          <div class="ui-datepicker-title" style="float: left; width: 85%; text-align: center" id="sMonthYear"><?php echo $this->_tpl_vars['sMonthYear']; ?>
</div>
          <div class="ui-icon ui-icon-circle-triangle-e" style="float: left;" onClick="minicalNext();">&nbsp;</div>
        </div>
        <table class="miniCalendar">
          <thead>
            <tr>
              <th class="minical-week-col"><?php echo $this->_config[0]['vars']['short_week']; ?>
</th>
              <th class="minical-day-col"><span title="<?php echo $this->_config[0]['vars']['day_1']; ?>
"><?php echo $this->_config[0]['vars']['initial_day_1']; ?>
</span></th>
              <th class="minical-day-col"><span title="<?php echo $this->_config[0]['vars']['day_2']; ?>
"><?php echo $this->_config[0]['vars']['initial_day_2']; ?>
</span></th>
              <th class="minical-day-col"><span title="<?php echo $this->_config[0]['vars']['day_3']; ?>
"><?php echo $this->_config[0]['vars']['initial_day_3']; ?>
</span></th>
              <th class="minical-day-col"><span title="<?php echo $this->_config[0]['vars']['day_4']; ?>
"><?php echo $this->_config[0]['vars']['initial_day_4']; ?>
</span></th>
              <th class="minical-day-col"><span title="<?php echo $this->_config[0]['vars']['day_5']; ?>
"><?php echo $this->_config[0]['vars']['initial_day_5']; ?>
</span></th>
              <th class="minical-day-col minical-week-end"><span title="<?php echo $this->_config[0]['vars']['day_6']; ?>
"><?php echo $this->_config[0]['vars']['initial_day_6']; ?>
</span></th>
              <th class="minical-day-col minical-week-end"><span title="<?php echo $this->_config[0]['vars']['day_0']; ?>
"><?php echo $this->_config[0]['vars']['initial_day_0']; ?>
</span></th>
              </tr>
            </thead>
            <tbody>
              <?php $_from = $this->_tpl_vars['miniWeeks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Week']):
?>
                <tr>
                  <td class="minical-week-col"><?php echo $this->_tpl_vars['Week']['WeN']; ?>
</td>
                  <?php $_from = $this->_tpl_vars['Week']['We']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['forDays'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['forDays']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Day']):
        $this->_foreach['forDays']['iteration']++;
?>
                    <td id="<?php echo $this->_tpl_vars['minical']; ?>
<?php echo $this->_tpl_vars['Day']; ?>
" 
                        <?php if (( ($this->_foreach['forDays']['iteration']-1) < 5 ) && ( substr ( $this->_tpl_vars['Day'] , 4 , 1 ) != 'E' )): ?>onclick="ToggleException(this)"<?php endif; ?>
                        class="minical-day<?php if (substr ( $this->_tpl_vars['Day'] , 2 , 1 ) == 'W'): ?> minical-week-end<?php endif; ?><?php if (substr ( $this->_tpl_vars['Day'] , 3 , 1 ) == 'T'): ?> minical-today<?php endif; ?><?php if (substr ( $this->_tpl_vars['Day'] , 4 , 1 ) == 'E'): ?> minical-holiday<?php endif; ?>">
                          <?php if ($this->_tpl_vars['Day'] != 0): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['Day'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 2, "", true) : smarty_modifier_truncate($_tmp, 2, "", true)); ?>
<?php endif; ?></td>
                  <?php endforeach; endif; unset($_from); ?>
                </tr>
              <?php endforeach; endif; unset($_from); ?>    
            </tbody>
        </table>