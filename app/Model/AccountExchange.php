<?php
class AccountExchange extends AppModel {
	var $belongsTo = array(
		'Account',
		'Exchange',
	);
    var $name = 'AccountExchange';
}
?>