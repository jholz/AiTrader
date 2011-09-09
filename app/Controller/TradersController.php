<?php
class TradersController extends AppController {
	var $name = 'Traders';
	
	function add() {
		if(empty($this->data)) {
		} else {
			if(!$this->Trader->save($this->data)) {
			} else {
			}
		}
	}
	
	function beforeFilter() {
		$pause = 60;
		$outdated = $this->Trader->find('all', array(
			'conditions' => array(
				'Trader.modified_timestamp < ' => time() - $pause,
			),
		));
		if(!empty($outdated)) {
			$this->_updateBalances($outdated);
		}
	}
	
	function index() {
		$this->set('traders', $this->Trader->find('all', array(
		)));
	}
	
	function _updateBalances($traders = null) {
		if(empty($traders)) {
			return false;
		} else {
			$num_traders = count($traders);
			for($i = 0; $i < $num_traders; $i++) {
				$trader = $traders[$i];
				App::import('Lib', 'exchb');
				$exchb = new ExchB();
				$balance = $exchb->getFunds($trader['Trader']['username'], $trader['Trader']['password']);
				if(!$balance) {
					return false;
				} else {
					$result = $this->Trader->updateAll(
						array(
							'Trader.bitcoin' => "'" . $balance->btcs . "'",
							'Trader.dollars' => "'" . $balance->usds . "'",
							'Trader.modified' => "'" . date('Y-m-d h:i:s') . "'",
						),
						array('Trader.id' => $trader['Trader']['id'])
					);
					if(!$result) {
						return false;
					} else {
						return true;
					}
				}
			}
		}
	}
}
?>