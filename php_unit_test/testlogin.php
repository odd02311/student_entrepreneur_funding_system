<?php
use PHPUnit\Framework\TestCase;
class TestLogin extends TestCase
{
    protected $Username;
    protected $password;
    protected function setUp()
    {
        $this->Username = 'testuser';
        $this->password = 'testpassword';
    }

    public function testLoginbyEmpty()
    {
        $this->Username = '';
        $this->password = '';
        $this->assertFalse(empty($this->stack));
    }
    public function testLoginbyEmptyUsername()
    {
        $this->Username = '';
        $this->password = '';
        $this->assertFalse(empty($this->stack));
    }
    public function testLoginbyEmptyPassword()
    {
        $this->Username = 'testuser';
        $this->password = '';
        $this->assertFalse(empty($this->stack));
    }
    public function testLoginbyInvalidUsername()
    {
        $this->Username = 'testuser';
        $this->password = '';
        $this->assertFalse(empty($this->stack));
    }
    public function testLoginbyInvalidUsername()
    {
        //the length of a valid username should be 4 - 20
        $this->Username = '111';
        $this->password = 'testpassword';
        $this->assertFalse(empty($this->stack));
    }
    public function testLoginbyInvalidPassword()
    {
        //the length of a valid password should be 6 - 20
        $this->Username = 'testuser';
        $this->password = '111';
        $this->assertFalse(empty($this->stack));
    }
    public function testLoginbyNameandPassword()
    {
        $this->Username = 'testuser';
        $this->password = 'testpassword';
        $this->assertTrue(empty($this->stack));
    }


}
?>