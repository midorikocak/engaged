<?php
if(in_array('Administrators',$this->Authake->getGroupNames())):
?>
<div class="btn-group actionButtons pull-right" style="z-index:89;">
	<a class="btn btn-mini btn-success dropdown-toggle" data-toggle="dropdown" href="#">
		<i class="icon-cog icon-white">
		</i>
		<?php echo __('Edit Category');?>
		<span class="caret">
		</span>
	</a>
	<ul class="dropdown-menu">
		<li>
			<a onclick="editCategory(<?php echo $category['Category']['id'];?>);" role="button" data-toggle="modal">
				<i class="icon-pencil">
				</i>
				<?php echo __('Edit');?>
			</a>
		</li>
		<li>
			<?php echo $this->Form->postLink("<i class='icon-trash'> </i>".__('Delete'), array('controller'=>'categories','action' => 'delete', $category['Category']['id']),array(
		        'escape' => false
		    ), null, __('Are you sure you want to delete # %s?', $category['Category']['title'])); ?>
		</li>
	</ul>
</div>
<?php endif;?>
