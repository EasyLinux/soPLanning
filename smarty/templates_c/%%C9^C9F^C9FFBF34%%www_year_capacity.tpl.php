<?php /* Smarty version 2.6.29, created on 2017-04-28 17:00:37
         compiled from www_year_capacity.tpl */ ?>
<svg class="graph" aria-labelledby="title desc" role="img">
  <title id="title">Utilisation des ressources</title>
  <desc id="desc"></desc>
  <g class="line">
    <line x1="60" x2="60" y1="5" y2="200"></line>
    <line x1="60" x2="1590" y1="200" y2="200"></line>
    <text x="10" y="100" dy=".35em">100%</text>
    <text x="25" y="190" dy=".35em">  0%</text>
    <text x="500" y="30" font-family="Verdana" font-size="1.4em">Utilisation des ressources</text>
  </g>
  
  <g class="grid">
    <line x1="60" x2="1590" y1="100" y2="100"></line>
  </g>
<?php $this->assign('Offset', 70); ?>  
<?php $_from = $this->_tpl_vars['TabData']['Months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Month'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Month']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Month']):
        $this->_foreach['Month']['iteration']++;
?>
  <g class="line">
    <text x="<?php echo $this->_tpl_vars['Offset']+10; ?>
" y="220" dy=".35em"><?php echo $this->_tpl_vars['Month']; ?>
</text>
  </g>
<g class="bar">
  <?php $_from = $this->_tpl_vars['TabData']['Users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['User']):
        $this->_foreach['Users']['iteration']++;
?>
  <rect height="<?php echo $this->_tpl_vars['User']['Percent'][($this->_foreach['Month']['iteration']-1)]; ?>
" width="20" y="<?php echo $this->_tpl_vars['User']['Height'][($this->_foreach['Month']['iteration']-1)]; ?>
" x="<?php echo $this->_tpl_vars['Offset']; ?>
" style="fill: #<?php echo $this->_tpl_vars['User']['Color']; ?>
"></rect>
  <?php $this->assign('Offset', $this->_tpl_vars['Offset']+20); ?>
  <?php endforeach; endif; unset($_from); ?>
  <?php $this->assign('Offset', $this->_tpl_vars['Offset']+20); ?>
  <rect height="100" width="2" y="100" x="<?php echo $this->_tpl_vars['Offset']; ?>
" style="fill: #C0C0C0"></rect>
  <?php $this->assign('Offset', $this->_tpl_vars['Offset']+3); ?>
</g>  
<?php endforeach; endif; unset($_from); ?>

  <g>
    <rect height="20" width="1700" y="240" x="50" style="fill: #DBDFF2"></rect>
    <?php $this->assign('Index', 0); ?>
    <?php $this->assign('Y', 245); ?>
    <?php $_from = $this->_tpl_vars['TabData']['Users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Legend'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Legend']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['User']):
        $this->_foreach['Legend']['iteration']++;
?>
      <?php $this->assign('X', $this->_tpl_vars['Index']*200+55); ?>
      <rect height="10" width="10" y="<?php echo $this->_tpl_vars['Y']; ?>
" x="<?php echo $this->_tpl_vars['X']; ?>
" style="fill: #<?php echo $this->_tpl_vars['User']['Color']; ?>
"></rect>
      <text x="<?php echo $this->_tpl_vars['X']+20; ?>
" y="<?php echo $this->_tpl_vars['Y']+10; ?>
" font-family="Verdana" font-size="1em"><?php echo $this->_tpl_vars['User']['Name']; ?>
</text>
      <?php $this->assign('Index', $this->_tpl_vars['Index']+1); ?>
      <?php if ($this->_tpl_vars['Index'] > 8): ?>
         <?php $this->assign('Index', 0); ?>
         <?php $this->assign('Y', $this->_tpl_vars['Y']+20); ?>
         <rect height="20" width="1700" y="<?php echo $this->_tpl_vars['Y']-5; ?>
" x="50" style="fill: #DBDFF2"></rect>
      <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
  </g>
</svg>

