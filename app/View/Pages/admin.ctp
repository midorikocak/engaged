<div class="row-fluid">
	<div class="span6">
		<div class="row-fluid">
			<div class="span6">
				<div class="section section-small">
					<div class="section-header">
						<h5>Users</h5>
					</div>
					<div class="section-body">
						<div class="row-fluid">
							<div class="span6 ac">
								<div class="stat-block">
									<h1 class="success"><?php echo $adminCount;?></h1>
									<h6 class="stat-heading">Admins</h6>
								</div>
							</div>
							<div class="span6 ac">
								<div class="stat-block">
									<h1 class="success"><?php echo $userCount;?></h1>
									<h6 class="stat-heading">Total Users</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="section section-small">
					<div class="section-header">
						<h5>Groups & Rules</h5>
					</div>
					<div class="section-body">
						<div class="row-fluid">
							<div class="span6 ac">
								<div class="stat-block">
									<h1 class="success"><?php echo $groupCount;?></h1>
									<h6 class="stat-heading">Groups</h6>
								</div>
							</div>
							<div class="span6 ac">
								<div class="stat-block">
									<h1 class="success"><?php echo $ruleCount;?></h1>
									<h6 class="stat-heading">Rules</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="span6">
		<div class="section section-small">
			<div class="section-header">
				<h5>News from the Author</h5>
			</div>
			<div class="section-body">
				<div class="row-fluid">
					<script src="http://widgets.twimg.com/j/2/widget.js" type="text/javascript">
					</script> <script type="text/javascript">
					new TWTR.Widget({
						version: 2,
						type: 'profile',
						rpp: 20,
						interval: 6000,
						width: 'auto',
						height: 500,
						theme: {
							shell: {
								background: '#ffffff',
								color: '#000000'
							},
							tweets: {
								background: '#ffffff',
								color: '#000000',
								links: '#0748eb'
							}
						},
						features: {
							scrollbar: true,
							loop: false,
							live: true,
							hashtags: true,
							timestamp: true,
							avatars: false,
							behavior: 'all'
						}
						}).render().setUser('mtkocak').start();
						</script>
	
				</div>
			</div>
		</div>
	</div>
</div>