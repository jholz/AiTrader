<h1>Tickers</h1>
<table>
<?php
	$headers = array(
		'Exchange',
		'Low',
		'High',
		'Volume',
	);
	echo $this->Html->tableHeaders($headers);
	debug($tickers);
	$cells = array();
	$num_tickers = count($tickers);
	for($i = 0; $i < $num_tickers; $i++) {
		$ticker = $tickers[$i];
		$cells[$i] = array(
			$ticker['Exchange']['name'],
		);
	}
	echo $this->Html->tableCells($cells);
?>
</table>