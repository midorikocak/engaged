<div id="addPin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel"><?php echo __('New Pin'); ?></h3>
	</div>
	<div class="modal-body">
		<?php echo $this->Form->create('Pin',array('type' => 'file')); ?>
		<div class="form-horizontal">
			<fieldset class="inputs">
					<?php
		echo "<div class=\"string control-group stringish\" id=\"title\">";
		echo $this->Form->input('title', array('label'=>array('text'=>__('Title'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"link\">";
		echo $this->Form->input('link', array('type' => 'string','label'=>array('text'=>__('Link'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"description\">";
		echo $this->Form->input('description', array('label'=>array('text'=>__('Description'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"picture\">";
		echo $this->Form->input('picture', array('type' => 'file','label'=>array('text'=>__('Picture'),'class'=>'control-label'),'multiple'=>'false','between'=>'<div class="controls">', 'after'=>'<span class="help-inline"></span></div>'));
		echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"category_id\">";
		echo $this->Form->input('category_id', array('label'=>array('text'=>__('Category Id'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"status_id\">";
		echo $this->Form->input('status_id', array('label'=>array('text'=>__('Status Id'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
	?>
			</fieldset>
		</div>
	</div>
	<div class="modal-footer">
		<?php echo $this->Form->end(array('div'=>false,'label'=>'Save','class'=>'action input-action btn btn-success'));?>
	</div>
</div>