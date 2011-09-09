<?php
class ExchB {
	function buyBTC($username, $password, $amount, $price) {
		if(empty($username) || empty($password) || empty($amount) || empty($price)) {
			return false;
		} else {
			$content = 'name=' . $username . '&pass=' . $password . '&amount=' . $amount . '&price=' . $price;
			$url = 'https://www.exchangebitcoins.com/data/buyBTC';
			$opts = array('http' =>
				array(
					'method'  => 'POST',
					'header'  => 'Content-type: application/x-www-form-urlencoded',
					'content' => $content,
					'ignore_errors' => true,
				)
			);
			$context = stream_context_create($opts);
			$json = file_get_contents($url, false, $context);
			$data = json_decode($json);
			if($data->status == 'Login failed.') {
				return false;
			} else {
				debug($data);
			}
		}
	}

	function cancelOrder($username, $password, $order) {
		$content = 'name=' . $username . '&pass=' . $password;
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $content,
				'ignore_errors' => true,
			)
		);
		$context = stream_context_create($opts);
		$json = file_get_contents('https://www.exchangebitcoins.com/data/getDepositAddress', false, $context);
		return json_decode($json);
	}
	
	function depth() {
		$json = file_get_contents('https://www.exchangebitcoins.com/data/depth');
		return json_decode($json);
	}
	
	function getDepositAddress($username, $password) {
		$content = 'name=' . $username . '&pass=' . $password;
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $content,
				'ignore_errors' => true,
			)
		);
		$context = stream_context_create($opts);
		$json = file_get_contents('https://www.exchangebitcoins.com/data/getDepositAddress', false, $context);
		return json_decode($json);
	}
	
	function getFunds($username, $password) {
		$content = 'name=' . $username . '&pass=' . $password;
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $content,
				'ignore_errors' => true,
			)
		);
		$context = stream_context_create($opts);
		$json = file_get_contents('https://www.exchangebitcoins.com/data/getFunds', false, $context);
		$data = json_decode($json);
		if(isset($data->status)) {
			if($data->status == 'Login failed.') {
				return false;
			}
		} else {
			return $data;
		}
	}
	
	function getOrders($username, $password) {
		$content = 'name=' . $username . '&pass=' . $password;
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $content,
				'ignore_errors' => true,
			)
		);
		$context = stream_context_create($opts);
		$json = file_get_contents('https://www.exchangebitcoins.com/data/getDepositAddress', false, $context);
		return json_decode($json);
	}
	
	function sellBTC($username, $password, $amount, $price) {
		$content = 'name=' . $username . '&pass=' . $password;
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $content,
				'ignore_errors' => true,
			)
		);
		$context = stream_context_create($opts);
		$json = file_get_contents('https://www.exchangebitcoins.com/data/getDepositAddress', false, $context);
		return json_decode($json);
	}

	function withdrawBTC($username, $password, $address, $amount) {
		$content = 'name=' . $username . '&pass=' . $password . '&currency=BTC&btca=' . $address . '&amount=' . $amount;
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $content,
				'ignore_errors' => true,
			)
		);
		$context = stream_context_create($opts);
		$json = file_get_contents('https://www.exchangebitcoins.com/data/withdraw', false, $context);
		return json_decode($json);
	}
	
	function __exchb_withdrawUSD($username, $password, $method, $amount) {
		$content = 'name=' . $username . '&pass=' . $password . '&currency=USD&method=' . $method . '&amount=' . $amount;
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $content,
				'ignore_errors' => true,
			)
		);
		$context = stream_context_create($opts);
		$json = file_get_contents('https://www.exchangebitcoins.com/data/withdraw', false, $context);
		return json_decode($json);
	}
}
?>