<?php
class WalletsController extends AppController {
	var $name = 'Wallets';
	
	function add() {
		if(empty($this->data)) {
		} else {
			$name = $this->data['Wallet']['name'];
			$provider = $this->data['Wallet']['provider'];
			switch($provider) {
				case 'instawallet':
					$this->_iw_createWallet($name);
				break;
			}
		}
	}
	
	function index() {
		$this->set('wallets', $this->Wallet->find('all', array(
		)));
	}
	
	function _iw_createWallet($name = null) {
		if(empty($name)) {
			return false;
		} else {
			App::import('Lib', 'instawallet');
			$iw = new Instawallet();
			$serial = $iw->new_wallet();
			
			if(!$serial) {
				return false;
			} else {
				$address = $iw->address($serial);
				$balance = $iw->balance($serial);
			
				$data = array(
					'Wallet' => array(
						'active' => '1',
						'address' => $address,
						'balance' => $balance,
						'name' => $name,
						'provider' => 'instawallet',
						'serial' => $serial,
					),
				);
			
				if(!$this->Wallet->save($data)) {
					return false;
				} else {
					return true;
				}
			}
		}
	}
}
?>