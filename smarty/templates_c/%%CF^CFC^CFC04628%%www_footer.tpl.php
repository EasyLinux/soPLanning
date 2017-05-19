<?php /* Smarty version 2.6.29, created on 2017-04-28 12:43:24
         compiled from www_footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'www_footer.tpl', 52, false),)), $this); ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "myfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="pwdReminderModal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3><?php echo $this->_config[0]['vars']['rappelPwdTitre']; ?>
</h3>
					</div>
					<div class="modal-body">
						<input type="text" id="rappel_pwd" placeholder="<?php echo $this->_config[0]['vars']['rappelPwdVotreEmail']; ?>
" class="form-control" />
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" id="changePwd"><?php echo $this->_config[0]['vars']['submit']; ?>
</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal" id="divFormSupport" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title"><?php echo $this->_config[0]['vars']['formContact_titre']; ?>
</h3>
					</div>
					<div class="modal-body">
						<form class="form-horizontal">
							<input type="hidden" id="form_contact_version" value="<?php echo $this->_tpl_vars['infoVersion']; ?>
" />
							<div class="form-group">
								<label for="form_contact_email" class="col-md-3 control-label"><?php echo $this->_config[0]['vars']['formContact_email']; ?>
 :</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="form_contact_email" value="<?php if (isset ( $this->_tpl_vars['user'] ) && $this->_tpl_vars['user']['email'] != ''): ?><?php echo $this->_tpl_vars['user']['email']; ?>
<?php endif; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="form_contact_commentaire" class="col-md-3 control-label"><?php echo $this->_config[0]['vars']['formContact_commentaire']; ?>
 :</label>
								<div class="col-md-9">
									<textarea class="form-control" id="form_contact_commentaire"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-3"></div>
								<div class="col-md-8">
									<label class="checkbox-inline">
										<input type="checkbox" id="form_contact_abo" value="1" checked="checked" />&nbsp;<?php echo $this->_config[0]['vars']['formContact_newsletter']; ?>

									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-3"></div>
								<div class="col-md-6">
									<input type="button" class="btn btn-primary" onClick="if(confirm('<?php echo ((is_array($_tmp=$this->_config[0]['vars']['confirm'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
'))xajax_submitFormContact($(form_contact_version).value, $(form_contact_email).value, $(form_contact_commentaire).value, $(form_contact_abo).checked);" value="<?php echo $this->_config[0]['vars']['formContact_envoyer']; ?>
" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal" id="myModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title">...</h3>
					</div>
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>
		<div class="modal" id="alertModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>
		<div class="modal" id="myBigModal" tabindex="-1">
			<div class="modal-dialog modalBig">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title">...</h3>
					</div>
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>
		<div class="modal modalMiddle" id="myMiddleModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title">...</h3>
					</div>
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
						addEvent(window, 'load', initAll);
			<?php echo '
			jQuery(function() {
				jQuery( ".modal" ).draggable({
					cursor: "move",
					handle: "h3"
				});
			});
			'; ?>

		</script>
	</body>
</html>