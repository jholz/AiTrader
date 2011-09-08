<?php
class User extends AppModel {
	var $belongsTo = array(
		'Group',
	);
	var $hasMany = array(
		'User',
	);
    var $name = 'User';
}
?>
