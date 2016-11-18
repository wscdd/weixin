#!d:/xuexi1/python2.7/python.exe
# -*- coding: UTF-8 -*-
print "Content-type:text/html"
print 
import ConfigParser	 
config = ConfigParser.ConfigParser()
config.read('db.conf')
#读取所有节点
#s = config.sections()
#print "All sections:",s
#读取节点所有key
#o = config.options("database")
#print 'database options:', o
dbhost = config.get("database", "dbhost")
dbname = config.get("database", "dbname")
dbuser = config.get("database", "dbuser")
dbpassword = config.get("database", "dbpassword")
dbcharset = config.get("database", "dbcharset")
import MySQLdb
# 打开数据库连接
db = MySQLdb.connect(dbhost,dbuser,dbpassword,dbname,charset=dbcharset)
# 使用cursor()方法获取操作游标
cursor = db.cursor()
#print dbcharset
