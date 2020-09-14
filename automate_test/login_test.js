
casper.test.begin('LoginTest', 0, function (test) {

    var title = 'Login';
    var home_title = 'Home';
    var index_url = 'http://localhost/student_entrepreneur_funding_system/index.php';
    var login_url = 'http://localhost/student_entrepreneur_funding_system/login.html';

    var empty_value = '';
    var valid_username = 'test_username';
    var valid_password = 'test_password';
    var invalid_username = '1111';
    var invalid_password = '1111';


    casper.start();
    casper.thenOpen(login_url, function () {
        casper.waitForSelector("form[id='login-form']", function() {
            test.assertTitle(title, 'assert Title');
            test.assertExists('#login-form', 'login form is found');
            test.assertExists('#signin', 'submit button is found');
            test.assertUrlMatch(login_url, 'url match with login php');
        });
    });

    casper.then(function testLoginByEmpty(){
        this.fillSelectors("form[id='login-form']", {
            'input[id=username]': empty_value,
            'input[id=password]': empty_value
        });

        this.click("#signin");
        this.waitForUrl(login_url, function(){
            test.assertTextExists('Please enter your username', 'login by empty empty');
        });
    });

    casper.then(function testLoginByEmptyUsername(){
        this.fillSelectors("form[id='login-form']", {
            'input[id=username]': empty_value,
            'input[id=password]': valid_password
        });

        this.click("#signin");
        this.waitForUrl(login_url, function(){
            test.assertTextExists('Please enter your username', 'login by empty username');
        });
    });

    casper.then(function testLoginByEmptyPassword(){
//        casper.capture('0.png');
        this.fillSelectors("form[id='login-form']", {
            'input[id=username]': valid_username,
            'input[id=password]': empty_value
        });

        this.click("#signin");
        this.waitForUrl(login_url, function(){
            test.assertTextExists('Please enter your password', 'login by empty password');
        });
    });

    casper.then(function testLoginByInvalidUsername(){
        this.fillSelectors("form[id='login-form']", {
            'input[id=username]': invalid_username,
            'input[id=password]': valid_password
        });

        this.click("#signin");
        this.waitForUrl(login_url, function(){
            test.assertTextExists('Username or password wrong', 'login by invalid username');
        });
    });

    casper.then(function testLoginByInvalidPassword(){
        this.fillSelectors("form[id='login-form']", {
            'input[id=username]': valid_username,
            'input[id=password]': invalid_password
        });

        this.click("#signin");
        this.waitForUrl(login_url, function(){
            test.assertTextExists('Username or password wrong', 'login by invalid password');
        });
    });


    casper.then(function testLoginByValidUsernameAndPassword(){
        this.fillSelectors("form[id='login-form']", {
            'input[id=username]': valid_username,
            'input[id=password]': valid_password
        });

        this.click("#signin");
        this.waitForUrl(index_url, function(){
            test.assertTitle(home_title, 'login successfully and enter Home page');
        });
    });

    casper.run(function () {
        casper.test.done();
    });

});