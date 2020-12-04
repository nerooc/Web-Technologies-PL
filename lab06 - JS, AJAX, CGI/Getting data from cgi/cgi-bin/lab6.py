#!/usr/bin/python3

import cgi
from lxml import etree
form = cgi.FieldStorage()

type = form.getvalue("type", "(no type)")  

if type=="pierwszy":
    xmlfile = open('./opcje1.xml', "r")
elif type=="drugi" :
    xmlfile = open('./opcje2.xml', "r")

xmlfile = str(xmlfile.read())

print ("Content-Type: application/xml")
print ()
print (xmlfile)
