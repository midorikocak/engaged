<div id="addSetting" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel"><?php echo __('New Setting'); ?></h3>
	</div>
	<div class="modal-body">
		<?php echo $this->Form->create('Setting',array('type' => 'file')); ?>
		<div class="form-horizontal">
			<fieldset class="inputs">
					<?php
		echo "<div class=\"string control-group stringish\" id=\"title\">";
		echo $this->Form->input('title', array('label'=>array('text'=>__('Title'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"logo\">";
		echo $this->Form->input('logo', array('label'=>array('text'=>__('Logo'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"slogan\">";
		echo $this->Form->input('slogan', array('label'=>array('text'=>__('Slogan'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"pinBackgroundColor\">";
		echo $this->Form->input('pinBackgroundColor', array('label'=>array('text'=>__('PinBackgroundColor'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"bodyBackgroundColor\">";
		echo $this->Form->input('bodyBackgroundColor', array('label'=>array('text'=>__('BodyBackgroundColor'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"backgroundImage\">";
		echo $this->Form->input('backgroundImage', array('label'=>array('text'=>__('BackgroundImage'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"headerBackgroundColor\">";
		echo $this->Form->input('headerBackgroundColor', array('label'=>array('text'=>__('HeaderBackgroundColor'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
	?>
			</fieldset>
		</div>
	</div>
	<div class="modal-footer">
		<?php echo $this->Form->end(array('div'=>false,'label'=>'Save','class'=>'action input-action btn btn-success'));?>
	</div>
</div>