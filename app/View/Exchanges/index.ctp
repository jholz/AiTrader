<h1>Exchanges</h1>
<table>
<?php
	$headers = array(
		'Name',
		'Referral Code',
	);
	echo $this->Html->tableHeaders($headers);
	
	$cells = array();
	$num_exchanges = count($exchanges);
	for($i = 0; $i < $num_exchanges; $i++) {
		$exchange = $exchanges[$i];
		$cells[$i] = array(
			$this->Html->link($exchange['Exchange']['name'], 'https://www.exchangebitcoins.com/en/r/TheCoin'),
			$exchange['Exchange']['referral'],
		);
	}
	echo $this->Html->tableCells($cells);
?>
</table>