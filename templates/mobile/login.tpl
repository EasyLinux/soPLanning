{include file="mobile/header.tpl"}
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
{if $erreur == 1}    
		<div class="col-md-12">
      <h3 class="text-warning">
				Compte ou Mot de passe invalide
			</h3>
    </div>
{/if}
  </div>
</div>

{include file="mobile/footer.tpl"}