<?php $this->Html->addCrumb('Groups', $this->Html->url( null, true ));
$up = null;
//echo $this->Html->image($this->Gravatar->get_gravatar('mtkocak@gmail.com'));
?>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3><?php echo __('Groups');?>
					<small>
						<?php
					echo $this->Paginator->counter(array(
						'format' => __('There are %current% groups on this system.')
							));
						?>
					</small>
				</h3>
				<div class="section-actions">
					<div class="btn-group">
						<a class="btn btn-primary" href="<?php echo $this->Html->url(array('controller'=>'groups','action'=>'add')); ?>">
							New Group
						</a>
					</div>
				</div>
			</div>
			<div class="section-body">
				<table class="table table-outer-bordered">
					<tbody>
						<?php
					foreach ($groups as $group):
						?>
						<tr>
							<td>
								<?php echo $this->Html->link($group['Group']['name'], array('action'=>'view', $group['Group']['id'])); ?>
							</td>
							<td>
								<div class="btn-group">
									<a class="btn btn-mini dropdown-toggle pull-right" data-toggle="dropdown" href="#">
										<i class="icon-cog">
										</i>
										<span class="caret">
										</span>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="<?php echo $this->Html->url(array('controller'=>'groups','action'=>'view', $group['Group']['id'])); ?>">
												<i class="icon-arrow-right">
												</i>
												View
											</a>
										</li>
										<li>
											<a href="<?php echo $this->Html->url(array('controller'=>'groups', 'action'=>'edit', $group['Group']['id'])); ?>">
												<i class="icon-pencil">
												</i>
												Edit
											</a>
										</li>
										<li>
											<a href="<?php echo $this->Html->url( array('controller'=>'groups', 'action'=>'delete', $group['Group']['id']))?>" data-confirm="WARNING: This will also delete all data related to userss.
												This cannot be undone.
												Are you sure you want to delete <?php echo $group['Group']['name']; ?>?" data-disable-with="Deleting..." data-method="delete" rel="nofollow">
												<i class="icon-trash"> </i>
												Delete
											</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<div class="form-actions">
				<a href="<?php echo $this->Html->url(array('controller'=>'groups','action'=>'add')); ?>" class="btn btn-primary">
					New Group
				</a>
			</div>
		</div>
	</div>
</div>
</div>