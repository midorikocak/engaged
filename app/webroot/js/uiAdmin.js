function newCategory()
{
	var link = "<?php echo $this->Html->url(array('controller'=>'categories','action'=>'add')); ?>"+"/";
	$('#mainDynamicData').empty();
	$('#mainDynamicData').load(link, function(data) {
		$('#addCategory').modal();
		alert(data);
	});
	$('#addCategory').modal();
}
function newPin()
{
	var link = "<?php echo $this->Html->url(array('controller'=>'pins','action'=>'add')); ?>"+"/";
	$('#mainDynamicData').empty();
	$('#mainDynamicData').load(link, function(data) {
		$('#addPin').modal();
	});
	$('#addPin').modal();
}