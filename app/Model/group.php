<?php
class Group extends AppModel {
	var $hasMany = array(
		'User',
	);
    var $name = 'Group';
}
?>