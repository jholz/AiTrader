<?php
class TickersController extends AppController {
	var $name = 'Tickers';
	
	function index() {
		debug($this->Ticker->find('all', array(
			'contain' => array(
			),
			'limit' => 1,
		)));
//		$this->set('tickers', $this->Ticker->Exchange->find('all', array(
//			'conditions' => array(
//				'Exchange.active' => 1,
//			),
//			'contain' => array(
//			),
//		)));
		$this->_updateAll();
	}
	
	function _updateAll() {
		$this->__exchb_parse();
	}
	
	//ExchB
	function __exchb_parse() {
		$pause = 30;	//To prevent accidental spaming
		
		$recent = $this->Ticker->find('count', array(
			'conditions' => array(
				'Ticker.timestamp > ' => time() - $pause,
			),
		));
		
		if($recent > 0) {
			//Quietly exit if recently requested
			return false;
		} else {
			$ticker = $this->__exchb_ticker();	//Request latest ticker
			
			//Format Data
			$data = array(
				'Ticker' => array(
					'exchange_id' => '1',		//ExchB.com
					'active' => '1',
					'buy' => $ticker->buy,
					'high' => $ticker->high,
					'last' => $ticker->last,
					'low' => $ticker->low,
					'sell' => $ticker->sell,
					'volume' => $ticker->vol,
				),
			);
			
			//Save Ticker
			if(!$this->Ticker->save($data)) {
				return false;
			} else {
				//Success
				return true;
			}
		}
	}
	
	function __exchb_ticker() {
		$json = file_get_contents('https://www.exchangebitcoins.com/data/ticker');
		return json_decode($json)->ticker;
	}
}
?>