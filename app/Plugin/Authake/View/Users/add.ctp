<?php $this->Html->addCrumb('New User', $this->Html->url( null, true )); ?>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3>Add a New User</h3>
				<div class="section-actions">
					<a href="<?php echo $this->Html->url( array('controller'=> 'users', 'action'=>'index')); ?>" class="btn btn-primary">Cancel</a>
				</div>
			</div>
			<div class="section-body">
				<?php echo $this->Form->create('User');?>
				<div class="form-horizontal">
					<fieldset class="inputs">
						<legend>User Information</legend>
						<div class="string control-group stringish" id="Login">
							<?php echo $this->Form->input('login', array('label'=>array('text'=>__('Login'),'class'=>'control-label'),'between'=>'<div class="controls">', 'after'=>'<span class="help-inline">Username used when login. If configured, can be email.</span></div>'));?>
						</div>
						<div class="string control-group stringish" id="Password">
							<?php echo $this->Form->input('password', array('label'=>array('text'=>__('Password'),'class'=>'control-label'),'size'=>'12' ,'between'=>'<div class="controls">', 'after'=>'<span class="help-inline">User\'s password. Choose a strong one.</span></div>'));?>
						</div>
						<div class="string control-group stringish" id="Email">
							<?php echo $this->Form->input('email', array('label'=>array('text'=>__('Email'),'class'=>'control-label'),'size'=>'40', 'between'=>'<div class="controls">', 'after'=>'<span class="help-inline">User\'s email address. Choose a real one. Confirmation goes to this email.</span></div>'));?>
						</div>
						<div class="string control-group stringish" id="Group">
							<?php echo $this->Form->input('Group', array('label'=>array('text'=>__('In groups Press \'Control\' for multi-selection'),'class'=>'control-label'),'style'=>'width: 15em;', 'between'=>'<div class="controls">', 'after'=>'</div>'));?>
							</div>
							<div class="string control-group stringish" id="Email">
								<div class="controls">
									<label class="checkbox">
										<?php 
									echo $this->Form->checkbox('disable');
									?> Disable User
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="form-actions">
						<?php echo $this->Form->end(array('div'=>false,'label'=>'Create','class'=>'action input-action btn btn-primary'));?>
						<a href="<?php echo $this->Html->url( array('controller'=> 'users', 'action'=>'index')); ?>" class="btn btn-link">Cancel</a>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
</div>