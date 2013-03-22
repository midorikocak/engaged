<?php $this->Html->addCrumb('View Rule', $this->Html->url( null, true ));
$up = null;
//echo $this->Html->image($this->Gravatar->get_gravatar('mtkocak@gmail.com'));
?>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3><?php echo __('Rule');?>
				</h3>
				<div class="section-actions">
					<div class="btn-group">
						<?php echo $this->Html->link(__('Edit Rule'), array('action'=>'edit', $rule['Rule']['id']),array('class'=>'btn btn-primary')); ?>
						<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="<?php echo $this->Html->url(array('controller'=>'rules','action'=>'delete', $rule['Rule']['id'])); ?>" data-confirm="WARNING: This will also delete all data related to user <?php  echo sprintf(__('Rule %s'), "{$rule['Rule']['name']}"); ?>.

								This cannot be undone.

								Are you sure you want to delete <?php  echo sprintf(__('%s'), "{$rule['Rule']['name']}"); ?>?" data-disable-with="Deleting..." data-method="delete" rel="nofollow"><i class="icon-trash"></i>
								Delete Rule
							</a>
							</li>
						</ul>
					</div>
				</div>
			</div>	
			<div class="section-body">
				<div class="page-header">
					<h3>Rule Information</h3>
				</div>
				<table class="table table-outer-bordered table-striped">
					<tbody>
						<tr>
							<th class="span3"><?php echo __('Description'); ?></th>
							<td>
								<?php echo $rule['Rule']['name']; ?>
							</td>
						</tr>
						<tr>
							<th class="span3"><?php echo __('Group');?></th>
							<td>
								<?php if (!$rule['Group']['id'])
							echo "<strong>".__("Everybody, including not logged users")."</strong>";
							else
								echo $this->Html->link($rule['Group']['name'], array('controller'=> 'groups', 'action'=>'view', $rule['Group']['id']),array('class'=>'label')); ?>
							</td>
						</tr>
						<tr>
							<th class="span3"><?php echo __('Order'); ?></th>
							<td>
								<?php echo $rule['Rule']['order']; ?>
							</td>
						</tr>
						<tr>
							<th class="span3"><?php echo __('Action'); ?></th>
							<td>
								<?php echo str_replace(' or ', '<br/>', $rule['Rule']['action']); ?>
							</td>
						</tr>
						<tr>
							<th class="span3"><?php echo __('Permission'); ?></th>
							<td>
								<?php echo $this->Htmlbis->iconallowdeny($rule['Rule']['permission']);?>
							</td>
						</tr>
						<tr>
							<th class="span3"><?php echo __('Forward action on deny'); ?></th>
							<td>
								<?php
									$fw = $rule['Rule']['forward'];
									if ($fw)
										echo $fw;
									else
										echo __('Forward to the login page, or default deny action if logged');
								?>
							</td>
						</tr>
						<tr>
							<th class="span3"><?php echo __('Flash message on deny'); ?></th>
							<td>
								<?php
								$msg = $rule['Rule']['message'];
								if ($msg)
									echo $msg;
								else
									echo __('No output');
								?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="well well-small">
			<div class="btn-toolbar ac">
				<div class="btn-group">
					<?php echo $this->Html->link(__('Edit Rule'), array('action'=>'edit', $rule['Rule']['id']),array('class'=>'btn')); ?>
					<a href="<?php echo $this->Html->url(array('controller'=>'rules', 'action'=>'add')); ?>" class="btn" rel="facebox">
						New rule
					</a>
				</div>
			</div>
		</div>
			</div>
		</div>
	</div>
</div>