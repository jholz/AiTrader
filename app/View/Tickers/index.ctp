<h1>Tickers</h1>
<table>
<?php
	$headers = array(
		'Exchange',
		'Last',
		'Low',
		'High',
		'Volume',
	);
	echo $this->Html->tableHeaders($headers);
	$cells = array();
	$num_tickers = count($tickers);
	for($i = 0; $i < $num_tickers; $i++) {
		$ticker = $tickers[$i];
		$cells[$i] = array(
			$ticker['Exchange']['name'],
			$ticker['Ticker'][0]['last'],
			$ticker['Ticker'][0]['low'],
			$ticker['Ticker'][0]['high'],
			$ticker['Ticker'][0]['volume'],
		);
	}
	echo $this->Html->tableCells($cells);
?>
</table>