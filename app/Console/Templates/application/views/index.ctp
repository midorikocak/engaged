<?php echo "<?php \$this->Html->addCrumb('{$pluralHumanName}', \$this->Html->url( null, true )); ?>\n" ?>
<div id="<?php echo $singularVar; ?>IndexDynamicData"></div>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3>
					<?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?>
					<small>
					<?php echo "<?php
					echo \$this->Paginator->counter(array(
						'format' => __('Showing {:current} {$pluralVar} on this system.')
							));
						?>"; 
					?>
					</small>
				</h3>
				<div class="section-actions">
					<a role="button" class="btn btn-primary" data-toggle="modal" onclick="new<?php echo "<?php echo __('{$singularHumanName}'); ?>"; ?>();"><?php echo "<?php echo __('New {$singularHumanName}'); ?>"; ?></a>
				</div>
			</div>
			<div class="section-body">
				<div class="well well-small">
					<div class="row-fluid">
						<div class="span6">
							&nbsp;
						</div>
<?php echo "\t\t\t\t\t\t<?php echo \$this->Paginator->counter(array(
							'format' => '<div class=\"span2\">
								<div class=\"ac stat-block\" style=\"margin-bottom:0\">
								<h3>
								{:current}
							</h3>
							<h6 class=\"stat-heading\">
								'.__('Showing {$pluralHumanName}').
								'</h6>
							</div>
							</div>
							<div class=\"span2\">
								<div class=\"ac stat-block\" style=\"margin-bottom:0\">
								<h3>
								{:page}
							</h3>
							<h6 class=\"stat-heading\">
								'.__('Page Number').
								'</h6>
							</div>
							</div>
							<div class=\"span2\">
								<div class=\"ac stat-block\" style=\"margin-bottom:0\">
								<h3>
								{:pages}
							</h3>
							<h6 class=\"stat-heading\">
								'.__('Total Pages').
								'</h6>
							</div>
							</div>'
							));
							?>"; 
?>
					</div><!-- Row Fluid -->
					<div class="row-fluid">
						<div class="span12">
							<ul class="nav nav-pills" style="margin-top:4px;margin-bottom:0">
								<?php
								$counter = 0;
								foreach ($fields as $field)
								{
									$counter++;
								
									if($counter==1)
									{
										echo "<li class=\"active\"><?php echo \$this->Paginator->sort('{$field}'); ?></li>";
									}
									else
									{
										echo "
								<li class=\"\"><?php echo \$this->Paginator->sort('{$field}'); ?></li>";
									}
								}
								echo "
";
								?>
							</ul>
						</div>
					</div>
				</div>
				<table class="table table-outer-bordered">
					<tbody>
						<?php
						echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>";
						echo "
						<tr>";
						foreach ($fields as $field)
						{
							$isKey = false;
							if (!empty($associations['belongsTo'])) 
							{
								foreach ($associations['belongsTo'] as $alias => $details) {
									if ($field === $details['foreignKey']) {
										$isKey = true;
										echo "
							<td>
								<?php 
								echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); 
								?>
							</td>";
										break;
									}
								}
							}
							if ($isKey !== true)
							{
								echo "
							<td>
								<?php
								echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;
							</td>";
							}
						}
						echo "
							<td>
								<div class=\"btn-group pull-right\">
									<a class=\"btn btn-mini dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
										<i class=\"icon-cog\">
										</i>
										<span class=\"caret\">
										</span>
									</a>
									<ul class=\"dropdown-menu pull-right\">";
									echo "
										<li><?php echo \$this->Html->link(\"<i class='icon-arrow-right'></i>  \".__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape'=>false, 'role'=>'button')); ?></li>";
									echo "
										<li><?php echo \$this->Html->link(\"<i class='icon-pencil'></i>  \".__('Edit'), '#', array('data-toggle'=>'modal','onclick'=>'indexEdit{$singularHumanName}('.\${$singularVar}['{$modelClass}']['$primaryKey'].');','escape'=>false, 'role'=>'button')); ?></li>";
									echo "
										<li><?php echo \$this->Form->postLink(\"<i class='icon-trash'> </i>\".__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('escape'=>false), null, __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?></li>";
									echo "
									</ul>";
									echo "
								</div>";
									echo "
							</td>";
								echo "
						</tr>";
			
								echo "
						<?php endforeach; ?>\n";
						?>
					</tbody>
				</table>
				<div class="form-actions">
					<a role="button" class="btn btn-primary" data-toggle="modal" onclick="new<?php echo $singularHumanName; ?>();"><?php echo "<?php \t\techo __('New {$singularHumanName}');?>";?></a>
				</div>
			</div>
			<div class="form-actions">
				<div class="pagination">
					<ul>
						<?php echo "<?php
						echo '<li>'.\$this->Paginator->prev('«', array(), null, array('class' => 'prev disabled')).'</li>';
						echo \$this->Paginator->numbers(array('separator' => '', 'before'=>'<li>', 'after'=>'</li>'));
						echo '<li>'.\$this->Paginator->next('»', array(), null, array('class' => 'next disabled')).'</li>';
						?>";
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function indexEdit<?php echo $singularHumanName; ?>(<?php echo $singularVar; ?>Id)
{
	var link = "<?php echo "<?php echo \$this->Html->url(array('controller'=>'{$pluralVar}','action'=>'edit')); ?>"; ?>"+"/";
	$('#<?php echo $singularVar; ?>IndexDynamicData').empty();
	$('#<?php echo $singularVar; ?>IndexDynamicData').load(link+<?php echo $singularVar; ?>Id, function(data) {
		$('#edit<?php echo $singularHumanName; ?>').modal();
	});
	$('#edit<?php echo $singularHumanName; ?>').modal();
}
</script>