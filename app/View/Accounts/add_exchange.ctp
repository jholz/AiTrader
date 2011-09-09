<h1>Add Exchange Account</h1>
<?php
	echo $this->Form->create('Account');
	echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => '1'));	//Add User ID after Auth
	echo $this->Form->input('active', array('type' => 'hidden', 'value' => '1'));
	echo $this->Form->input('AccountExchange.0.exchange_id', $exchanges);
	echo $this->Form->input('AccountExchange.0.active', array('type' => 'hidden', 'value' => '1'));
	echo $this->Form->input('AccountExchange.0.username');
	echo $this->Form->input('AccountExchange.0.password');
	echo $this->Form->end('Submit');
?>