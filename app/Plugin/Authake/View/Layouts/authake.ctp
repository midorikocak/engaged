<?php echo $this->Html->docType('html5'); ?>
<head>
	<title>
		<?php echo $title_for_layout ?>
	</title>
	<?php
	echo $this->Html->charset();
	echo $this->Html->meta('icon');
	$this->Html->css('/authake/css/bootstrap.min', null, array('inline' => false));
	$this->Html->css('/authake/css/custom', null, array('inline' => false));
	$this->Html->script('Authake.jquery-latest', array('block' => 'script'));
	$this->Html->script('Authake.custom', array('block' => 'script'));
	$this->Html->script('Authake.bootstrap.min', array('block' => 'script'));
	$this->Html->script('Authake.html5shiv', array('block' => 'script'));

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
</head>
<body>
	<header>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="									<?php echo $this->Html->url( array('action'=>'index', 'controller'=>'authake')); ?>">Authake</a>
					<ul class="nav pull-left">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link(__('New User'), array('controller'=>'users','action'=>'add')); ?></li>
								<li class="divider"></li>
								<li><a href="<?php echo $this->Html->url( array('controller'=>'users','action'=>'index')); ?>"><i class="icon-th-list"> </i> All Users</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Groups <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link(__('New Group'), array('controller'=>'groups','action'=>'add')); ?></li>
								<li class="divider"></li>
								<li><a href="<?php echo $this->Html->url( array('controller'=>'groups','action'=>'index')); ?>"><i class="icon-th-list"> </i> All Groups</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Rules <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link(__('New Rule'), array('controller'=>'rules','action'=>'add')); ?></li>
								<li class="divider"></li>
								<li><a href="<?php echo $this->Html->url( array('controller'=>'rules','action'=>'index')); ?>"><i class="icon-th-list"> </i> All Rules</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav pull-right">
						<li><a href="<?php echo $this->Html->url( array('controller'=>'authake','action'=>'settings')); ?>">Settings</a></li>
						<?php echo $this->Authake->getUserMenu(); ?>
						<li class="divider-vertical"></li>
						<li><a href="<?php echo $this->Html->url( array('controller'=>'authake','action'=>'help')); ?>"><i class="icon-comment icon-white"></i> Help</a></li>
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
		'url' => array('controller' => 'authake', 'action' => 'index', 'home'),
		'escape' => false
		))."</p>";
		echo $this->fetch('content'); 
		?>
	</div>
	<footer>
	</footer>
</body>
</html>