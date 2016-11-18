#!d:/xuexi1/python2.7/python.exe
# -*- coding: UTF-8 -*-

# CGI处理模块
import cgi, cgitb 
import MySQLdb
# 创建 FieldStorage 的实例化
form = cgi.FieldStorage() 

# 获取数据
site_name = form.getvalue('name')
site_url  = form.getvalue('url')


print "Content-type:text/html"
print
print "<html>"
print "<head>"
print "<meta charset=\"utf-8\">"
print "<title>菜鸟教程 CGI 测试实例</title>"
print "</head>"
print "<body>"
print "<h2>%s官网：%s</h2>" % (site_name, site_url)
print "</body>"
print "</html>"
# 打开数据库连接
db = MySQLdb.connect("localhost","root","root","yuekao",charset="utf8")

# 使用cursor()方法获取操作游标 
cursor = db.cursor(cursorclass = MySQLdb.cursors.DictCursor)

# SQL 插入语句
'''sql = """INSERT INTO USERS(username,
         pwd) \
         VALUES (%s, %s)"""
val = (site_name,site_url)
try:
   # 执行sql语句
   cursor.execute(sql,val)
   # 提交到数据库执行
   db.commit()
except:
   # Rollback in case there is any error
   db.rollback()

 # SQL 查询语句
sql = "SELECT * FROM USERS " 

   # 执行SQL语句
cursor.execute(sql)
   # 获取所有记录列表
results = cursor.fetchall()

for index,value in enumerate(results):
	uid = value['uid'] 
	username = value['username'].encode('utf-8')
	pwd = value['pwd']
	print uid,username,pwd

'''	
print
import urllib2 
url = 'http://api.k780.com:88/?app=weather.future&weaid=1&&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json'  
weatherHtml = urllib2.urlopen(url).read()
print weatherHtml
