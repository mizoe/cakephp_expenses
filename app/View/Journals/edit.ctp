<div class="journals form">
<?php echo $this->Form->create('Journal'); ?>
	<fieldset>
		<legend><?php echo __('Edit Journal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Journal.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Journal.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Journals'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usages'), array('controller' => 'usages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usage'), array('controller' => 'usages', 'action' => 'add')); ?> </li>
	</ul>
</div>
