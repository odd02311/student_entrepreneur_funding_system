<?php
require_once dirname(__FILE__).'/../classes/class_register.php';
use PHPunit\Framework\TestCase;

class RegiterTest extends TestCase
{
    protected $valid_username;
    protected $valid_password;
    protected $empty_username;
    protected $empty_password;
    protected $expected;
    protected $registered_username;

    // generating a random validate username for testing
    function random_username($char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
        $string = '';
        for($i = 12; $i > 0; $i--) {
            $string .= $char[mt_rand(0, strlen($char) - 1)];
        }
        return $string;
    }

    protected function setUp()
    {
        $this->empty_username = '';
        $this->empty_password = '';
        $this->registered_username = 'registered_username';
        $this->valid_username = $this->random_username();
        $this->valid_password = 'test_password';
        $this->valid_password2 = 'test_password2';
    }

    public function testRegisterbyEmpty()
    {
        $this->expected = 'Please enter your username';

        $reg = new Register;
        $actual = $reg->register($this->empty_username, $this->empty_password, $this->empty_password);
        $this->assertEquals($this->expected, $actual);
    }

    public function testRegisterbyEmptyUsername()
    {
        $this->expected = 'Please enter your username';

        $reg = new Register;
        $actual = $reg->register($this->empty_username, $this->valid_password, $this->valid_password);
        $this->assertEquals($this->expected, $actual);
    }

    public function testRegisterbyEmptyPassword()
    {
        $this->expected = 'Please enter your password';

        $reg = new Register;
        $actual = $reg->register($this->valid_username, $this->empty_password, $this->empty_password);
        $this->assertEquals($this->expected, $actual);
    }

    public function testRegisterbyEmptyConfirmedPassword()
    {
        $this->expected = 'Please confirm your password';

        $reg = new Register;
        $actual = $reg->register($this->valid_username, $this->valid_password, $this->empty_password);
        $this->assertEquals($this->expected, $actual);
    }

    public function testRegisterbyDifferentReatedPassword()
    {
        $this->expected = 'Passwords do not match';

        $reg = new Register;
        $actual = $reg->register($this->valid_username, $this->valid_password, $this->valid_password2);
        $this->assertEquals($this->expected, $actual);
    }

    public function testRegisterByRegisteredUsername()
    {
        $this->expected = 'Username is already in use';

        $reg = new Register;
        $actual = $reg->register($this->registered_username, $this->valid_password, $this->valid_password);
        $this->assertEquals($this->expected, $actual);
    }

    public function testRegisterSuccess()
    {
        $this->expected = 'Register successfully';

        $reg = new Register;
        $actual = $reg->register($this->valid_username, $this->valid_password, $this->valid_password);
        $this->assertEquals($this->expected, $actual);
    }
}
?>