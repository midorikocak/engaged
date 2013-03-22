<?php $this->Html->addCrumb('Statuses', $this->Html->url( null, true )); ?>
<div id="statusIndexDynamicData"></div>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3>
					<?php echo __('Statuses'); ?>					<small>
					<?php
					echo $this->Paginator->counter(array(
						'format' => __('Showing {:current} statuses on this system.')
							));
						?>					</small>
				</h3>
				<div class="section-actions">
					<a role="button" class="btn btn-primary" data-toggle="modal" onclick="new<?php echo __('Status'); ?>();"><?php echo __('New Status'); ?></a>
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
								'.__('Showing Statuses').
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
							</ul>
						</div>
					</div>
				</div>
				<table class="table table-outer-bordered">
					<tbody>
						<?php foreach ($statuses as $status): ?>
						<tr>
							<td>
								<?php
								echo h($status['Status']['id']); ?>&nbsp;
							</td>
							<td>
								<?php
								echo h($status['Status']['title']); ?>&nbsp;
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
										<li><?php echo $this->Html->link("<i class='icon-arrow-right'></i>  ".__('View'), array('action' => 'view', $status['Status']['id']), array('escape'=>false, 'role'=>'button')); ?></li>
										<li><?php echo $this->Html->link("<i class='icon-pencil'></i>  ".__('Edit'), '#', array('data-toggle'=>'modal','onclick'=>'indexEditStatus('.$status['Status']['id'].');','escape'=>false, 'role'=>'button')); ?></li>
										<li><?php echo $this->Form->postLink("<i class='icon-trash'> </i>".__('Delete'), array('action' => 'delete', $status['Status']['id']),array('escape'=>false), null, __('Are you sure you want to delete # %s?', $status['Status']['id'])); ?></li>
									</ul>
								</div>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<div class="form-actions">
					<a role="button" class="btn btn-primary" data-toggle="modal" onclick="newStatus();"><?php 		echo __('New Status');?></a>
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
function indexEditStatus(statusId)
{
	var link = "<?php echo $this->Html->url(array('controller'=>'statuses','action'=>'edit')); ?>"+"/";
	$('#statusIndexDynamicData').empty();
	$('#statusIndexDynamicData').load(link+statusId, function(data) {
		$('#editStatus').modal();
	});
	$('#editStatus').modal();
}
</script>