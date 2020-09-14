
casper.test.begin('LoginTest', 1, function (test) {

    var title = 'Login';
    var login_url = 'http://localhost/student_entrepreneur_funding_system/login.html';

    var assertMsg = '';
    var emptyValue = '';
    var valid_username = '';
    var valid_password = '';
    var invalid_username = '';
    var invalid_password = '';


    casper.start();


    casper.thenOpen(login_url, function () {
        test.assertTitle(title, 'assert Title');

        test.assertExists('#login-form', 'login form is found');
        test.assertExists('#signin', 'submit button is found');

        casper.waitForSelector("form[id='login-form']", function() {
            this.fillSelectors("form[id='login-form']", {
                'input[id=username]': emptyValue,
                'input[id=password]': emptyValue
            });
        });
    });

    casper.then(function waitForLoginPageLoaded(){
         this.click("#signin");
         this.waitForUrl(login_url, function(){
            test.assertUrlMatch(login_url, 'post data to login php');
            test.assertTextExists('Please enter your username', 'login by empty username');
         });
    });




    casper.run(function () {
        casper.test.done();
    });

});