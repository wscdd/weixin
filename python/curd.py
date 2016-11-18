#!d:/xuexi1/python2.7/python.exe
# -*- coding: UTF-8 -*-
print "Content-type:text/html"
print
import MySQLdb as mdb 
import ConfigParser	 
config = ConfigParser.ConfigParser()
config.read('db.conf')
dbhost = config.get("database", "dbhost")
dbname = config.get("database", "dbname")
dbuser = config.get("database", "dbuser")
dbpassword = config.get("database", "dbpassword")
dbcharset = config.get("database", "dbcharset")
class curd:  
  
    def __init__(self,host=dbhost,user=dbuser,pwd=dbpassword,database=dbname,autocommit=False):  
        try:  
            self.isConnect = False  
  
            self.conn = mdb.connect( host, user,  
                pwd, database,charset="utf8");  
  
            self.isConnect = True  
  
            self.cursor = self.conn.cursor(cursorclass = mdb.cursors.DictCursor)  
            self.cursor.execute("SELECT VERSION()")  
  
            data = self.cursor.fetchone()  
  
            if autocommit:  
                self.conn.autocommit(True)  
            else:  
                self.conn.autocommit(False)  
  
        except mdb.Error as e:  
            print ( "Connect Error %d: %s" % (e.args[0],e.args[1]) )  
   
  
    def close(self):  
        try:  
            self.cursor.close()  
            self.conn.close()  
        except mdb.Error as e:  
            print ( "Close Error %d: %s" % (e.args[0],e.args[1]) )  
  
    def excute(self,sql=""):  
        try:  
            self.cursor.execute(sql)  
        except mdb.Error as e:  
            print ( "Excute Error %d: %s" % (e.args[0],e.args[1]) )  
            print ( "Excute sql= %s" % sql )  
  
    def getrows(self,sql):  
        try:  
            self.excute(sql)
            rows = self.cursor.fetchall()
            return rows 
        except mdb.Error as e:  
            print ( "getrows Error %d: %s" % (e.args[0],e.args[1]) )

    def tabadd(self,table,value):
        val = ''
        for item in value:
            val += "'"+item+"',"
        val = val.rstrip(',')
        try:
            sqlcmd = 'insert into ' + table + ' (username, pwd)values' + '(' + val + ')'
            # print sqlcmd
            self.execute(sqlcmd)
            self.conn.commit()
        except:
            print 'fail to insertOneRd'
            return None

    def tabdel(self,table,id):  
        try:
            sql="DELETE FROM "+table+" WHERE uid="+id
            self.excute(sql)
            return 'true'
        except mdb.Error as e:  
            print ( "getdel Error %d: %s" % (e.args[0],e.args[1]) )

    def tabdelall(self,table,id):  
        try:
            sql="DELETE FROM "+table+" WHERE uid in ("+id+")"
            self.excute(sql)
            return 'true'
        except mdb.Error as e:  
            print ( "getdelall Error %d: %s" % (e.args[0],e.args[1]) )
            
    def tabupdate(self,table,num,id):  
        try:
            sql="UPDATE "+table+" SET "+num+" WHERE uid="+id
            self.excute(sql)
            return 'true'
        except mdb.Error as e:  
            print ( "getupdate Error %d: %s" % (e.args[0],e.args[1]) )
    
    def selectDB(self,dbName):  
        self.conn.select_db(dbName)  
  
    def commit(self):  
        self.conn.commit()  
  
    def rollback(self):  
        self.conn.rollback()  
  
    def setautocommit(self,auto=False):  
        self.conn.autocommit(auto)  
  
    def isConnected(self):  
        return self.isConnect
		
	 
#下面是测试代码  
#db = curd()   
#rows = db.getrows("select * from two")
#print rows
#for index,val in enumerate(rows):
#    id=val['id']
#	name=val['name'].encode('utf8')
#	address=val['address'].encode('utf8')
#db.close()  
