<?php $this->Html->addCrumb('View Group', $this->Html->url( null, true ));
 ?>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3><?php  echo sprintf(__('Group %s'), "<u>{$group['Group']['name']}</u>"); ?></h3>
				<div class="section-actions">
					<div class="btn-group">
<?php echo $this->Html->link(__('Edit group'), array('action'=>'edit', $group['Group']['id']), array('class'=>'btn btn-primary')); ?>
						<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right">
							<?php if (!empty($actions)) { ?>
							        <li class="icon group"><a href="<?php echo $this->Html->url(array('action'=>'view', $group['Group']['id'])); ?>"><i class="icon-arrow-right"></i>View</a></li>
							<?php } ?>
							<?php if (empty($actions)) { ?>
							        <li class="icon lock"><a href="<?php echo $this->Html->url(array('action'=>'view', $group['Group']['id'] ,'actions')); ?>"><i class="icon-arrow-right"></i>View allowed & denied actions</a></li>
									<li>
										<a href="<?php echo $this->Html->url(array('controller'=>'groups','action'=>'delete', $group['Group']['id'])); ?>" data-confirm="WARNING: This will also delete all data related to user <?php  echo sprintf(__('Group %s'), "{$group['Group']['name']}"); ?>.

										This cannot be undone.

										Are you sure you want to delete <?php  echo sprintf(__('%s'), "{$group['Group']['name']}"); ?>?" data-disable-with="Deleting..." data-method="delete" rel="nofollow"><i class="icon-trash"></i>
										Delete Group
									</a>
									</li>
							<?php } ?> 
						</ul>
					</div>
				</div>
			</div>
			<div class="section-body">
				<div class="row-fluid">

					<div class="page-header">
						<h3><?php echo sprintf(__('Users in group %s'), $group['Group']['name']);?></h3>
					</div>
					<table class="table table-outer-bordered table-striped">
						<thead>
							<tr>
								<th>Login</th>
								<th>Email</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($group['User'] as $user):
							?>
						        <tr>
						            <td><?php echo $this->Html->link($user['login'], array('controller'=> 'users', 'action'=>'view', $user['id']));?></td>
						            <td><?php echo $user['email'];?></td>
						            <td>
											<div class="btn-group">
												<a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
													<i class="icon-cog">
													</i>
													<span class="caret">
													</span>
												</a>
												<ul class="dropdown-menu pull-right">
													<li>
														<a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'view', $user['id'])); ?>">
															<i class="icon-arrow-right">
															</i>
															View
														</a>
													</li>
													<li>
														<a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'edit', $user['id'])); ?>">
															<i class="icon-pencil">
															</i>
															Edit
														</a>
													</li>
											</ul>
										</div>
						            </td>
						        </tr>
						    <?php endforeach; ?>
						</tbody>
					</table>
					<div class="well well-small">
						<div class="btn-toolbar ac">
							<div class="btn-group">
								<a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index')); ?>" class="btn add_fuel_entry">
									<i class="picons-16-basic1-088"></i>Manage Users
								</a>
							</div>
						</div>
					</div>
					<div class="page-header">
						<h3><?php echo sprintf(__('Rules applied to the group %s'), $group['Group']['name']);?></h3>
					</div>
					<table class="table table-outer-bordered">
						<tbody>
							<?php
							foreach ($rules as $r):
								$rule = $r['Rule'];
								?>
							<tr>
								<td>
									<?php echo $rule['name'];?>
								</td>
								<td>
									<td><?php echo $this->Htmlbis->iconallowdeny($rule['permission']); ?></td>
								</td>
								<td><?php
								echo str_replace(' or ', '<br/>', $rule['action']);
								?></td>
								<td>
									<div class="btn-group">
										<a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="icon-cog">
											</i>
											<span class="caret">
											</span>
										</a>
										<ul class="dropdown-menu pull-right">
											<li>
												<a href="<?php echo $this->Html->url(array('controller'=> 'rules', 'action'=>'view', $rule['id']));?>">
													<i class="icon-arrow-right">
													</i>
													View
												</a>
											</li>
											<li>
												<a href="<?php echo $this->Html->url(array('controller'=> 'rules', 'action'=>'edit', $rule['id']));?>">
													<i class="icon-pencil">
													</i>
													Edit
												</a>
											</li>
											<li>
												<a href="<?php echo $this->Html->url(array('controller'=> 'rules', 'action'=>'delete', $rule['id']));?>" data-confirm="WARNING: This will also delete all data related to rule <?php echo $rule['name'];?>
												This cannot be undone.
												Are you sure you want to delete <?php echo $rule['name'];?>?" data-disable-with="Deleting..." data-method="delete" rel="nofollow">
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
					<div class="well well-small">
						<div class="btn-toolbar ac">
							<div class="btn-group">
								<a href="<?php echo $this->Html->url(array('controller'=>'rules', 'action'=>'add')); ?>" class="btn">
									New Rule
								</a>
								<a href="<?php echo $this->Html->url(array('controller'=>'rules', 'action'=>'index')); ?>" class="btn" rel="facebox">
									Manage rules
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>