<?php
class TransactionsController extends AppController {
	var $name = 'Transactions';
	
	function index() {
		$this->_parseAll();
	}
	
	function _parseAll() {
		$this->__exchb_parse();
	}
	
	//ExchB
	function __exchb_parse() {
		$transactions = $this->__exchb_recent();
		$num_transactions = count($transactions);
		for($i = 0; $i < $num_transactions; $i++) {
			$transaction = $transactions[$i];
			$duplicates = $this->Transaction->ExchangeTransaction->find('count', array(
				'conditions' => array(
					'ExchangeTransaction.serial' => $transaction->tid,
				),
			));
			if($duplicates != 0) {
				return false;
			} else {
				$data = array(
					'Transaction' => array(
						'active' => '1',
					),
					'ExchangeTransaction' => array(
						0 => array(
							'exchange_id' => '1',
							'active' => '1',
							'amount' => $transaction->amount,
							'date' => $transaction->date,
							'price' => $transaction->price,
							'serial' => $transaction->tid,
						),
					),
				);

				if(!$this->Transaction->saveAll($data)) {
					return false;
				} else {
				}
			}
		}
	}

	function __exchb_recent() {
		$json = file_get_contents('https://www.exchangebitcoins.com/data/recent');
		return json_decode($json);
	}
}
?>