<h1>Add Exchange</h1>
<?php
	echo $this->Form->create('Exchange');
	echo $this->Form->input('Exchange.active', array('type' => 'hidden', 'value' => '1'));
	echo $this->Form->input('Exchange.name');
	echo $this->Form->input('Exchange.referral');
	echo $this->Form->end('Submit');
?>