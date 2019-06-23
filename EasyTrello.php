<?php
class EasyTrello{
	private $token;
	private $apiKey;
	public function getToken($apiKey){
		header("Location: https://trello.com/1/authorize?key={$apiKey}&scope=read%2Cwrite&name=My+Application&expiration=never&response_type=token");
	}
	public function setToken($token, $apiKey){
		$this->token = $token;
		$this->apiKey = $apiKey;
	}
	public function getListID($link, $listName){

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

		//header('Content-Type: text/html');
		if (empty($response)) {
			$response = array("result" => array());
		}
		return json_decode($response);
	}
}