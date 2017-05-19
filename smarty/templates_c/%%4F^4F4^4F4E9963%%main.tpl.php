<?php /* Smarty version 2.6.29, created on 2017-04-28 12:57:46
         compiled from mobile/main.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mobile/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <div class="container-fluid">
    <form class="form-horizontal" role="form" action"index.php" method="post" id='Main'>
	<div class="row">
		<div class="col-md-12">
			<button type="button" class="btn btn-primary btn-block" onclick='Logout();'>
				Quitter
			</button>      
		</div>
  </div>
	<div class="row">
		<div class="col-md-12">
      <h2 id='myName'><?php echo $this->_tpl_vars['Datas']['name']; ?>
</h2>    
		</div>
  </div>
	<div class="row">
    <div class="col-md-12">

				<div class="btn-group dropdown">
					<button class="btn btn-default">
						Choisir la personne
					</button>
  				<button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
    				<span class="caret"></span>
      		</button>
  				<ul class="dropdown-menu">
          <?php $_from = $this->_tpl_vars['Datas']['Users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['User']):
?>
    				<li>
      				<a href="#" onclick="changeUser('<?php echo $this->_tpl_vars['User']['uid']; ?>
','<?php echo $this->_tpl_vars['User']['name']; ?>
');"><?php echo $this->_tpl_vars['User']['name']; ?>
</a>
            </li>
          <?php endforeach; endif; unset($_from); ?>
          </ul>
        </div>

    </div>
  </div>
	<div class="row">    
    <div class="col-md-12" id="Weeks"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mobile/weeks.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
	</div>
    <input type='hidden' name='action' id='action' value='' />
    <input type='hidden' name='user' id='user' value='' />
  </form>
</div>
<?php echo '
<script type=\'text/javascript\'>
  function Logout()
  {
    document.getElementById(\'action\').value=\'logout\';
    document.getElementById(\'Main\').submit();
  }
  
  function changeUser(User, Name)
  {
    var xhttp = new XMLHttpRequest();
    document.getElementById(\'myName\').innerHTML=Name;
    
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("Weeks").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "index.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("action=user&user="+User);
  
  }
</script>
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mobile/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>