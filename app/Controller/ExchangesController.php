<?php
class ExchangesController extends AppController {
	function index() {
		$this->_getTxns();
	}
	
	function _getTxns() {
		$this->__exchb_getTxns();
	}
	
	function __exchb_getTxns() {
		$txns = $this->__exchb_recent();
		foreach($txns as $txn) {
			$exists = $this->Exchange->find('count', array(
//				'conditions' => array(
//					'Transaction.serial' => $txn->tid,
//				),
			));
//			if($exists == 0) {
//			}
		}
	}
	
	//Raw ExchB Methods
	function __exchb_buyBTC($username, $password, $amount, $price) {
		$content = 'name=' . $username . '&pass=' . $password . '&amount=' . $amount . '&price=' . $price;
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $content,
				'ignore_errors' => true,
			)
		);
		$context = stream_context_create($opts);
		$json = file_get_contents('https://www.exchangebitcoins.com/data/buyBTC', false, $context);
		return json_decode($json);
	}
	
	function __exchb_cancelOrder($username, $password, $order) {
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
	
	function __exchb_depth() {
		$json = file_get_contents('https://www.exchangebitcoins.com/data/depth');
		return json_decode($json);
	}
	
	function __exchb_getDepositAddress($username, $password) {
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
	
	function __exchb_getFunds($username, $password) {
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
		return json_decode($json);
	}
	
	function __exchb_getOrders($username, $password) {
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
	
	function __exchb_recent() {
		$json = file_get_contents('https://www.exchangebitcoins.com/data/recent');
		return json_decode($json);
	}
	
	function __exchb_sellBTC($username, $password, $amount, $price) {
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
	
	function __exchb_ticker() {
		$json = file_get_contents('https://www.exchangebitcoins.com/data/ticker');
		return json_decode($json);
	}

	function __exchb_withdrawBTC($username, $password, $address, $amount) {
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