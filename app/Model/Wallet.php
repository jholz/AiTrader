<?php
class Wallet extends AppModel {
	var $name = 'Wallet';
	var $virtualFields = array(
	);
	
	function getAddress($provider, $serial) {
		switch($provider) {
			case 'instawallet':
				$url = 'https://www.instawallet.org/api/v1/w/' . $wallet_id . '/address';
				$json = file_get_contents($url);
				$data = json_decode($json);
				debug($data);
			break;
		}
	}
}
?>