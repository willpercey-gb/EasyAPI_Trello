<?php
class EasyTrello{
	private $token;
	private $apiKey;
	public $response;
	public function getToken($apiKey){
		header("Location: https://trello.com/1/authorize?key={$apiKey}&scope=read%2Cwrite&name=My+Application&expiration=never&response_type=token");
	}
	public function setToken($apiKey, $token){
		$this->token = $token;
		$this->apiKey = $apiKey;
	}
	public function createCard($cardName, $cardDescription, $listID, $labelID, $cardPosition){
		$url = 'https://api.trello.com/1/cards?';
		$fields = array(
			'key' => $this->apiKey,
			'token' => $this->token,
			'name' => $cardName,
			'desc' => $cardDescription,
			'pos' => $cardPosition,
			'idList' => $listID,
			'idLabels' => $labelID,
			'keepFromSource' => 'all',
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$response = curl_exec($ch);
		curl_close($ch);
		if (empty($response)) {
			$response = array("result" => array());
		}
		$this->response = $response;
	}

	public function ConvertObject($data) {
		if (is_object($data)) {
			$data = get_object_vars($data);
		}
		if (is_array($data)) {
			$data = array_map(array(__CLASS__,__FUNCTION__), $data);
			return $data;
		}
		else {
			return $data;
		}
	}
	public function easyReadJSON($link){
		echo '<pre>';
		print_r($this->ConvertObject(json_decode(file_get_contents($link))));
		echo '</pre>';
	}
}