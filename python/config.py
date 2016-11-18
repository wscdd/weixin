#!d:/xuexi1/python2.7/python.exe
# -*- coding: UTF-8 -*-
import MySQLdb
#连接数据库
# 打开数据库连接
# db = MySQLdb.connect("localhost","root","root","yuekao",charset="utf-8")
# # 使用cursor()方法获取操作游标 
# cursor = db.cursor(cursorclass = MySQLdb.cursors.DictCursor)
from curd import *
mysql=curd()
#print(mysql.getrows("select * from users"))
print(mysql.getdeladd('users','username,pwd',"'我是大王','1234'"))