<h1>Traders</h1>
<h2>Trader Accounts</h2>
<table>
<?php
	$headers = array(
		'Exchange',
		'User',
		'Balance',
	);
	echo $this->Html->tableHeaders($headers);
	
	$cells = array();
	$num_traders = count($traders);
	for($i = 0; $i < $num_traders; $i++) {
		$trader = $traders[$i];
		switch($trader['Trader']['exchange']) {
			case 'exchb':
				$exchange = $this->Html->image('exchanges/exchb_logo.png', array(
					'url' => 'http://www.exchangebitcoins.com/en/r/TheCoin',
				));
			break;
		}
		$cells[$i] = array(
			$exchange,
			$trader['Trader']['username'],
			$trader['Trader']['bitcoin'] . ' BTC | ' . $trader['Trader']['dollars'] . ' USD',
			'Buy',
			'Sell',
		);
	}
	echo $this->Html->tableCells($cells);
?>
</table>