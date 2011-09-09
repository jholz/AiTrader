<h1>Traders</h1>
<h2>Add Trader Account</h2>
<?php
	echo $this->Form->create('Trader');
	echo $this->Form->input('Trader.active', array(
		'type' => 'hidden',
		'value' => 1,
	));
	echo $this->Form->input('Trader.exchange', array(
		'label' => 'Bitcoin Exchange',
		'options' => array(
			'exchb' => 'ExchB.com',
		)
	));
	echo $this->Form->input('Trader.username');
	echo $this->Form->input('Trader.password');
	echo $this->Form->end('Submit');
?>