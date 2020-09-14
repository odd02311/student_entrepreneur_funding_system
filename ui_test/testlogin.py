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


empty_username = ''
empty_password = ''
valid_username = 'test_username'
valid_password = 'test_password'
invalid_username = '111'
invalid_password = '111'
unregistered_username = 'unregistered_password'

__testUrl = 'http://localhost/student_entrepreneur_funding_system/login.html'
browser = Browser()  # already support firefox
browser.visit(__testUrl)
print("test page:" + browser.title)

# test login
test_login('test login by empty', '', '', 'Username is empty')
test_login('test login by empty username', '', password, 'Username is empty')
test_login('test login by empty password', username, '', 'Password is empty')
test_login('test login by unregistered username', unregistered_username, password, 'Username or password wrong')
test_login('test login by invalid username', username, invalid_password, 'Username or password wrong')
test_login('test login by invalid password', invalid_username, password, 'Username or password wrong')
test_login('test login by valid username and password', valid_username, valid_password, 'Login successfully!')