<div id="authake">
<?php echo $this->element('gotohomepage'); ?>
<div class="changemypassword form">
<?php echo $this->Form->create(null, array('url' => array('controller' => 'user', 'action'=>'changemypassword')));?>
<fieldset class="mypassword">
    <?php echo $this->Form->input('email', array('label'=>'Email', 'size'=>'40'));?>
    <?php echo $this->Form->input('code', array('label'=>'Code', 'size'=>'40'));?>
    <?php echo $this->Form->input('password1', array('label'=>'New password', 'type'=>'password', 'value' => '', 'size'=>'12'));?>
    <?php echo $this->Form->input('password2', array('label'=>'Please re-enter password', 'type'=>'password', 'value' => '', 'size'=>'12'));?>
</fieldset>
<?php echo $this->Form->end(__('Change my password now'))  ?>
</div>
</div>
        
        
