<h3><?php echo sprintf(__('Your e-mail verification at %s'),  $service);?></h3>
<p><?php echo __('You registered at our service.');?> <?php echo __('To ensure that this e-mail is valid, please follow this link:');?></p>
<p><?php
$url = $this->Html->url(array('plugin'=>'authake', 'controller'=>'user', 'action'=>'verify', $code), true);
echo $this->Html->link(__('Click here to verify'), $url);?>
</p>
<p><?php echo sprintf(__('Verification code: %s'), $code);?></p>
<p><?php echo __('Best regards');?><br/><?php echo $service;?></p>