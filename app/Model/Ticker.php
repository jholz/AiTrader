<?php
class Ticker extends AppModel {
	var $belongsTo = array(
		'Exchange',
	);
    var $name = 'Ticker';
	var $virtualFields = array(
		'timestamp' => 'UNIX_TIMESTAMP(Ticker.created)',
	);
}
?>
