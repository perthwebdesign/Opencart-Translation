<div class="customers view">
<h2><?php  echo __('Customer');?></h2>
	<dl>
		<dt><?php echo __('Customer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($customer['Customer'][''], array('controller' => 'customers', 'action' => 'view', $customer['Customer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Address'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['email_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Family Name'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['family_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suburb'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['suburb']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postcode'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['postcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order Count'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['order_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmed'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['confirmed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmcode'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['confirmcode']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Customer'), array('action' => 'edit', $customer['Customer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Customer'), array('action' => 'delete', $customer['Customer']['id']), null, __('Are you sure you want to delete # %s?', $customer['Customer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Customers');?></h3>
	<?php if (!empty($customer['Customer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Email Address'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Family Name'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Suburb'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Postcode'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Order Count'); ?></th>
		<th><?php echo __('Confirmed'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Confirmcode'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($customer['Customer'] as $customer): ?>
		<tr>
			<td><?php echo $customer['customer_id'];?></td>
			<td><?php echo $customer['email_address'];?></td>
			<td><?php echo $customer['password'];?></td>
			<td><?php echo $customer['first_name'];?></td>
			<td><?php echo $customer['family_name'];?></td>
			<td><?php echo $customer['phone'];?></td>
			<td><?php echo $customer['address'];?></td>
			<td><?php echo $customer['suburb'];?></td>
			<td><?php echo $customer['state'];?></td>
			<td><?php echo $customer['postcode'];?></td>
			<td><?php echo $customer['country'];?></td>
			<td><?php echo $customer['order_count'];?></td>
			<td><?php echo $customer['confirmed'];?></td>
			<td><?php echo $customer['website'];?></td>
			<td><?php echo $customer['confirmcode'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'customers', 'action' => 'view', $customer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'customers', 'action' => 'edit', $customer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'customers', 'action' => 'delete', $customer['id']), null, __('Are you sure you want to delete # %s?', $customer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Orders');?></h3>
	<?php if (!empty($customer['Order'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Deliver To'); ?></th>
		<th><?php echo __('Deliver To Address'); ?></th>
		<th><?php echo __('Deliver To Suburb'); ?></th>
		<th><?php echo __('Deliver To State'); ?></th>
		<th><?php echo __('Deliver To Postcode'); ?></th>
		<th><?php echo __('Deliver To Country'); ?></th>
		<th><?php echo __('Deliver To Phone'); ?></th>
		<th><?php echo __('To Delivery Date'); ?></th>
		<th><?php echo __('To Order Field 1'); ?></th>
		<th><?php echo __('To Order Field 2'); ?></th>
		<th><?php echo __('To Order Field 3'); ?></th>
		<th><?php echo __('Sender Name'); ?></th>
		<th><?php echo __('Sender Email'); ?></th>
		<th><?php echo __('Sender Phone'); ?></th>
		<th><?php echo __('Sender Address'); ?></th>
		<th><?php echo __('Sender Suburb'); ?></th>
		<th><?php echo __('Sender State'); ?></th>
		<th><?php echo __('Sender Postcode'); ?></th>
		<th><?php echo __('Sender Country'); ?></th>
		<th><?php echo __('Payment Method'); ?></th>
		<th><?php echo __('Cc'); ?></th>
		<th><?php echo __('Cc Name'); ?></th>
		<th><?php echo __('Cc Expiry'); ?></th>
		<th><?php echo __('Ccv'); ?></th>
		<th><?php echo __('Pp Status'); ?></th>
		<th><?php echo __('Pp Txn Id'); ?></th>
		<th><?php echo __('Ip Country'); ?></th>
		<th><?php echo __('Order Total'); ?></th>
		<th><?php echo __('Order Date'); ?></th>
		<th><?php echo __('Weight'); ?></th>
		<th><?php echo __('Shipping Date'); ?></th>
		<th><?php echo __('Tracking'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($customer['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['order_id'];?></td>
			<td><?php echo $order['website'];?></td>
			<td><?php echo $order['deliver_to'];?></td>
			<td><?php echo $order['deliver_to_address'];?></td>
			<td><?php echo $order['deliver_to_suburb'];?></td>
			<td><?php echo $order['deliver_to_state'];?></td>
			<td><?php echo $order['deliver_to_postcode'];?></td>
			<td><?php echo $order['deliver_to_country'];?></td>
			<td><?php echo $order['deliver_to_phone'];?></td>
			<td><?php echo $order['to_delivery_date'];?></td>
			<td><?php echo $order['to_order_field_1'];?></td>
			<td><?php echo $order['to_order_field_2'];?></td>
			<td><?php echo $order['to_order_field_3'];?></td>
			<td><?php echo $order['sender_name'];?></td>
			<td><?php echo $order['sender_email'];?></td>
			<td><?php echo $order['sender_phone'];?></td>
			<td><?php echo $order['sender_address'];?></td>
			<td><?php echo $order['sender_suburb'];?></td>
			<td><?php echo $order['sender_state'];?></td>
			<td><?php echo $order['sender_postcode'];?></td>
			<td><?php echo $order['sender_country'];?></td>
			<td><?php echo $order['payment_method'];?></td>
			<td><?php echo $order['cc'];?></td>
			<td><?php echo $order['cc_name'];?></td>
			<td><?php echo $order['cc_expiry'];?></td>
			<td><?php echo $order['ccv'];?></td>
			<td><?php echo $order['pp_status'];?></td>
			<td><?php echo $order['pp_txn_id'];?></td>
			<td><?php echo $order['ip_country'];?></td>
			<td><?php echo $order['order_total'];?></td>
			<td><?php echo $order['order_date'];?></td>
			<td><?php echo $order['weight'];?></td>
			<td><?php echo $order['shipping_date'];?></td>
			<td><?php echo $order['tracking'];?></td>
			<td><?php echo $order['customer_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), null, __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
