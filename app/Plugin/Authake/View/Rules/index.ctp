<?php $this->Html->addCrumb('New Rule', $this->Html->url( null, true ));
$up = null;
//echo $this->Html->image($this->Gravatar->get_gravatar('mtkocak@gmail.com'));
 ?>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3><?php echo __('Rules');?>
					<small>
						List of all rules applied in your system.
					</small>
				</h3>
				<div class="section-actions">
					<div class="btn-group">
						<a class="btn btn-primary" href="<?php echo $this->Html->url(array('controller'=>'rules','action'=>'add')); ?>">
							New Rule
						</a>
					</div>
				</div>
			</div>
			<div class="section-body">
				<table class="table table-outer-bordered">
				    <thead>
				        <tr>
				        <th><?php echo __('Description');?></th>
				    	<th><?php echo __('Group');?></th>
				        <th>&nbsp;</th>
				    	<th><?php echo __('Action');?></th>
				    	<th class="actions"><?php echo __('Actions');?></th>
				        <th><?php echo __('Order');?></th>
				        </tr>
				    </thead>
					<tbody>
						<?php
						foreach ($rules as $k => $rule):
						?>
						<tr>
							<td>
								<?php //echo $rule['Rule']['name'];?>
								<?php echo $this->Htmlbis->link($rule['Rule']['name'], array('action'=>'view', $rule['Rule']['id'])); ?>
							</td>
							<td>
								<?php

					             $groupname = $rule['Group']['name'];

					             if ($rule['Group']['id'])
					                echo '<a href="'.$this->Html->url(array('controller'=> 'groups', 'action'=>'view', $rule['Group']['id'])).'" class="label">'.$groupname.'</a>';
					            else
					                echo $groupname;

					            ?>
							</td>

							<td><?php echo $this->Htmlbis->iconallowdeny($rule['Rule']['permission']); ?></td>

							<td><?php
							echo str_replace(' or ', '<br/>', $rule['Rule']['action']);
							?></td>
							<td>
								<div class="btn-group">
									<a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
										<i class="icon-cog">
										</i>
										<span class="caret">
										</span>
									</a>
									<?php if ($rule['Rule']['id'] != 1) { ?>  
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="<?php echo $this->Html->url(array('controller'=> 'rules', 'action'=>'view', $rule['Rule']['id']));?>">
												<i class="icon-arrow-right">
												</i>
												View
											</a>
										</li>
										<li>
											<a href="<?php echo $this->Html->url(array('controller'=> 'rules', 'action'=>'edit', $rule['Rule']['id']));?>">
												<i class="icon-pencil">
												</i>
												Edit
											</a>
										</li>
										<li>
											<a href="<?php echo $this->Html->url(array('controller'=> 'rules', 'action'=>'delete', $rule['Rule']['id']));?>" data-confirm="WARNING: This will also delete all data related to rule <?php echo $rule['Rule']['name'];?>
											This cannot be undone.
											Are you sure you want to delete <?php echo $rule['Rule']['name'];?>?" data-disable-with="Deleting..." data-method="delete" rel="nofollow">
											<i class="icon-trash"> </i>
											Delete
											</a>
										</li>
										           <?php

				                                   if ($up) {
				                                       echo '<li>'.$this->Htmlbis->iconlink('arrow_up', __('Move up'), array('action'=>'up', $rule['Rule']['id'], $up)).'</li>';
				                                   } else {
				                                       echo '<li>'.$this->Htmlbis->iconlink('empty', '', array('action'=>'')).'</li>';
				                                   }
				                                   $up = $rule['Rule']['id'];

				                                   $down = $rules[$k+1]['Rule']['id'];
				                                   if ($down>1) {
				                                       echo '<li>'.$this->Htmlbis->iconlink('arrow_down', __('Move down'), array('action'=>'up', $rule['Rule']['id'], $down)).'</li>';
				                                   } else {
				                                       echo '<li>'.$this->Htmlbis->iconlink('empty', '', array('action'=>'')).'</li>';
				                                   }

				                               }
				                        ?>
									</ul>
								</div>
							</td>
							<td>
				                <?php if (($rule['Rule']['id']) != 1) echo $rule['Rule']['order']; ?>
				            </td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>