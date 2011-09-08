<?php
class ExchangeTransaction extends AppModel {
	var $belongsTo = array(
		'Exchange',
		'Transaction',
	);
    var $name = 'ExchangeTransaction';
}
?>