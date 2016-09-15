<div class="journals form">
<?php echo $this->Form->create('Journal'); ?>
	<fieldset>
		<legend><?php echo __('Add Journal'); ?></legend>
	<?php
		echo $this->Form->input('date', array('timeFormat' => '24'));
		echo $this->Form->input('usage_id');
		echo $this->Form->input('deposit');
		echo $this->Form->input('payment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Journals'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usages'), array('controller' => 'usages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usage'), array('controller' => 'usages', 'action' => 'add')); ?> </li>
	</ul>
</div>
