#!d:/xuexi1/python2.7/python.exe
# -*- coding: UTF-8 -*-
import cgi, cgitb 
import MySQLdb
import re

# 创建 FieldStorage 的实例化
form = cgi.FieldStorage() 
username = form.getvalue('name')
pwd = form.getvalue('pwd')
pwd1 = form.getvalue('pwd1')
tel = form.getvalue('phone')
email = form.getvalue('email')
idcard = form.getvalue('idcard')

print "Content-type:text/html"
print
print "<html>"
print "<head>"
print "<meta charset=\"utf-8\">"
print "<title>正则测试实例</title>"
print "</head>"
print "<body>"
print "<h2>%s</h2>" % (email)
print "</body>"
print "</html>"


p1 = re.compile("^[A-Z]{1}")
namematch = p1.match(username)
if namematch:
	print 'OK'
else:
	print "用户名必须大写字母开头"

if len(pwd)>5 and len(pwd1)>5:
	if pwd==pwd1:
		print "OK"
	else:
		print "密码和确认密码必须一致"
else:
	print "密码必须至少6位"

p2=re.compile("[^\._-][\w\.-]+@(?:[A-Za-z0-9]+\.)+[A-Za-z]+$")#^\w+@\w+\.(com|cn|net)$
emailmatch = p2.match(email)
if emailmatch:
	print 'OK'
else:
	print "邮箱格式不正确"

p3=re.compile("^([1-9]\d{5}[12]\d{3}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])\d{3}[0-9xX])$")#^(\d{15}|\d{17}(\d|x))$
idmatch = p3.match(idcard)
if idmatch:
	print 'OK'
else:
	print "身份证不正确"

if len(tel)==11:
	 p4 = re.compile("^0\d{2,3}\d{7,8}$|^1[358]\d{9}$|^147\d{8}")#1(5|8|3)\d{9}
	 res = p4.match(tel)
	 if res:
	 	print "OK"
	 else:
	 	print "手机格式不正确"
else:
	print "手机号码必须是11位"
from curd import *
mysql=curd()
print(mysql.getrows('INSERT INTO USERS(username, pwd) \
         VALUES (%s, %s)'% (username,pwd)))