#!/usr/bin/env python3

import cgi
import os

from lxml import etree

query_string = os.environ.get("QUERY_STRING", "nostring")

if query_string:
	sortby = query_string.split('=')[1]
else: 
	sortby = ''

xmlfile = open('../zad5.xml') 
xslfile = open('../zad5.xsl') 
xmldom = etree.parse(xmlfile) 
xsldom = etree.parse(xslfile) 
transform = etree.XSLT(xsldom)

result = transform(xmldom, sortby='"'+str(sortby)+'"')

print ("Content-type: text/html")
print ()
print(result)
