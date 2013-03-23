<?php $this->Html->addCrumb('Statuses', $this->Html->url(array('controller'=>'statuses', 'action'=>'index'), true )); ?>
<?php $this->Html->addCrumb('View Status', $this->Html->url( null, true )); ?>
<div id="dynamicData"></div>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="row-fluid">
			<div class="section-header">
				<h3><?php  echo __('Status'); ?></h3>
				<div class="section-actions">
					<div class="btn-group">
						<a class="btn btn-primary" role="button" onclick="editStatus()" data-toggle="modal"><?php  echo __('Edit Status'); ?></a>
						<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right">
								
									<li><?php echo $this->Form->postLink("<i class='icon-trash'> </i>".__('Delete'), array('action' => 'delete', $status['Status']['id']),array('escape'=>false), null, __('Are you sure you want to delete # %s?', $status['Status']['id'])); ?></li>						</ul>
					</div>
				</div>
			</div>
			<div class="section-body">
				<div class="span12">
					<div class="page-header">
						<h3><?php  echo __('Status Information'); ?></h3>
					</div>
					<table class="table table-outer-bordered table-striped">
						<tbody>
									<tr>
									<th class="span3"><?php echo __('Status Id'); ?></th>
		<td>
			<?php echo h($status['Status']['id']); ?>
			&nbsp;
		</td>
									</tr>
		<tr>
									<th class="span3"><?php echo __('Status Title'); ?></th>
		<td>
			<?php echo h($status['Status']['title']); ?>
			&nbsp;
		</td>
									<tr>
						</tbody>
					</table>
					<div class="well well-small">
						<div class="btn-toolbar ac">
							<div class="btn-group">
								<a class="btn" onclick="editStatus()" role="button" data-toggle="modal"><?php  echo __('Edit Status'); ?></a>
							</div>
						</div>
					</div>
										<div class="page-header">
						<h3><?php echo __('Categories'); ?></h3>
					</div>
						<?php if (!empty($status['Category']))
						{
						        ?>
								<table class="table table-outer-bordered table-striped">
									<tbody>
						<?php
							$i = 0;
							foreach ($status['Category'] as $category): ?>
		<tr>
			<td><?php echo $category['id']; ?></td>
			<td><?php echo $category['title']; ?></td>
			<td><?php echo $category['parent_id']; ?></td>
			<td><?php echo $category['lft']; ?></td>
			<td><?php echo $category['rght']; ?></td>
			<td><?php echo $category['status_id']; ?></td>

					            	<td>
					            		<div class="btn-group pull-right">
					            			<a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
					            				<i class="icon-cog">
					            				</i>
					            				<span class="caret">
					            				</span>
					            			</a>
					            			<ul class="dropdown-menu pull-right">
					            				<li><?php echo $this->Html->link("<i class='icon-arrow-right'></i>  ".__('View'), array('action' => 'view', $category['id']), array('escape'=>false, 'role'=>'button')); ?></li>
					            				<li><?php echo $this->Html->link("<i class='icon-pencil'></i>  ".__('Edit'), '#', array('data-toggle'=>'modal','onclick'=>'indexEditCategories('.$category['id'].');','escape'=>false, 'role'=>'button')); ?></li>
					            				<li><?php echo $this->Form->postLink("<i class='icon-trash'> </i>".__('Delete'), array('action' => 'delete', $category['id']),array('escape'=>false), null, __('Are you sure you want to delete # %s?', $category['id'])); ?></li>
					            			</ul>
					            		</div>
					            	</td>
					            </tr>	<?php endforeach; ?>
					</tbody>
						</table>
					<?php 
					            }
					else
					{
						echo '<p>There are no any Categories yet</p>';
					}
					 ?>

					 	<div class="well well-small">
							<div class="btn-toolbar ac">
								<div class="btn-group">
								    <a class="btn" role="button" data-toggle="modal" onclick="newCategory()"><?php  echo __('New  Category'); ?>								    </a>
							    </div>
						    </div>
						</div>
					</div>
										<div class="page-header">
						<h3><?php echo __('Pins'); ?></h3>
					</div>
						<?php if (!empty($status['Pin']))
						{
						        ?>
								<table class="table table-outer-bordered table-striped">
									<tbody>
						<?php
							$i = 0;
							foreach ($status['Pin'] as $pin): ?>
		<tr>
			<td><?php echo $pin['id']; ?></td>
			<td><?php echo $pin['title']; ?></td>
			<td><?php echo $pin['link']; ?></td>
			<td><?php echo $pin['description']; ?></td>
			<td><?php echo $pin['picture']; ?></td>
			<td><?php echo $pin['category_id']; ?></td>
			<td><?php echo $pin['status_id']; ?></td>

					            	<td>
					            		<div class="btn-group pull-right">
					            			<a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
					            				<i class="icon-cog">
					            				</i>
					            				<span class="caret">
					            				</span>
					            			</a>
					            			<ul class="dropdown-menu pull-right">
					            				<li><?php echo $this->Html->link("<i class='icon-arrow-right'></i>  ".__('View'), array('action' => 'view', $pin['id']), array('escape'=>false, 'role'=>'button')); ?></li>
					            				<li><?php echo $this->Html->link("<i class='icon-pencil'></i>  ".__('Edit'), '#', array('data-toggle'=>'modal','onclick'=>'indexEditPins('.$pin['id'].');','escape'=>false, 'role'=>'button')); ?></li>
					            				<li><?php echo $this->Form->postLink("<i class='icon-trash'> </i>".__('Delete'), array('action' => 'delete', $pin['id']),array('escape'=>false), null, __('Are you sure you want to delete # %s?', $pin['id'])); ?></li>
					            			</ul>
					            		</div>
					            	</td>
					            </tr>	<?php endforeach; ?>
					</tbody>
						</table>
					<?php 
					            }
					else
					{
						echo '<p>There are no any Pins yet</p>';
					}
					 ?>

					 	<div class="well well-small">
							<div class="btn-toolbar ac">
								<div class="btn-group">
								    <a class="btn" role="button" data-toggle="modal" onclick="newPin()"><?php  echo __('New  Pin'); ?>								    </a>
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
</div>