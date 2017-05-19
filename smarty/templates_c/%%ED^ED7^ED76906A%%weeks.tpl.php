<?php /* Smarty version 2.6.29, created on 2017-04-28 17:06:25
         compiled from mobile/weeks.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substr', 'mobile/weeks.tpl', 15, false),)), $this); ?>
			<div class="panel-group" id="panel-9999">
<?php $_from = $this->_tpl_vars['Datas']['Weeks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Week']):
?>
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title" data-toggle="collapse" data-parent="#panel-9999" href="#panel-element-<?php echo $this->_tpl_vars['Week']['Id']; ?>
"><?php echo $this->_tpl_vars['Week']['Title']; ?>
</a>
					</div>
					<div id="panel-element-<?php echo $this->_tpl_vars['Week']['Id']; ?>
" class="panel-collapse collapse">
						<div class="panel-body">
	<?php $_from = $this->_tpl_vars['Week']['Days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Day']):
?>						
              <div class="panel panel-default">
                <div class="panel-heading">
                   <a class="panel-title" data-toggle="collapse" 
                      data-parent="#panel-<?php echo $this->_tpl_vars['Day']['wDay']; ?>
" 
                      href="#panel-element-<?php echo $this->_tpl_vars['Day']['wDay']; ?>
">
                     <?php echo $this->_tpl_vars['Day']['sDay']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['Day']['wDay'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 2) : substr($_tmp, 0, 2)); ?>
 
                     <span style='color: #1db0dc'><?php echo $this->_tpl_vars['Day']['Task']['Project']; ?>
</span></a>
                </div>
                <div id="panel-element-<?php echo $this->_tpl_vars['Day']['wDay']; ?>
" class="panel-collapse collapse">
                  <div class="panel-body">
                    <?php if ($this->_tpl_vars['Day']['Task']['Project'] != ""): ?>
                    <div class="row">
                      <div class="col-md-4"><b>Projet: </b></div><div class="col-md-8"><?php echo $this->_tpl_vars['Day']['Task']['Project']; ?>
</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4"><b>Adresse/Coordonn&eacute;es:</b></div><div class="col-md-8"><?php echo $this->_tpl_vars['Day']['Task']['Task']; ?>
</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4"><b>Descriptif des travaux:</b></div><div class="col-md-8"><?php echo $this->_tpl_vars['Day']['Task']['Comment']; ?>
</div>
                    </div>
                    <?php else: ?>
                    <div class="row">
                      <div class="col-md-12">Rien de pr&eacute;vu</div>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
  <?php endforeach; endif; unset($_from); ?>
            </div>
					</div>
        </div>
<?php endforeach; endif; unset($_from); ?>        
        
        
			</div>