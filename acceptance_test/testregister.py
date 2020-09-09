import re
import sys
from splinter.browser import Browser
sys.setdefaultencoding('utf8')


def test_register(desc, name, passcode, repasscode, result):
    browser.fill('username', name.decode('utf8'))
    browser.fill('password', passcode.decode('utf8'))
    browser.fill('repassword', repasscode.decode('utf8'))
    browser.find_by_value('Register').first.click()
    checkresult(desc, result)

    if browser.is_text_present(result):
        print('pass')
    else:
        print('[X] not pass')


unregistered_username = '1111111'
username = 'test_username'
password = 'test_password'
repassword = 'test_password'


__testUrl = 'http://localhost/student_entrepreneur_funding_system/register.php'
browser = Browser()
browser.visit(__testUrl)
print("test page:" + browser.title)

# test login
test_register('test registration by empty username and password', '', '', '', 'All fields need be filled')
test_register('test registration by empty username', '', password, 'Username is empty')
test_register('test registration by empty password', username, password, repassword, 'Password is empty')
test_register('test registration by empty repassword', username, repassword, '', 'All fields need be filled')
test_register('test registration by unregistered username', unregistered_username, password, repassword, 'Username or Password is wrong')
test_register('test registration by valid username and password', username, password, repassword, 'Register successful!')