<?php
class AppController extends Controller {
	var $components = array(
		'Session',
		'RequestHandler',
	);
	var $helpers = array(
		'Html',
		'Form',
		'Js',
		'Paginator',
		'Session'
	);
}
?>