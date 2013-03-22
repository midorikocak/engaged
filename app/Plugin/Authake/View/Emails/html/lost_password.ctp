<h3><?php echo sprintf(__('You requested a password change at %s'),  $service);?></h3>
<p><?php echo __('Following the link below you can change your password:');?></p>
<p><?php
$url = $this->Html->url(array('plugin'=>'authake', 'controller'=>'user', 'action'=>'pass', $code), true);
echo $this->Html->link(__('Click here to change your password'), $url);?>
</p>
<p><?php echo sprintf(__('Verification code: %s'), $code);?></p>
<p><?php echo __("If you don't request this change, no action is required. Your password will remain the same until you don't activate this code.");?></p>
<p><?php echo __('Best regards');?><br/><?php echo $service;?></p>