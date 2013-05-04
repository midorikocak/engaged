<?php echo $this->Html->docType('html5'); ?>
<head>
	<title>
		<?php echo $title_for_layout ?>
	</title>
	<?php
	echo $this->Html->charset();
	echo $this->Html->meta('icon');
	$this->Html->css('/css/bootstrap.min', null, array('inline' => false));
	$this->Html->css('/css/admin', null, array('inline' => false));
	$this->Html->script('jquery-latest', array('block' => 'script'));
	$this->Html->script('bootstrap.min', array('block' => 'script'));
	$this->Html->script('html5shiv', array('block' => 'script'));

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
</head>
<body>
	<header>
		<div id="mainDynamicData"></div>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="<?php echo $this->Html->url( array('action'=>'index', 'controller'=>'pages')); ?>">Engaged</a>
					<ul class="nav pull-left">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a role="button" data-toggle="modal" onclick="newCategory();">New Category</a></li>
								<li><a href="<?php echo $this->Html->url( array('controller'=>'categories','action'=>'search')); ?>"><i class="icon-search"> </i> Search Categories</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo $this->Html->url( array('controller'=>'categories','action'=>'index')); ?>"><i class="icon-th-list"> </i> All Categories</a></li>
							</ul>
						</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pins <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a role="button" data-toggle="modal" onclick="newPin();">New Pin</a></li>
									<li><a href="<?php echo $this->Html->url( array('controller'=>'pins','action'=>'search')); ?>"><i class="icon-search"> </i> Search Pins</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo $this->Html->url( array('controller'=>'pins','action'=>'index')); ?>"><i class="icon-th-list"> </i> All Pins</a></li>
								</ul>
							</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Statuses <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a role="button" data-toggle="modal" onclick="newStatus();">New Status</a></li>
								<li><a href="<?php echo $this->Html->url( array('controller'=>'statuses','action'=>'index')); ?>"><i class="icon-th-list"> </i> All Statuses</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a role="button" data-toggle="modal" onclick="editSettings();">Edit Settings</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav pull-right">
						<?php
						if(isset($this->Authake)){
							echo $this->Authake->getUserMenu();
						}
						?>
						<li><a href="<?php echo $this->Html->url( array('controller'=>'pages','action'=>'help')); ?>">?</a></li>
					</ul>                    
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<?php
		if ($this->Session->check('Message.flash')):
			echo $this->Session->flash();
		endif;
		?>
		<?php 
		echo "<p class='breadcrumb'>".$this->Html->getCrumbs(' » ', array(
		'text' => 'Dashboard',
		'url' => array('controller' => 'pages', 'action' => 'index', 'home'),
		'escape' => false
		))."</p>";
		echo $this->fetch('content'); 
		?>
	</div>
	<footer>
	</footer>
</body>
</html>
<script>
function newStatus()
{
	var link = "<?php echo $this->Html->url(array('controller'=>'statuses','action'=>'add')); ?>"+"/";
	$('#mainDynamicData').empty();
	$('#mainDynamicData').load(link, function(data) {
		$('#addStatus').modal();
	});
	$('#addStatus').modal();
}
function newCategory()
{
	var link = "<?php echo $this->Html->url(array('controller'=>'categories','action'=>'add')); ?>"+"/";
	$('#mainDynamicData').empty();
	$('#mainDynamicData').load(link, function(data) {
		$('#addCategory').modal();
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
function editSettings(settingId)
{
	var link = "<?php echo $this->Html->url(array('controller'=>'settings','action'=>'edit')); ?>"+"/";
	$('#mainDynamicData').empty();
	$('#mainDynamicData').load(link+settingId, function(data) {
		$('#editSetting').modal();
	});
	$('#editSetting').modal();
}
</script>