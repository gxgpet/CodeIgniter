<?php

class Input_test extends CI_TestCase {

	public function set_up()
	{
		// Set server variable to GET as default, since this will leave unset in STDIN env
		$_SERVER['REQUEST_METHOD'] = 'GET';

		// Set config for Input class
		$this->ci_set_config('allow_get_array',	TRUE);
		$this->ci_set_config('global_xss_filtering', FALSE);
		$this->ci_set_config('csrf_protection', FALSE);

		$security = new Mock_Core_Security('UTF-8');
		$this->input = new CI_Input($security);
	}

	public function test_post_get_array_notation()
	{
		$_SERVER['REQUEST_METHOD'] = 'POST';
		$_POST['foo'] = array('bar' => 'baz');
		$barArray = array('bar' => 'baz');

//		$this->assertEquals('baz', $this->input->get_post('foo[bar]'));
		global $debug_;
		echo 'FROM HERE' . PHP_EOL;
		$debug_ = true;
		$this->assertEquals($barArray, $this->input->get_post('foo[]'));
		$debug_ = false;
		echo 'TO HERE' . PHP_EOL;
//		$this->assertNull($this->input->get_post('foo[baz]'));
//
//		$this->assertEquals('baz', $this->input->post_get('foo[bar]'));
//		$this->assertEquals($barArray, $this->input->post_get('foo[]'));
//		$this->assertNull($this->input->post_get('foo[baz]'));
	}

}
