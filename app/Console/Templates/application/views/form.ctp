<div id="<?php echo $action.$singularHumanName;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<?php
		if (strpos($action, 'add') !== false)
		{
			$editOrNew = 'New';
		}
		else
		{
			$editOrNew = 'Edit';
		}
		?>
		<h3 id="myModalLabel"><?php printf("<?php echo __('%s %s'); ?>", $editOrNew, $singularHumanName);?></h3>
	</div>
	<div class="modal-body">
		<?php echo "<?php echo \$this->Form->create('{$modelClass}'); ?>\n"; ?>
		<div class="form-horizontal">
			<fieldset class="inputs">
				<?php
				echo "\t<?php\n";
				foreach ($fields as $field) {
					if (strpos($action, 'add') !== false && $field == $primaryKey) {
						continue;
					} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
						echo "\t\techo \"<div class=\\\"string control-group stringish\\\" id=\\\"{$field}\\\">\";\n";
						echo "\t\techo \$this->Form->input('{$field}', array('label'=>array('text'=>__('".Inflector::humanize($field)."'),'class'=>'control-label'), 'between'=>'<div class=\"controls\">', 'after'=>'</div>'));\n";
						echo "\t\techo \"</div>\";\n";
					}
				}
				if (!empty($associations['hasAndBelongsToMany'])) {
					foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
						echo "<div class=\"string control-group stringish\" id=\"{$assocName}\">";
						echo "\t\techo \$this->Form->input('{$assocName}', array('label'=>array('text'=>__('".Inflector::humanize($assocName)."'),'class'=>'control-label'), 'between'=>'<div class=\"controls\">', 'after'=>'</div>'));\n";
						echo '</div>';
					}
				}
				echo "\t?>\n";
				?>
			</fieldset>
		</div>
	</div>
	<div class="modal-footer">
		<?php echo "<?php echo \$this->Form->end(array('div'=>false,'label'=>'Save','class'=>'action input-action btn btn-success'));?>\n" ?>
	</div>
</div>