<div class="journals index">
	<h2><?php echo __('Journals'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('usage_id'); ?></th>
			<th><?php echo $this->Paginator->sort('deposit'); ?></th>
			<th><?php echo $this->Paginator->sort('payment'); ?></th>
			<th><?php echo $this->Paginator->sort('balance'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($journals as $journal): ?>
	<tr>
		<td><?php echo h($journal['Journal']['id']); ?>&nbsp;</td>
		<td><?php echo h($journal['Journal']['created']); ?>&nbsp;</td>
		<td><?php echo h($journal['Journal']['modified']); ?>&nbsp;</td>
		<td><?php echo h($journal['Journal']['date']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($journal['Usage']['name'], array('controller' => 'usages', 'action' => 'view', $journal['Usage']['id'])); ?>
		</td>
		<td><?php echo h($journal['Journal']['deposit']); ?>&nbsp;</td>
		<td><?php echo h($journal['Journal']['payment']); ?>&nbsp;</td>
		<td><?php echo h($journal['Journal']['balance']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $journal['Journal']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $journal['Journal']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $journal['Journal']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $journal['Journal']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Journal'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usages'), array('controller' => 'usages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usage'), array('controller' => 'usages', 'action' => 'add')); ?> </li>
	</ul>
</div>
