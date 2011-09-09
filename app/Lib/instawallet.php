<?php
class Instawallet {
	//new_wallet() - Request a new wallet
	//Parameters:	none
	//Returns:		wallet_id
	function new_wallet() {
		$url = 'https://www.instawallet.org/api/v1/new_wallet';
		$json = file_get_contents($url);
		$data = json_decode($json);
		if(!$data->successful) {
			return false;
		} else {
			return $data->wallet_id;
		}
	}
	
	//address() - Request the address of an existing wallet
	//Parameters:	wallet_id
	//Returns:		address
	function address($wallet_id = null) {
		if(empty($wallet_id)) {
			return false;
		} else {
			$url = 'https://www.instawallet.org/api/v1/w/' . $wallet_id . '/address';
			$json = file_get_contents($url);
			$data = json_decode($json);
			if(!$data->successful) {
				return false;
			} else {
				return $data->address;
			}
		}
	}
	
	//balance() - Request the current balance of an existing wallet
	//Parameters:	wallet_id
	//Returns:		balance
	function balance($wallet_id = null) {
		if(empty($wallet_id)) {
			return false;
		} else {
			$url = 'https://www.instawallet.org/api/v1/w/' . $wallet_id . '/balance';
			$json = file_get_contents($url);
			$data = json_decode($json);
			if(!$data->successful) {
				return false;
			} else {
				return $data->balance;
			}
		}
	}
	
	//payment() - Request a payment be initiated from an existing wallet
	function payment() {
		$url = 'https://www.instawallet.org/api/v1/w/' . $wallet_id . '/payment';
		$json = file_get_contents($url);
		return json_decode($json);
	}
}
?>