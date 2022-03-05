<?php

class Session_integration_test extends CI_TestCase {

	private $http_client;

	public function set_up()
	{
		$this->http_client = new HttpClient();
	}

	public function testTest()
	{
		$response = $this->http_client->get('localhost:8080/test_app.php/session/test');

		var_dump((string)$response->getBody());

		$this->assertTrue(true);
	}
}
