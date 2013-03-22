<?php $this->Html->addCrumb('New Rule', $this->Html->url( null, true )); ?>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3>Add a New Rule</h3>
				<div class="section-actions">
					<a href="<?php echo $this->Html->url( array('controller'=> 'rules', 'action'=>'index')); ?>" class="btn btn-primary">Cancel</a>
				</div>
			</div>
			<div class="section-body">
				<?php echo $this->Form->create('Rule');?>
				<div class="form-horizontal">
					<fieldset class="inputs">
						<legend>Rule Information</legend>
						<div class="string control-group stringish" id="Login">
							<label class="control-label"><?php echo __('Description'); ?></label>
							<div class="controls">
							<?php echo $this->Form->input('name', array('label'=>false, 'type'=>'textarea', 'cols'=>'50', 'rows'=>'2', 'after'=>'<span class="help-inline">Description of the Rule</span></div>'));?>
						</div>
						<div class="string control-group stringish" id="Password">
							<label class="control-label"><?php echo __('Group'); ?></label>
							<div class="controls">
							<?php echo $this->Form->input('group_id', array('label'=>false, 'empty'=>true, 'after'=>'<span class="help-inline">Groups that this Rule is applied</span></div>'));?>
						</div>
						<div class="string control-group stringish" id="Order">
							<label class="control-label"><?php echo __('Order'); ?></label>
							<div class="controls">
							<?php echo $this->Form->input('order', array('label'=>false, 'after'=>'<span class="help-inline">The order of importance.</span></div>'));?>
						</div>
						<div class="string control-group stringish" id="Group">
							<label class="control-label">Action <br /> (perl regex)</label>
							<div class="controls">
							<?php echo $this->Form->input('action', array('label'=>false, 'type'=>'textarea', 'cols'=>'50', 'rows'=>'3', 'after'=>'<span class="help-inline">Action that defines Rule. You can use Regular Expressions.</span>'));?>
							</div>
						</div>
						<div class="string control-group stringish" id="Group">
							<label class="control-label"><?php echo __('Permission'); ?></label>
							<div class="controls">
							<?php echo $this->Form->select('permission', array('1' => 'Allow', '0' => 'Deny'), array('label'=>false, 'empty'=>false, 'style'=>'width: 5em;','escape' => false,'between'=>'<div class="controls">'));?>
							<span class="help-inline">Permission Type. Allow / Deny</span>
							</div>
						</div>
						<div class="string control-group stringish" id="Group">
							<?php echo $this->Form->input('forward', array('label'=>array('text'=>__('Forward action on error'),'class'=>'control-label'),'between'=>'<div class="controls">', 'after'=>'<span class="help-inline">The route to be forwarded after allowed rule.</span></div>'));?>
						</div>
						<div class="string control-group stringish" id="Group">
							<?php echo $this->Form->input('message', array('label'=>array('text'=>__('Flash message on deny'),'class'=>'control-label'), 'type'=>'textarea', 'cols'=>'50', 'rows'=>'2','between'=>'<div class="controls">', 'after'=>'<span class="help-inline">Deny message on failed entry.</span></div>'));?>
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