<?php $this->Html->addCrumb('Settings', $this->Html->url(array('controller'=>'settings', 'action'=>'index'), true )); ?>
<?php $this->Html->addCrumb('View Setting', $this->Html->url( null, true )); ?>
<div id="dynamicData"></div>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="row-fluid">
			<div class="section-header">
				<h3><?php  echo __('Setting'); ?></h3>
				<div class="section-actions">
					<div class="btn-group">
						<a class="btn btn-primary" role="button" onclick="editSetting()" data-toggle="modal"><?php  echo __('Edit Setting'); ?></a>
						<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right">
								
									<li><?php echo $this->Form->postLink("<i class='icon-trash'> </i>".__('Delete'), array('action' => 'delete', $setting['Setting']['id']),array('escape'=>false), null, __('Are you sure you want to delete # %s?', $setting['Setting']['id'])); ?></li>						</ul>
					</div>
				</div>
			</div>
			<div class="section-body">
				<div class="span12">
					<div class="page-header">
						<h3><?php  echo __('Setting Information'); ?></h3>
					</div>
					<table class="table table-outer-bordered table-striped">
						<tbody>
									<tr>
									<th class="span3"><?php echo __('Setting Id'); ?></th>
		<td>
			<?php echo h($setting['Setting']['id']); ?>
			&nbsp;
		</td>
									</tr>
		<tr>
									<th class="span3"><?php echo __('Setting Title'); ?></th>
		<td>
			<?php echo h($setting['Setting']['title']); ?>
			&nbsp;
		</td>
									</tr>
		<tr>
									<th class="span3"><?php echo __('Setting Logo'); ?></th>
		<td>
			<?php echo h($setting['Setting']['logo']); ?>
			&nbsp;
		</td>
									</tr>
		<tr>
									<th class="span3"><?php echo __('Setting Slogan'); ?></th>
		<td>
			<?php echo h($setting['Setting']['slogan']); ?>
			&nbsp;
		</td>
									</tr>
		<tr>
									<th class="span3"><?php echo __('Setting PinBackgroundColor'); ?></th>
		<td>
			<?php echo h($setting['Setting']['pinBackgroundColor']); ?>
			&nbsp;
		</td>
									</tr>
		<tr>
									<th class="span3"><?php echo __('Setting BodyBackgroundColor'); ?></th>
		<td>
			<?php echo h($setting['Setting']['bodyBackgroundColor']); ?>
			&nbsp;
		</td>
									</tr>
		<tr>
									<th class="span3"><?php echo __('Setting BackgroundImage'); ?></th>
		<td>
			<?php echo h($setting['Setting']['backgroundImage']); ?>
			&nbsp;
		</td>
									</tr>
		<tr>
									<th class="span3"><?php echo __('Setting HeaderBackgroundColor'); ?></th>
		<td>
			<?php echo h($setting['Setting']['headerBackgroundColor']); ?>
			&nbsp;
		</td>
									<tr>
						</tbody>
					</table>
					<div class="well well-small">
						<div class="btn-toolbar ac">
							<div class="btn-group">
								<a class="btn" onclick="editSetting()" role="button" data-toggle="modal"><?php  echo __('Edit Setting'); ?></a>
							</div>
						</div>
					</div>
									</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>