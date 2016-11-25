#!d:/xuexi1/python2.7/python.exe
# -*- coding: UTF-8 -*-
print "Content-type:text/html"
print

import urllib
import urllib2
import re
import MySQLdb
import datetime

class QSBK:

    def __init__(self):
        self.pageIndex = 1
        self.user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0'
        self.headers = {'User-Agent' : self.user_agent}

    #传入某一页的索引获得页面代码
    def getPage(self, pageIndex):
        try:
            url = ' http://www.qiushibaike.com/pic/page/' + str(pageIndex)
            request = urllib2.Request(url, headers = self.headers)
            response = urllib2.urlopen(request)
            pageCode = response.read()
            return pageCode
        except urllib2.URLError, e:
            if hasattr(e, "reason"):
                print u"连接糗事百科失败,错误原因", e.reason
                return None

    #传入某一页索引,返回本页带图片的段子列表
    def getPageItems(self, pageIndex):
        pageCode = self.getPage(pageIndex)
        # print pageCode
        #print pageCode
        if not pageCode:
            print "页面加载失败..."
            return None
        #<div class="author clearfix">.*?<h2>(.*?)</h2>.*?<span>(.*?)</span>.*?<img src="(.*?)" alt= .*?<span class="stats-vote"><i class="number">(.*?)</i></span>
        pattern = re.compile('<div class="author clearfix".*?<h2>(.*?)</h2>.*?<span>(.*?)</span>.*?<img src="(.*?)".*?<div class="stats".*?<span class="stats-vote"><i class="number">(.*?)</i>.*?<span class="stats-comments"',re.S);
        items = re.findall(pattern, pageCode)
        #获得当前时间v
        now = datetime.datetime.now()
        #转换为指定的格式:
        imgtime = now.strftime("%Y-%m-%d %H:%M:%S")
        #print qstime
        value=''
        for item in items:
            #print item[0], item[1], item[2], item[3]
            if '<br /> in item':
                imgzuozhe = item[0]
                imgtext = re.sub('<br/>', '\n', item[1])
                imgurl = item[2]
                imglike = item[3]
                value += "('"+imgzuozhe.strip()+"','"+imgtext.strip()+"','"+imgurl.strip()+"','"+imglike+"','"+imgtime+"'),"
            pageStories = value[:-1]
        #print pageStories
        sql='insert into qsimg(imgzuozhe,imgtext,imgurl,imglike,imgtime) values'+pageStories
        #print sql
        # 打开数据库连接
        #db = MySQLdb.connect("192.168.1.158","root","xiao","blog",charset="utf8")
        db = MySQLdb.connect("localhost","root","root","blog1",charset="utf8")
        # 使用cursor()方法获取操作游标 
        cursor = db.cursor(cursorclass = MySQLdb.cursors.DictCursor)
        # SQL 插入语句
        try:
           # 执行sql语句t   
           cursor.execute(sql)
           # 提交到数据库执行
           db.commit()
        except:
           # Rollback in case there is any error
           db.rollback()

qb = QSBK()
#print qb.getPage(1)
for i in range(3,5):
    qb.getPageItems(i)


