<?php $this->Html->addCrumb('Settings', $this->Html->url( null, true )); ?>
<div id="settingIndexDynamicData"></div>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3>
					<?php echo __('Settings'); ?>					<small>
					<?php
					echo $this->Paginator->counter(array(
						'format' => __('Showing {:current} settings on this system.')
							));
						?>					</small>
				</h3>
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
								'.__('Showing Settings').
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
								<li class=""><?php echo $this->Paginator->sort('logo'); ?></li>
								<li class=""><?php echo $this->Paginator->sort('slogan'); ?></li>
								<li class=""><?php echo $this->Paginator->sort('pinBackgroundColor'); ?></li>
								<li class=""><?php echo $this->Paginator->sort('bodyBackgroundColor'); ?></li>
								<li class=""><?php echo $this->Paginator->sort('backgroundImage'); ?></li>
								<li class=""><?php echo $this->Paginator->sort('headerBackgroundColor'); ?></li>
							</ul>
						</div>
					</div>
				</div>
				<table class="table table-outer-bordered">
					<tbody>
						<?php foreach ($settings as $setting): ?>
						<tr>
							<td>
								<?php
								echo h($setting['Setting']['id']); ?>&nbsp;
							</td>
							<td>
								<?php
								echo h($setting['Setting']['title']); ?>&nbsp;
							</td>
							<td>
								<?php
								echo h($setting['Setting']['logo']); ?>&nbsp;
							</td>
							<td>
								<?php
								echo h($setting['Setting']['slogan']); ?>&nbsp;
							</td>
							<td>
								<?php
								echo h($setting['Setting']['pinBackgroundColor']); ?>&nbsp;
							</td>
							<td>
								<?php
								echo h($setting['Setting']['bodyBackgroundColor']); ?>&nbsp;
							</td>
							<td>
								<?php
								echo h($setting['Setting']['backgroundImage']); ?>&nbsp;
							</td>
							<td>
								<?php
								echo h($setting['Setting']['headerBackgroundColor']); ?>&nbsp;
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
										<li><?php echo $this->Html->link("<i class='icon-arrow-right'></i>  ".__('View'), array('action' => 'view', $setting['Setting']['id']), array('escape'=>false, 'role'=>'button')); ?></li>
										<li><?php echo $this->Html->link("<i class='icon-pencil'></i>  ".__('Edit'), '#', array('data-toggle'=>'modal','onclick'=>'indexEditSetting('.$setting['Setting']['id'].');','escape'=>false, 'role'=>'button')); ?></li>
										<li><?php echo $this->Form->postLink("<i class='icon-trash'> </i>".__('Delete'), array('action' => 'delete', $setting['Setting']['id']),array('escape'=>false), null, __('Are you sure you want to delete # %s?', $setting['Setting']['id'])); ?></li>
									</ul>
								</div>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
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
function indexEditSetting(settingId)
{
	var link = "<?php echo $this->Html->url(array('controller'=>'settings','action'=>'edit')); ?>"+"/";
	$('#settingIndexDynamicData').empty();
	$('#settingIndexDynamicData').load(link+settingId, function(data) {
		$('#editSetting').modal();
	});
	$('#editSetting').modal();
}
</script>