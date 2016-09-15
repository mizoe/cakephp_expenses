<div class="journals view">
<h2><?php echo __('Journal'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($journal['Journal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($journal['Journal']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($journal['Journal']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($journal['Journal']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usage'); ?></dt>
		<dd>
			<?php echo $this->Html->link($journal['Usage']['name'], array('controller' => 'usages', 'action' => 'view', $journal['Usage']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deposit'); ?></dt>
		<dd>
			<?php echo h($journal['Journal']['deposit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment'); ?></dt>
		<dd>
			<?php echo h($journal['Journal']['payment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Balance'); ?></dt>
		<dd>
			<?php echo h($journal['Journal']['balance']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Journal'), array('action' => 'edit', $journal['Journal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Journal'), array('action' => 'delete', $journal['Journal']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $journal['Journal']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Journals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Journal'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usages'), array('controller' => 'usages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usage'), array('controller' => 'usages', 'action' => 'add')); ?> </li>
	</ul>
</div>
