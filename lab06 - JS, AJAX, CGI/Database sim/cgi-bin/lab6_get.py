#!/usr/bin/python3

import sys
import json
import cgi

form = cgi.FieldStorage()

import os
import datetime

openFile = open("../lab06/db.txt", "r")
fileContainer = openFile.read()
openFile.close()


print("Content-Type: text/html; charset=utf-8")
print()
print ("""
<table>
<thead>
<tr id="first-row">
  <th>tytul</th>
  <th>autor</th>
  <th>date</th>
  <th>IP</th>
</tr>
</thead>
""")

fileContainer = fileContainer.split(";;")

for book in fileContainer:
  title = book.split(";")[0]
  author = book.split(";")[1]
  date = book.split(";")[2]
  ip = book.split(";")[3]
  print ("<tr><td>" + title + "</td><td>" + author + "</td><td>" + date + "</td><td>" + ip + "</td></tr>")
print ("""
</table>
""")
