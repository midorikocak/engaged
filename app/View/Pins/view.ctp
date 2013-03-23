<?php $this->Html->addCrumb('Pins', $this->Html->url(array('controller'=>'pins', 'action'=>'index'), true )); ?>
<?php $this->Html->addCrumb('View Pin', $this->Html->url( null, true )); ?>
<div id="dynamicData"></div>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="row-fluid">
			<div class="section-header">
				<h3><?php  echo __('Pin'); ?></h3>
				<div class="section-actions">
					<div class="btn-group">
						<a class="btn btn-primary" role="button" onclick="editPin()" data-toggle="modal"><?php  echo __('Edit Pin'); ?></a>
						<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right">
								
									<li><?php echo $this->Form->postLink("<i class='icon-trash'> </i>".__('Delete'), array('action' => 'delete', $pin['Pin']['id']),array('escape'=>false), null, __('Are you sure you want to delete # %s?', $pin['Pin']['id'])); ?></li>						</ul>
					</div>
				</div>
			</div>
			<div class="section-body">
				<div class="span12">
					<div class="page-header">
						<h3><?php  echo __('Information'); ?></h3>
					</div>
					<table class="table table-outer-bordered table-striped">
						<tbody>
									<tr>
									<th class="span3"><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($pin['Pin']['id']); ?>
			&nbsp;
		</td>
									</tr>
		<tr>
									<th class="span3"><?php echo __('Title'); ?></th>
		<td>
			<?php echo h($pin['Pin']['title']); ?>
			&nbsp;
		</td>
									</tr>
		<tr>
									<th class="span3"><?php echo __('Link'); ?></th>
		<td>
			<?php echo h($pin['Pin']['link']); ?>
			&nbsp;
		</td>
									</tr>
		<tr>
									<th class="span3"><?php echo __('Description'); ?></th>
		<td>
			<?php echo h($pin['Pin']['description']); ?>
			&nbsp;
		</td>
									</tr>
		<tr>
									<th class="span3"><?php echo __('Picture'); ?></th>
		<td>
			<?php echo h($pin['Pin']['picture']); ?>
			&nbsp;
		</td>
									</tr>
		<tr>
											<th class="span3"><?php echo __('Category'); ?></th>
		<td>
			<?php echo $this->Html->link($pin['Category']['title'], array('controller' => 'categories', 'action' => 'view', $pin['Category']['id'])); ?>
			&nbsp;
		</td>
											</tr>
		<tr>
											<th class="span3"><?php echo __('Status'); ?></th>
		<td>
			<?php echo $this->Html->link($pin['Status']['title'], array('controller' => 'statuses', 'action' => 'view', $pin['Status']['id'])); ?>
			&nbsp;
		</td>
											</tr>
											<tr>
                                    											<th class="span3"><?php echo __('User'); ?></th>
                                    		<td>
                                    			<?php echo $this->Html->link($pin['User']['login'], array('plugin'=>'Authake','controller' => 'users', 'action' => 'view', $pin['User']['id'])); ?>
                                    			&nbsp;
                                    		</td>
                                    											</tr>
						</tbody>
					</table>
					<div class="well well-small">
						<div class="btn-toolbar ac">
							<div class="btn-group">
								<a class="btn" onclick="editPin()" role="button" data-toggle="modal"><?php  echo __('Edit Pin'); ?></a>
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