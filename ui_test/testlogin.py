import re
import sys
from splinter.browser import Browser
sys.setdefaultencoding('utf8')


def test_login(desc, name, passcode, result):
    browser.fill('username', name.decode('utf8'))
    browser.fill('password', passcode.decode('utf8'))
    browser.find_by_value('login').first.click()
    checkresult(desc, result)

    if browser.is_text_present(result):
        print('pass')
    else:
        print('[X] not pass')


invalid_username = '111'
invalid_password = '111'
username = 'test_username'
password = 'test_password'
unregistered_username = 'test_password'

__testUrl = 'http://localhost/student_entrepreneur_funding_system/login.php'
browser = Browser()  # already support firefox
browser.visit(__testUrl)
print("test page:" + browser.title)

# test login
test_login('test by empty username and password', '', '', '')
test_login('test by empty username', '', password, 'Username is empty')
test_login('test by empty password', username, '', 'Password is empty')
test_login('test by empty password', unregistered_username, password, 'Username is not registered')
test_login('test by valid username and password', username, password, 'Login successful!')