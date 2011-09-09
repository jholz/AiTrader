<h1>Wallets</h1>
<h2>Add Account</h2>
<?php
	echo $this->Form->create('Wallet');
	echo $this->Form->input('Wallet.name');
	echo $this->Form->input('Wallet.provider', array(
		'label' => 'eWallet Provider',
		'options' => array(
			'instawallet' => 'Instawallet.org',
		)
	));
	echo $this->Form->end('Submit');
?>