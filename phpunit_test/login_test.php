<?php
require_once dirname(__FILE__).'/../classes/class_login.php';
use PHPunit\Framework\TestCase;

class LoginTest extends TestCase
{

    protected $valid_username;
    protected $valid_password;
    protected $empty_username;
    protected $empty_password;
    protected $invalid_username;
    protected $invalid_password;
    protected $expected;

    protected function setUp()
    {
        $this->empty_username = '';
        $this->empty_password = '';
        $this->invalid_username = '111';
        $this->invalid_password = '111';
        $this->valid_username = 'test_username';
        $this->valid_password = 'test_password';
    }

    public function testLoginbyEmpty()
    {
        $this->expected = 'Please enter your username';

        $login = new Login;
        $actual = $login->login($this->empty_username, $this->empty_password);
        $this->assertEquals($this->expected, $actual);
    }

    public function testLoginbyEmptyUsername()
    {
        $this->expected = 'Please enter your username';

        $login = new Login;
        $actual = $login->login($this->empty_username, $this->valid_password);
        $this->assertEquals($this->expected, $actual);
    }
    public function testLoginbyEmptyPassword()
    {
        $this->expected = 'Please enter your password';

        $login = new Login;
        $actual = $login->login($this->valid_username, $this->empty_password);
        $this->assertEquals($this->expected, $actual);
    }
    public function testLoginbyInvalidUsername()
    {
        $this->expected = 'Username or password wrong';

        $login = new Login;
        $actual = $login->login($this->invalid_username, $this->valid_password);

        $this->assertEquals($this->expected, $actual);
    }
    public function testLoginbyInvalidPassword()
    {
        $this->expected = 'Username or password wrong';

        $login = new Login;
        $actual = $login->login($this->valid_username, $this->invalid_password);
        $this->assertEquals($this->expected, $actual);
    }
    public function testLoginSuccess()
    {
        $this->expected = 'Login successfully';

        $login = new Login;
        $actual = $login->login($this->valid_username, $this->valid_password);
        $this->assertEquals($this->expected, $actual);
    }
}
?>