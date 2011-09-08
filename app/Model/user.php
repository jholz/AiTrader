<?php
class User extends AppModel {
	var $belongsTo = array(
		'Group',
	);
    var $name = 'User';
}
?>
