#!d:/xuexi1/python2.7/python.exe
# -*- coding: UTF-8 -*-
print "Content-type:text/html"
print
import urllib
import urllib2
import re
import MySQLdb
#from curd import *

url = 'http://www.wsc.com/python/bd.html'
user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0"
headers = { 'User-Agent' : user_agent}
request = urllib2.Request(url, headers = headers)
response = urllib2.urlopen(request)
content = response.read()
#print content
navdiv = re.compile('(<div id="channel-all".*?)<div id="body" alog-alias="b">', re.S)
item = re.search(navdiv,content)
navCode = item.group(1)
pattern = re.compile('<a href="(http://.*?/).*?>(.*?)</a>', re.S)
navval = re.findall(pattern, navCode)
patternFilter = re.compile('<div.*?</div>')

db = MySQLdb.connect("localhost","root","root","yuekao",charset="utf8")
# 使用cursor()方法获取操作游标 
cursor = db.cursor(cursorclass = MySQLdb.cursors.DictCursor)

for val in navval:
	print val[0], re.sub(patternFilter, '', val[1])
	vall = re.sub(patternFilter, '', val[1])
	sql = """INSERT INTO USERS(username,pwd)VALUES (%s, %s)""" %("'"+vall+"'","'"+val[0]+"'")
	#vala = (vall,val[0])
	print sql
	try:
	   # 执行sql语句
	   cursor.execute(sql)
	   # 提交到数据库执行
	   db.commit()
	except:
	   # Rollback in case there is any error
	   db.rollback()

