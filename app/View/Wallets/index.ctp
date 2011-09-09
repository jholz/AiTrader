<h1>Wallets</h1>
<h2>Index</h2>
<table>
<?php
	$headers = array(
		'Name',
		'Provider',
		'Address',
		'Balance',
	);
	echo $this->Html->tableHeaders($headers);
	
	$cells = array();
	$num_wallets = count($wallets);
	for($i = 0; $i < $num_wallets; $i++) {
		$wallet = $wallets[$i];
		$cells[$i] = array(
			$wallet['Wallet']['name'],
			ucfirst($wallet['Wallet']['provider']),
			$wallet['Wallet']['address'],
			$wallet['Wallet']['balance'] . ' BTC',
		);
	}
	echo $this->Html->tableCells($cells);
?>
</table>