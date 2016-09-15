<div class="usages view">
<h2><?php echo __('Usage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usage'), array('action' => 'edit', $usage['Usage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usage'), array('action' => 'delete', $usage['Usage']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $usage['Usage']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Usages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usage'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Journals'), array('controller' => 'journals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Journal'), array('controller' => 'journals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Journals'); ?></h3>
	<?php if (!empty($usage['Journal'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Usage Id'); ?></th>
		<th><?php echo __('Deposit'); ?></th>
		<th><?php echo __('Payment'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($usage['Journal'] as $journal): ?>
		<tr>
			<td><?php echo $journal['id']; ?></td>
			<td><?php echo $journal['created']; ?></td>
			<td><?php echo $journal['modified']; ?></td>
			<td><?php echo $journal['date']; ?></td>
			<td><?php echo $journal['usage_id']; ?></td>
			<td><?php echo $journal['deposit']; ?></td>
			<td><?php echo $journal['payment']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'journals', 'action' => 'view', $journal['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'journals', 'action' => 'edit', $journal['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'journals', 'action' => 'delete', $journal['id']), array('confirm' => __('Are you sure you want to delete # %s?', $journal['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Journal'), array('controller' => 'journals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
