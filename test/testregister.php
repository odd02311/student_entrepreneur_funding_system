<?php
use PHPUnit\Framework\TestCase;
class Test extends TestCase
{

    protected $Username;
    protected $password;
    protected function setUp()
    {
        $this->Username = 'testuser';
        $this->Password = 'testpassword';
        $this->rePassword = 'testpassword';
    }

    public function testRegisterbyEmptyUsername()
    {
        $this->Username = '';
        $this->Password = 'testpassword';
        $this->rePassword = 'testpassword';
        $this->assertFalse(empty($this->stack));
    }
    public function testRegisterbyEmptyPassword()
    {
        $this->Username = 'testuser';
        $this->password = '';
        $this->rePassword = 'testpassword';
        $this->assertFalse(empty($this->stack));
    }
    public function testRegisterbyDifferentReatedPassword()
    {
        $this->Username = 'testuser';
        $this->Password = 'testpassword';
        $this->rePassword = 'testpassword';
        $this->assertFalse(empty($this->stack));
    }
    public function testRegisterbyEmptyRePassword()
    {
        $this->Username = 'testuser';
        $this->password = 'testpassword';
        $this->rePassword = '';
        $this->assertFalse(empty($this->stack));
    }
    public function testRegisterbyInvalidUsername()
    {
        //the length of a valid username should be 4 - 20
        $this->Username = '111';
        $this->password = 'testpassword';
        $this->rePassword = 'testpassword';
        $this->assertFalse(empty($this->stack));
    }
    public function testRegisterbyInvalidPassword()
    {
        //the length of a valid password should be 6 - 20
        $this->Username = 'testuser';
        $this->Password = '111';
        $this->rePassword = '111';
        $this->assertFalse(empty($this->stack));
    }

}
?>