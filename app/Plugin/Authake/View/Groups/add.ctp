<?php $this->Html->addCrumb('New Group', $this->Html->url( null, true )); ?>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3>Crate a New Group</h3>
				<div class="section-actions">
					<a href="<?php echo $this->Html->url( array('controller'=> 'groups', 'action'=>'index')); ?>" class="btn btn-primary">Cancel</a>
				</div>
			</div>
			<div class="section-body">
				<?php echo $this->Form->create('Group');?>
				<div class="form-horizontal">
					<fieldset class="inputs">
						<legend>Group Information</legend>
						<div class="string control-group stringish" id="Login">
							<label class="control-label"><?php echo __('Name'); ?></label>
							<div class="controls">
							<?php echo $this->Form->input('name', array('label'=>false,'after'=>'</div>'));?>
						</div>
						<div class="string control-group stringish" id="Password">
							<label class="control-label"><?php echo __('Users in this group<br/>Press \'Control\' for multi-selection'); ?></label>
							<div class="controls">
							<?php 
								echo $this->Form->input('User', array('style'=>'width: 15em;', 'label'=>false, 'after'=>'<span class="help-inline">Select users if you want to add them to this group.</span></div>'));
							?>
						</div>
					</fieldset>
					<fieldset class="form-actions">
						<?php echo $this->Form->end(array('div'=>false,'label'=>'Submit','class'=>'action input-action btn btn-primary'));?>
						<a href="<?php echo $this->Html->url( array('controller'=> 'rules', 'action'=>'index')); ?>" class="btn btn-link">Cancel</a>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
</div>
