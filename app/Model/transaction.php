<?php
class Transaction extends AppModel {
	var $hasMany = array(
		'ExchangeTransaction',
	);
    var $name = 'Transaction';
}
?>