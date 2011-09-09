<?php
class Ticker extends AppModel {
    var $name = 'Ticker';
	var $virtualFields = array(
		'timestamp' => 'UNIX_TIMESTAMP(Ticker.created)',
	);
}
?>
