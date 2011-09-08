<?php
class ExchangesController extends AppController {
	var $name = 'Exchanges';
	
	function add() {
		if(empty($this->data)) {
		} else {
			if($this->Exchange->save($this->data)) {
				$this->redirect(array('action' => 'index'));
			} else {
			}
		}
	}

	function index() {
		$this->_getTransactions();
		$this->set('exchanges', $this->Exchange->find('all', array(
			'conditions' => array(
				'Exchange.active' => true,
			),
		)));
	}
	
	function _getTransactions() {
		$this->__exchb_getTransactions();
	}
	
	function __exchb_getTransactions() {
		$transactions = $this->__exchb_recent();
		$num_transactions = count($transactions);
		for($i = 0; $i < $num_transactions; $i++) {
			$transaction = $transactions[$i];
			$duplicates = $this->Exchange->ExchangeTransaction->find('count', array(
				'conditions' => array(
					'ExchangeTransaction.serial' => $transaction->tid,
				),
			));
			if($duplicates == 0) {
				$data = array(
					'Transaction' => array(
						'Transaction.active' => true,
					),
				);
				if(!$this->Exchange->ExchangeTransaction->Transaction->save($data)) {
				} else {
					
				}
			} else {
			}
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