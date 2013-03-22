<?php echo $this->Html->docType('html5'); ?>
<head>
    <title>
        <?php echo $title_for_layout ?>
    </title>
    <?php
    echo $this->Html->charset('utf8');
    echo $this->Html->meta('icon');
    $this->Html->css('/css/bootstrap.min', null, array('inline' => false));
    $this->Html->css('/css/bootstrap-responsive', null, array('inline' => false));
    $this->Html->css('/css/jquery.minicolors', null, array('inline' => false));
    
    Cache::set(array('duration' => '+1 year'));
    $settings = Cache::read("Settings","long");
    if(!empty($settings))
    {
$this->Html->css('/css/custom.css.php?pinBackgroundColor='.$settings['Setting']['pinBackgroundColor'].'&bodyBackgroundColor='.$settings['Setting']['bodyBackgroundColor'].'&headerBackgroundColor='.$settings['Setting']['headerBackgroundColor'].'&backgroundImage='.urlencode($settings['Setting']['backgroundImage']), null, array('inline' => false));
    }
    else
    {
        $this->Html->css('/css/custom.css.php?php', null, array('inline' => false));
    }
    ?>
        
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
    <?php
    
    // Scripts
    $this->Html->script('jquery.minicolors', array('block' => 'script'));
    $this->Html->script('bootstrap.min', array('block' => 'script'));
    $this->Html->script('jquery.masonry.min', array('block' => 'script'));
    $this->Html->script('jquery.imagesloaded.min', array('block' => 'script'));
    $this->Html->script('html5shiv', array('block' => 'script'));
    $this->Html->script('custom', array('block' => 'script'));

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
    <header>
    <div id="mainDynamicData"></div>
    <div class="container">
        <div class="row">
            <div class="span4">
            </div>
            <div class="span3" id="logo">
                <?php
                if(isset($settings['Setting']['title']))
                {
                    if(isset($settings['Setting']['logo']))
                    {
                        echo $this->Html->link($this->Html->image($settings['Setting']['logo'], array('alt' => $settings['Setting']['title'])),'/',array('escape' => false));
                    }
                    else
                    {
                        echo "<h1>".$this->Html->link($settings['Setting']['title'],'/')."</h1>";
                    }
                }
                else
                {
                    echo $this->Html->link($this->Html->image('logo.png', array('alt' => 'Engaged')),'/',array('escape' => false));
                }
                ?>
                <p><small><?php
                
                if(isset($settings['Setting']['slogan']))
                {
                    echo $settings['Setting']['slogan'];
                }
                else
                {
                    echo "Yet Another Pinterest Clone";
                }
                
                ?></small></p>
            </div>
            <div class="span5" id="lang">
            <p class="pull-right">
                <br>
              <?php 
              echo $this->Html->link('TR', array('controller'=>'settings','action' => 'setLang', 1));
              echo " ";
              echo $this->Html->link('ENG', array('controller'=>'settings','action' => 'setLang', 2));
              ?>
              </p>
            </div>
        </div>
    </div>
    <div class="navbar navbar-static-top">
        <div class="navbar-inner">
            <div class="container">
                <div class="nav-collapse collapse">
                    <div class="search">
                        <?php
                        echo $this->Form->create('Pin',array('url' => array('controller'=>'pins','action'=>'search'),'class'=>'navbar-form pull-right'));
                        echo $this->Form->input('search', array('label'=>false,'placeholder'=>__('Search'),'class'=>'span2','div'=>false)); 
                        echo $this->Form->end(array('div'=>false,'label'=>__('Search'),'class'=>'btn'));
                        ?>
                    </div>
                    <?php
                    if(in_array('Administrators',$this->Authake->getGroupNames())):
                    ?>
                    <div class="btn-group actionButtons pull-left" style="margin-right:3px; z-index:89;">
                    	<a class="btn btn-mini btn-danger" onclick="newPin();">
                    		<i class="icon-cog icon-white">
                    		</i>
                    		<?php echo __('Add Pin');?>
                    	</a>
                    </div>
                    <?php
                    if(!empty($settings)):
                    ?>
                    <div class="btn-group actionButtons pull-left" style="margin-right:3px; z-index:89;">
                    	<a class="btn btn-mini btn-primary" onclick="editSettings(<?php echo $settings['Setting']['id'];?>);">
                    		<i class="icon-cog icon-white">
                    		</i>
                    		<?php echo __('Edit Page Settings');?>
                    	</a>
                    </div>
                    <?php endif;?>
                    <?php endif;?>
                    <div class="offset3">
        					<?php
        					echo $this->element('widgetNormalLinks');
        					?>
                    </div>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
    </header>
    <div class="container">
        <?php echo $this->fetch('content'); ?>
        <hr>
        <footer>
            <p>&copy; Company 2013</p>
        </footer>
    </div> <!-- /container -->
    <?php
    if(in_array('Administrators',$this->Authake->getGroupNames()))
    {
        ?>
        <script>
            function newCategory(parentCategoryId)
            {
            	var link = "<?php echo $this->Html->url(array('controller'=>'categories','action'=>'add')); ?>"+"/";
            	$('#mainDynamicData').empty();
            	$('#mainDynamicData').load(link+parentCategoryId, function(data) {
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
            function addPin(categoryId)
            {
            	var link = "<?php echo $this->Html->url(array('controller'=>'pins','action'=>'add')); ?>"+"/";
            	$('#mainDynamicData').empty();
            	$('#mainDynamicData').load(link+categoryId, function(data) {
            		$('#addPin').modal();
            	});
            	$('#addPin').modal();
            }
            function editCategory(categoryId)
            {
            	var link = "<?php echo $this->Html->url(array('controller'=>'categories','action'=>'edit')); ?>"+"/";
            	$('#mainDynamicData').empty();
            	$('#mainDynamicData').load(link+categoryId, function(data) {
            		$('#editCategory').modal();
            	});
            	$('#editCategory').modal();
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
        <?php
    }
    ?>
</body>
</html>
