<?php $this->Html->addCrumb('View User', $this->Html->url( null, true ));
//echo $this->Html->image($this->Gravatar->get_gravatar('mtkocak@gmail.com'));
 ?>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3><?php  echo sprintf(__('User %s'), "<u>{$user['User']['login']}</u>"); ?></h3>
				<div class="section-actions">
					<div class="btn-group">
						<a class="btn btn-primary" href="">
							Edit User
						</a>
						<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'delete', $user['User']['id'])); ?>" data-confirm="WARNING: This will also delete all data related to user <?php  echo sprintf(__('User %s'), "{$user['User']['login']}"); ?>.

								This cannot be undone.

								Are you sure you want to delete <?php  echo sprintf(__('%s'), "{$user['User']['login']}"); ?>?" data-disable-with="Deleting..." data-method="delete" rel="nofollow"><i class="icon-trash"></i>
								Delete User
							</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="section-body">
				<div class="row-fluid">
					<div class="span2">
						<?php echo $this->Gravatar->get_gravatar($user['User']['email'],130,'','',true) ?>
					</div>
					<div class="span10">
					<div class="page-header">
						<h3>User Information</h3>
					</div>
					<?php 
					if ($user['User']['disable']) { 
						echo "<div class='alert alert-error'>".__('Account disabled')."</div>";
					} 
					?>
					<table class="table table-outer-bordered table-striped">
						<tbody>
							<tr>
								<th class="span3">User ID</th>
								<td>1
								</td>
							</tr>
							<tr>
								<th>Groups</th>
								<td>
									<div class="muted">
										<?php //pr($user['Group']);
									$gr = (count($user['Group'])) ? array() : array(__('Guest'));     // Specify Guest group if lonely group
									foreach($user['Group'] as $k=>$group)
										$gr[] = $this->Html->link(__($group['name']), array('controller'=>'groups', 'action'=>'view', $group['id']),array('class'=>'label'));

									echo implode('', $gr); ?>
									</div>
								</td>
							</tr>
							<tr>
								<th>Password Change Code</th>
								<td>
									<?php $j = $user['User']['passwordchangecode'];
									echo $j ? $j : __('No password change requested');
									?>
								</td>
							</tr>
							<tr>
								<th>Email Check Code</th>
								<td>
									<?php $j = $user['User']['emailcheckcode'];
								echo $j ? $j : __('No email change requested');
								?>
								</td>
							</tr>
							<tr>
								<th>Account Expires On</th>
								<td>
									<?php
									$exp = $user['User']['expire_account'];
										if ($exp != '0000-00-00')
											echo $exp;
										else
											echo __('Never');
									?>
								</td>
							</tr>
							<tr>
								<th>User Created</th>
								<td><?php echo $this->Time->format('d/m/Y H:i', $this->Time->fromString($user['User']['created'])); ?></td>
							</tr>
							<tr>
								<th>Updated On</th>
								<td><?php echo $this->Time->format('d/m/Y H:i', $this->Time->fromString($user['User']['updated'])); ?></td>
							</tr>
						</tbody>
					</table>
					<div class="well well-small">
						<div class="btn-toolbar ac">
							<div class="btn-group">
								<a href="<?php echo $this->Html->url(array('action'=>'edit', $user['User']['id'])); ?>" class="btn add_fuel_entry">
									<i class="picons-16-basic1-088"></i>Edit User
								</a>
								<a href="<?php echo str_replace('%2F', '/',$this->Html->url(array('action'=>'view', "{$user['User']['id']}/actions"))); ?>" class="btn add_note" rel="facebox">
									<i class="picons-16-basic2-095"></i>View allowed & denied actions
								</a>
							</div>
						</div>
					</div>
					<?php if (!empty($actions)) { ?>
						<div class="page-header">
							<h3><?php echo __('Allowed & denied actions');?></h3>
						</div>
						<table class="table table-outer-bordered table-striped">
							<?php
							foreach($actions as $controller => $ruleslist) {
							?>
							<tr>
								<td>
									<?php echo $controller; ?>
								</td>
								<td>
									<?php
									foreach($ruleslist as $k => $rule) 
									{
										if ($rule['permission'] == true)
										{
											echo '<span class="label label-success">'.$rule['action']."</span>";
										}
										else
										{
											echo '<span class="label label-important">'.$rule['action']."</span>";
										}
									}
									?>
								</td>
							</tr>
							<?php }
						}
							 ?>
						</table>
					<div class="page-header">
						<h3>Rules applied to <?php  echo sprintf(__('user %s'), "{$user['User']['login']}"); ?></h3>
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
</div>