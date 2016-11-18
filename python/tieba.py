#!d:/xuexi1/python2.7/python.exe
# -*- coding: UTF-8 -*-
import urllib
import urllib2
import re
#baidu  贴吧 爬爬虫
class BDTB:

    #传入基地址 参数
    def __init__(self,baseurl,seeLZ):
        self.baseurl = baseurl
        self.seeLZ = '?see_lz='+str(seeLZ)

    #传入页码 获取页该帖子的代码
    def getPage(self,pageNum):
        try:
            url = self.baseurl+self.seeLZ+'&np='+str(pageNum)
            request = urllib2.Request(url)
            response = urllib2.urlopen(request)
            pageCode = response.read().decode('utf-8')
            return pageCode
        except urllib2.URLError, e:
            if hasattr(e, "reason"):
                print u"连接百度贴吧失败,错误原因", e.reason
                return None
    #获取帖子标题
    def getTitle(self):
        page = self.getPage(1)
        pattern = re.compile('<h1 class="core_title_txt.*?>(.*?)</h1>',re.S)
        result = re.search(pattern,page)
        if result:
            print result.group(1)  #测试输出
            #return result.group(1).strip()
        else:
            return None
baseurl="http://tieba.baidu.com/p/3138733512"
bdtb = BDTB(baseurl,1)
bdtb.getTitle(1) 