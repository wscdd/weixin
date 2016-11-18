#!d:/xuexi1/python2.7/python.exe
# -*- coding: UTF-8 -*-
print "Content-type:text/html"
print
import urllib
import urllib2
import re
import MySQLdb
from curd import *
class New:

    #init
    def __init__(self):
        self.url = "http://news.baidu.com/"

      #convert div to ''
    def convert(self,x):
        pattern = re.compile('<div .*?</div>')
        res = re.sub(pattern,'',x)
        return res

    #convert img to ''
    def convert1(self,x):
        pattern = re.compile('<img .*?/>')
        res = re.sub(pattern,'',x)
        return res
    #shouye
    def getPage(self):
        url = self.url
        request = urllib2.Request(url)
        response = urllib2.urlopen(request)
        content = response.read()
        return content

    #get parent div
    def gatFthersdiv(self,div):
        page = self.getPage()
        pattern = re.compile(div, re.S)
        div = re.search(pattern,page)
        return div.group(1)

    #get parent div
    def gatFthersdiv(self,div):
        page = self.getPage()
        pattern = re.compile(div, re.S)
        div = re.search(pattern,page)
        return div.group(1)

    #get daohang a val
    def getNavval(self):
        div = '(<div id="channel-all".*?)<div id="body" alog-alias="b">'
        navdiv = self.gatFthersdiv(div)
        pattern = re.compile('<a href="(http://.*?/).*?>(.*?)</a>', re.S)
        navval = re.findall(pattern, navdiv)
        value = ''
        for val in navval:
            vall = self.convert(val[1])
            value += "('"+vall.decode('gb2312','ignore').encode('utf-8')+"','"+val[0]+"'),"
            navstr = value[:-1]
        #print navstr
        mysql=curd()
        sql='insert into users(username,pwd) values'+navstr
        print sql
        #mysql.getrows(sql)

    #newlist a val
    def getNewlist(self):
        div = '(<div id="body" .*?)<div id="footerwrapper">'
        newlistdiv = self.gatFthersdiv(div)
        #print newlistdiv
        pattern = re.compile('<a href="(http://.*?)".*?>(.*?)</a>', re.S)
        newlistval = re.findall(pattern, newlistdiv)
        value=''
        for val in newlistval:
            #print val[0],self.convert1(val[1])
            vall = self.convert1(val[1])
            value += "('"+vall.decode('gb2312','ignore').encode('utf-8')+"','"+val[0]+"'),"
            navstr = value[:-1]
        print navstr
        mysql=curd()
        sql='insert into newbaidu(newname,url) values'+navstr
        #print sql
        #mysql.getrows(sql)
new = New()
#new.getNavval()
new.getNewlist()


