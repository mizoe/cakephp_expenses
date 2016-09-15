<div class="usages form">
<?php echo $this->Form->create('Usage'); ?>
	<fieldset>
		<legend><?php echo __('Edit Usage'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Usage.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Usage.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Usages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Journals'), array('controller' => 'journals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Journal'), array('controller' => 'journals', 'action' => 'add')); ?> </li>
	</ul>
</div>
