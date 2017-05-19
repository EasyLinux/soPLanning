<?php /* Smarty version 2.6.29, created on 2017-04-28 17:00:37
         compiled from www_planning_year.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "www_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="container-fluid">
	<div class="row noprint">
		<div class="col-md-12">
			<div class="soplanning-box" id="divPlanningDateSelector">
										<div class="btn-group" id="dropdownDateSelector">
            <select id='StartMonth' name='StartMonth' onchange="window.location='planning_year.php?YearMonth='+this.value;">
              <?php $_from = $this->_tpl_vars['TabData']['YearMonths']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Ym'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Ym']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Month']):
        $this->_foreach['Ym']['iteration']++;
?>
                <option value='<?php echo $this->_tpl_vars['Month']['id']; ?>
'<?php if (($this->_foreach['Ym']['iteration']-1) == 2): ?>selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['Month']['text']; ?>
</option>
              <?php endforeach; endif; unset($_from); ?>
            </select>
					</div> 
										<div class="btn-group">
						<a class="btn btn-info btn-sm" href="planning.php"><?php echo $this->_config[0]['vars']['menuPlanningMois']; ?>
</a>
					</div>

			</div>
		</div>
	</div>
              
  
	<div class="row">
		<div class="col-md-12">
			<div class="soplanning-box" id="divPlanning">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'www_year_project_vue.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
		</div>
	</div>
	<div class="row noprint">
		<div class="col-md-12">
			<div class="soplanning-box" id="divPlanningRecap">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'www_year_capacity.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
		</div>
	</div> 
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "www_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>