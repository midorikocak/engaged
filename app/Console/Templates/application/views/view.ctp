<?php 
echo "<?php \$this->Html->addCrumb('{$pluralHumanName}', \$this->Html->url(array('controller'=>'{$pluralVar}', 'action'=>'index'), true )); ?>\n";
echo "<?php \$this->Html->addCrumb('View {$singularHumanName}', \$this->Html->url( null, true )); ?>\n"; 
?>
<div id="dynamicData"></div>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="row-fluid">
			<div class="section-header">
				<h3><?php echo "<?php  echo __('{$singularHumanName}'); ?>"; ?></h3>
				<div class="section-actions">
					<div class="btn-group">
						<a class="btn btn-primary" role="button" onclick="edit<?php echo $singularHumanName;?>()" data-toggle="modal"><?php echo "<?php  echo __('Edit {$singularHumanName}'); ?>"; ?></a>
						<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right">
								<?php
								echo "
									<li><?php echo \$this->Form->postLink(\"<i class='icon-trash'> </i>\".__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('escape'=>false), null, __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?></li>";
								?>
						</ul>
					</div>
				</div>
			</div>
			<div class="section-body">
				<div class="span12">
					<div class="page-header">
						<h3><?php echo "<?php  echo __('{$singularHumanName} Information'); ?>"; ?></h3>
					</div>
					<table class="table table-outer-bordered table-striped">
						<tbody>
							<?php
							foreach ($fields as $field) {
								$isKey = false;
								if (!empty($associations['belongsTo'])) {
									foreach ($associations['belongsTo'] as $alias => $details) {
										if ($field === $details['foreignKey']) {
											$isKey = true;
											echo "\t\t<tr>
											<th class=\"span3\"><?php echo __('{$singularHumanName} " . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></th>\n";
											echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t&nbsp;\n\t\t</td>
											<tr>\n";
											break;
										}
									}
								}
								if ($isKey !== true) {
									echo "\t\t<tr>
									<th class=\"span3\"><?php echo __('{$singularHumanName} " . Inflector::humanize($field) . "'); ?></th>\n";
									echo "\t\t<td>\n\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t&nbsp;\n\t\t</td>
									<tr>\n";
								}
							}
							?>
						</tbody>
					</table>
					<div class="well well-small">
						<div class="btn-toolbar ac">
							<div class="btn-group">
								<a class="btn" onclick="edit<?php echo $singularHumanName;?>()" role="button" data-toggle="modal"><?php echo "<?php  echo __('Edit {$singularHumanName}'); ?>"; ?></a>
							</div>
						</div>
					</div>
					<?php
					if (!empty($associations['hasOne'])) :
						foreach ($associations['hasOne'] as $alias => $details): ?>
						<div class="page-header">
							<h3><?php echo "<?php echo __('" . Inflector::humanize($details['controller']) . "'); ?>"; ?></h3>
						</div>
						<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])){ ?>\n"; ?>
							<table class="table table-outer-bordered table-striped">
								<tbody>
						<?php
								foreach ($details['fields'] as $field) {
									echo "\t\t<th class=\"span3\"><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
									echo "\t\t<td>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</td>\n";
								}
						?>
						        </tbody>
							</table>
						<?php echo "<?php 
						}
						else
						{
						echo __('There are no '" . Inflector::humanize($field) . "' yet');    
						}
						 ?>\n"; ?>
							<div class="well well-small">
								<div class="btn-toolbar ac">
									<div class="btn-group">
									    <a role="button" data-toggle="modal" onclick="edit<?php echo Inflector::humanize(Inflector::underscore($alias))
									    ."(\${$singularVar}['{$alias}']['{$details['primaryKey']}'])";  ?>"><?php "<?php  echo __('Edit {$singularHumanName}'); ?>"; ?>
									    </a>
								    </div>
							    </div>
							</div>
						<?php
						endforeach;
					endif;
					if (empty($associations['hasMany'])) {
						$associations['hasMany'] = array();
					}
					if (empty($associations['hasAndBelongsToMany'])) {
						$associations['hasAndBelongsToMany'] = array();
					}
					$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
					$i = 0;
					foreach ($relations as $alias => $details):
						$otherSingularVar = Inflector::variable($alias);
						$otherPluralHumanName = Inflector::humanize($details['controller']);
						?>
					<div class="page-header">
						<h3><?php echo "<?php echo __('" . $otherPluralHumanName . "'); ?>"; ?></h3>
					</div>
						<?php echo "<?php if (!empty(\${$singularVar}['{$alias}']))
						{
						        ?>\n"; ?>
								<table class="table table-outer-bordered table-striped">
									<tbody>
					<?php
					echo "\t<?php
							\$i = 0;
							foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
							echo "\t\t<tr>\n";
								foreach ($details['fields'] as $field) {
									echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?></td>\n";
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
					            				<li><?php echo \$this->Html->link(\"<i class='icon-arrow-right'></i>  \".__('View'), array('action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']), array('escape'=>false, 'role'=>'button')); ?></li>";
					            			echo "
					            				<li><?php echo \$this->Html->link(\"<i class='icon-pencil'></i>  \".__('Edit'), '#', array('data-toggle'=>'modal','onclick'=>'indexEdit{$otherPluralHumanName}('.\${$otherSingularVar}['{$details['primaryKey']}'].');','escape'=>false, 'role'=>'button')); ?></li>";
					            			echo "
					            				<li><?php echo \$this->Form->postLink(\"<i class='icon-trash'> </i>\".__('Delete'), array('action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']),array('escape'=>false), null, __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?></li>";
					            			echo "
					            			</ul>";
					            			echo "
					            		</div>";
					            			echo "
					            	</td>";
					            		echo "
					            </tr>";

					echo "\t<?php endforeach; ?>\n";
					?>
					</tbody>
						</table>
					<?php echo "<?php 
					            }
					else
					{
						echo '<p>There are no any {$otherPluralHumanName} yet</p>';
					}
					 ?>\n\n"; ?>
					 	<div class="well well-small">
							<div class="btn-toolbar ac">
								<div class="btn-group">
								    <a class="btn" role="button" data-toggle="modal" onclick="new<?php echo Inflector::humanize(Inflector::underscore($alias))
								    ."()";  ?>"><?php echo "<?php  echo __('New  ".Inflector::humanize(Inflector::underscore($alias)) ."'); ?>"; ?>
								    </a>
							    </div>
						    </div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>