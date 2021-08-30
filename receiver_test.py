import sys, time, json, urllib.request, os, datetime

property = json.loads(sys.argv[1])

file = open("text.txt", "w") 
file.write(property) 
file.close() 