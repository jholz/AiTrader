<?php
class Account extends AppModel {
	var $hasMany = array(
		'AccountExchange',
	);
	var $hasOne = array(
		'User',
	);
    var $name = 'Account';
}
?>
