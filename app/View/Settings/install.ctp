<div id="content">
	<div class="container">
		<div class="section span6 offset3">
			<div class="row-fluid">
			    <?php echo $this->Form->create('Setting',array('type' => 'file')); ?>
	<div class="section-header">
				<h3><?php echo __('Install'); ?></h3>
	</div>
	<div class="section-body">
		<div class="form-horizontal">
			<fieldset class="inputs">
					<?php
		echo "<div class=\"string control-group stringish\" id=\"title\">";
		echo $this->Form->input('title', array('label'=>array('text'=>__('Title'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
    	echo "<div class=\"string control-group stringish\" id=\"logo\">";
    	echo $this->Form->input('logo', array('type' => 'file','label'=>array('text'=>__('Logo'),'class'=>'control-label'),'multiple'=>'false','between'=>'<div class="controls">', 'after'=>'<span class="help-inline"></span></div>'));
    	echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"slogan\">";
		echo $this->Form->input('slogan', array('label'=>array('text'=>__('Slogan'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"pinBackgroundColor\">";
		echo $this->Form->input('pinBackgroundColor', array('class'=>'minicolors','label'=>array('text'=>__('PinBackgroundColor'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"bodyBackgroundColor\">";
		echo $this->Form->input('bodyBackgroundColor', array('class'=>'minicolors','label'=>array('text'=>__('BodyBackgroundColor'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
    	echo "<div class=\"string control-group stringish\" id=\"backgroundImage\">";
    	echo $this->Form->input('backgroundImage', array('type' => 'file','label'=>array('text'=>__('Background Image'),'class'=>'control-label'),'multiple'=>'false','between'=>'<div class="controls">', 'after'=>'<span class="help-inline"></span></div>'));
    	echo "</div>";
		echo "<div class=\"string control-group stringish\" id=\"headerBackgroundColor\">";
		echo $this->Form->input('headerBackgroundColor', array('class'=>'minicolors','label'=>array('text'=>__('HeaderBackgroundColor'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));
		echo "</div>";
	?>
			</fieldset>
		</div>
	</div>
	<div class="section-footer">
	    <div class="control-group">
			<div class="form-actions">
		<?php echo $this->Form->end(array('div'=>false,'label'=>'Save','class'=>'action pull-right input-action btn btn-success'));?>
		</div>
		</div>
	</div>
</div>
</div>
</div>
</div>

<script>
$('.minicolors').minicolors();
</script>