<h1>Accounts</h1>
<table>
<?php
	debug($accounts);
	$headers = array(
		'Type',
	);
	echo $this->Html->tableHeaders($headers);
	$cells = array();
	$num_accounts = count($accounts);
	for($i = 0; $i < $num_accounts; $i++) {
		$account = $accounts[$i];
		if(!empty($account['AccountExchange'])) {
			$type = 'Exchange';
		}
		$cells[$i] = array(
			$type,
		);
	}
	echo $this->Html->tableCells($cells);
?>
</table>