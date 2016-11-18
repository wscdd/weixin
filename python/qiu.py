#!d:/xuexi1/python2.7/python.exe
# _*_ coding:utf-8 _*_
print "Content-type:text/html"
print
import urllib
import urllib2
import re

page = 1
url = ' http://www.qiushibaike.com/hot/page/' + str(page)
user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0"
headers = { 'User-Agent' : user_agent}
try:
    request = urllib2.Request(url, headers = headers)
    response = urllib2.urlopen(request)
    content = response.read()
    pattern = re.compile('<div class="author clearfix">.*?<img src.*?title=.*?<h2>(.*?)</h2>.*?<span>(.*?)</span>.*?<span class="stats-vote"><i class="number">(.*?)</i>.*?<i class="number">(.*?)</i>',re.S)
    items = re.findall(pattern, content)
    for item in items:
        print item[0], item[1], item[2], '\n'

except urllib2.URLError, e:
    if hasattr(e, "code"):
        print e.code
    if hasattr(e, "reason"):
        print e.reason