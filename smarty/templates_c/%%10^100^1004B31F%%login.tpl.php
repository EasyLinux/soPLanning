<?php /* Smarty version 2.6.29, created on 2017-04-28 13:01:44
         compiled from mobile/login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mobile/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="container-fluid">
	<div class="row">
    <div class="col-md-12"><h2>Visualisation planning</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" role="form" action"index.php" method="post">
				<div class="form-group">
					<label for="login" class="col-sm-2 control-label">
						Login
					</label>
					<div class="col-sm-10">
						<input class="form-control" id="login" name="login" type="text">
					</div>
				</div>
				<div class="form-group">
					 
					<label for="password" class="col-sm-2 control-label">
						Mot de passe
					</label>
					<div class="col-sm-10">
						<input class="form-control" id="password" name="password" type="password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">
							Se Connecter
						</button>
					</div>
          <input type='hidden' name="action" value="login" />
				</div>
			</form>
		</div>
<?php if ($this->_tpl_vars['erreur'] == 1): ?>    
		<div class="col-md-12">
      <h3 class="text-warning">
				Compte ou Mot de passe invalide
			</h3>
    </div>
<?php endif; ?>
  </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mobile/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>