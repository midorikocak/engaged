<?php $this->Html->addCrumb('Categories', $this->Html->url( null, true )); ?>
<div id="categoryIndexDynamicData"></div>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3>
					<?php echo __('Categories'); ?>					<small>
					<?php
					echo $this->Paginator->counter(array(
						'format' => __('Showing {:current} categories on this system.')
							));
						?>					</small>
				</h3>
				<div class="section-actions">
					<a role="button" class="btn btn-primary" data-toggle="modal" onclick="new<?php echo __('Category'); ?>();"><?php echo __('New Category'); ?></a>
				</div>
			</div>
			<div class="section-body">
				<div class="well well-small">
					<div class="row-fluid">
						<div class="span6">
							&nbsp;
						</div>
						<?php echo $this->Paginator->counter(array(
							'format' => '<div class="span2">
								<div class="ac stat-block" style="margin-bottom:0">
								<h3>
								{:current}
							</h3>
							<h6 class="stat-heading">
								'.__('Showing Categories').
								'</h6>
							</div>
							</div>
							<div class="span2">
								<div class="ac stat-block" style="margin-bottom:0">
								<h3>
								{:page}
							</h3>
							<h6 class="stat-heading">
								'.__('Page Number').
								'</h6>
							</div>
							</div>
							<div class="span2">
								<div class="ac stat-block" style="margin-bottom:0">
								<h3>
								{:pages}
							</h3>
							<h6 class="stat-heading">
								'.__('Total Pages').
								'</h6>
							</div>
							</div>'
							));
							?>					</div><!-- Row Fluid -->
					<div class="row-fluid">
						<div class="span12">
							<ul class="nav nav-pills" style="margin-top:4px;margin-bottom:0">
								<li class="active"><?php echo $this->Paginator->sort('id'); ?></li>
								<li class=""><?php echo $this->Paginator->sort('title'); ?></li>
								<li class=""><?php echo $this->Paginator->sort('parent_id'); ?></li>
								<li class=""><?php echo $this->Paginator->sort('status_id'); ?></li>
							</ul>
						</div>
					</div>
				</div>
				<table class="table table-outer-bordered">
					<tbody>
						<?php foreach ($categories as $category): ?>
						<tr>
							<td>
								<?php
								echo h($category['Category']['id']); ?>&nbsp;
							</td>
							<td>
								<?php
								echo h($category['Category']['title']); ?>&nbsp;
							</td>
							<td>
								<?php 
								echo $this->Html->link($category['ParentCategory']['title'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id'])); 
								?>
							</td>
							<td>
								<?php 
								echo $this->Html->link($category['Status']['title'], array('controller' => 'statuses', 'action' => 'view', $category['Status']['id'])); 
								?>
							</td>
							<td>
								<div class="btn-group pull-right">
									<a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
										<i class="icon-cog">
										</i>
										<span class="caret">
										</span>
									</a>
									<ul class="dropdown-menu pull-right">
									    <?php
									    if(empty($category['ChildCategory']))
										{
									    ?>
									    <li><a data-toggle="modal" onclick="newPin(<?php echo $category['Category']['id'];?>);"><?php echo __('Add Pin');?></a></li>
									    <?php
										}
									    if(empty($category['Entry']))
										{
										?>
										<li><a data-toggle="modal" onclick="newSubCategory(<?php echo $category['Category']['id'];?>);"><?php echo __('Add Child Category');?></a></li>
										<?php
										}
									    ?>
										<li><?php echo $this->Html->link("<i class='icon-arrow-right'></i>  ".__('View'), array('action' => 'view', $category['Category']['id']), array('escape'=>false, 'role'=>'button')); ?></li>
										<li><?php echo $this->Html->link("<i class='icon-pencil'></i>  ".__('Edit'), '#', array('data-toggle'=>'modal','onclick'=>'indexEditCategory('.$category['Category']['id'].');','escape'=>false, 'role'=>'button')); ?></li>
										<li><?php echo $this->Form->postLink("<i class='icon-trash'> </i>".__('Delete'), array('action' => 'delete', $category['Category']['id']),array('escape'=>false), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?></li>
									</ul>
								</div>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<div class="form-actions">
					<a role="button" class="btn btn-primary" data-toggle="modal" onclick="newCategory();"><?php 		echo __('New Category');?></a>
				</div>
			</div>
			<div class="form-actions">
				<div class="pagination">
					<ul>
						<?php
						echo '<li>'.$this->Paginator->prev('«', array(), null, array('class' => 'prev disabled')).'</li>';
						echo $this->Paginator->numbers(array('separator' => '', 'before'=>'<li>', 'after'=>'</li>'));
						echo '<li>'.$this->Paginator->next('»', array(), null, array('class' => 'next disabled')).'</li>';
						?>					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function indexEditCategory(categoryId)
{
	var link = "<?php echo $this->Html->url(array('controller'=>'categories','action'=>'edit')); ?>"+"/";
	$('#categoryIndexDynamicData').empty();
	$('#categoryIndexDynamicData').load(link+categoryId, function(data) {
		$('#editCategory').modal();
	});
	$('#editCategory').modal();
}
</script>