#!/usr/bin/python3

import sys
import json
import cgi

form = cgi.FieldStorage()

import os
import datetime

title = form.getvalue("title", "-")
author = form.getvalue("author", "-")
date = str(datetime.datetime.now().strftime("%Y/%m/%d %H:%M:%S"))
ip = os.environ["REMOTE_ADDR"]

openFile = open("../lab06/db.txt", "r")
fileContainer = openFile.read()
openFile.close()

if author != "-" and title != "-":
  fileContainer = fileContainer + title + ";" + author + ";" + date + ";" + ip + ";;"

file = open("../lab06/db.txt", "w")
file.write(fileContainer)
file.close()
print()

