<?php
class Exchange extends AppModel {
	var $hasMany = array(
		'AccountExchange',
		'ExchangeTransaction',
		'Ticker',
	);
    var $name = 'Exchange';
	var $validate = array(
		'name' => array(
			'message' => 'Name must be at least 8 characters long.',
			'rule' => array(
				'minLength',
				8,
			),
		),
		'referral' => array(
			'message' => 'Referral code must be at least 6 characters long.',
			'rule' => array(
				'minLength',
				6,
			),
		),
	);
}
?>