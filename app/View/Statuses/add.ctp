<div id="addStatus" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel"><?php echo __('New Status'); ?></h3>
	</div>
	<div class="modal-body">
		<?php echo $this->Form->create('Status'); ?>
		<div class="form-horizontal">
			<fieldset class="inputs">
					<?php
		echo "<div class=\"string control-group stringish\" id=\"title\">";
		echo $this->Form->input('title', array('label'=>array('text'=>__('Title'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
	?>
			</fieldset>
		</div>
	</div>
	<div class="modal-footer">
		<?php echo $this->Form->end(array('div'=>false,'label'=>'Save','class'=>'action input-action btn btn-success'));?>
	</div>
</div>