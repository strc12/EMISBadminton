#!/usr/bin/python

import MySQLdb
import cgi
import cgitb
import sys

#args = sys.stdin.read()
print("Content-type: text/html\n\n")
cgitb.enable()

form = cgi.FieldStorage()
arg1 = form.getvalue("school")
arg2=form.getvalue("teacher")

db = MySQLdb.connect ("localhost","root","squirt72","badminton")#connects to db Host, Username, PW, Database
curs=db.cursor()
curs.execute ("INSERT INTO schools values(%s, %s,NULL)",(arg1, arg2))#NULL for autoincrement field
curs.execute("select * from schools")
for reading in curs.fetchall():
	print(str(reading[0])+", "+ str(reading[1]) + ", " + str(reading[2]) + "<br>")
print("<br>")
db.commit()# writes changes permanently
db.close()




