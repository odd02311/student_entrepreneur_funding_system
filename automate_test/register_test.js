
casper.test.begin('RegisterTest', 0, function (test) {

    var title = 'Register';
    var home_title = 'Home';
    var index_url = 'http://localhost/student_entrepreneur_funding_system/index.php';
    var register_url = 'http://localhost/student_entrepreneur_funding_system/register.html';

    var empty_value = '';
    var valid_username = 'test_username';
    var valid_password = 'test_password';
    var invalid_password = '1111';
    var registered_username = '1111';


    function getValidUsername() {
    　　var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';
    　　var maxLen = $chars.length;
    　　var username = '';
    　　for (i = 0; i < 12; i++) {
    　　　　username += $chars.charAt(Math.floor(Math.random() * maxLen));
    　　}
    　　return username;
    }

    casper.start();
    casper.thenOpen(register_url, function () {
        casper.waitForSelector("form[id='register-form']", function() {
            test.assertTitle(title, 'assert Title');
            test.assertExists('#register-form', 'register form is found');
            test.assertExists('#register', 'submit button is found');
            test.assertUrlMatch(register_url, 'url match with register php');
        });
    });

    casper.then(function testRegisterByEmpty(){
        this.fillSelectors("form[id='register-form']", {
            'input[id=username]': empty_value,
            'input[id=password]': empty_value,
            'input[id=repassword]': empty_value
        });

        this.click("#register");
        this.waitForUrl(register_url, function(){
            test.assertTextExists('Please enter your username', 'register by empty empty');
        });
    });

    casper.then(function testRegisterByEmptyUsername(){
        this.fillSelectors("form[id='register-form']", {
            'input[id=username]': empty_value,
            'input[id=password]': valid_password,
            'input[id=repassword]': valid_password
        });

        this.click("#register");
        this.waitForUrl(register_url, function(){
            test.assertTextExists('Please enter your username', 'register by empty username');
        });
    });

    casper.then(function testRegisterByEmptyPassword(){
//        casper.capture('0.png');
        this.fillSelectors("form[id='register-form']", {
            'input[id=username]': valid_username,
            'input[id=password]': empty_value,
            'input[id=repassword]': empty_value
        });

        this.click("#register");
        this.waitForUrl(register_url, function(){
            test.assertTextExists('Please enter your password', 'register by empty password');
        });
    });

    casper.then(function testRegisterByEmptyPassword(){
//        casper.capture('0.png');
        this.fillSelectors("form[id='register-form']", {
            'input[id=username]': valid_username,
            'input[id=password]': valid_password,
            'input[id=repassword]': empty_value
        });

        this.click("#register");
        this.waitForUrl(register_url, function(){
            test.assertTextExists('Please confirm your password', 'register by empty confimed password');
        });
    });

    casper.then(function testRegisterByRegisteredUsername(){
        this.fillSelectors("form[id='register-form']", {
            'input[id=username]': registered_username,
            'input[id=password]': valid_password,
            'input[id=repassword]': invalid_password
        });

        this.click("#register");
        this.waitForUrl(register_url, function(){
            test.assertTextExists('Passwords do not match', 'register by different password and confimed password');
        });
    });

    casper.then(function testRegisterByRegisteredUsername(){
        this.fillSelectors("form[id='register-form']", {
            'input[id=username]': registered_username,
            'input[id=password]': valid_password,
            'input[id=repassword]': valid_password
        });

        this.click("#register");
        this.waitForUrl(register_url, function(){
            test.assertTextExists('Username is already in use', 'register by registered username');
        });
    });

    casper.then(function testRegisterByValidUsernameAndPassword(){
        this.fillSelectors("form[id='register-form']", {
            'input[id=username]': getValidUsername(),
            'input[id=password]': valid_password,
            'input[id=repassword]': valid_password
        });

        this.click("#register");
        this.waitForUrl(index_url, function(){
            test.assertTitle(home_title, 'Register successfully and enter to Home page');
        });
//        casper.capture("4.png");
    });

    casper.run(function () {
        casper.test.done();
    });

});