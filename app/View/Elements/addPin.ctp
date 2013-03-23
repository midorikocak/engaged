<?php
if($this->Authake->getUserId()):
?>
<div class="btn-group actionButtons pull-right" style="margin-right:3px; z-index:89;">
	<a class="btn btn-mini btn-danger" onclick="addPin(<?php echo $category['Category']['id'];?>);">
		<i class="icon-cog icon-white">
		</i>
		<?php echo __('Add Pin Here');?>
	</a>
</div>
<?php endif;?>