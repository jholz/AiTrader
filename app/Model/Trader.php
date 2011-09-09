<?php
class Trader extends AppModel {
	var $name = 'Trader';
	var $virtualFields = array(
		'modified_timestamp' => 'UNIX_TIMESTAMP(Trader.modified)',
	);
}
?>