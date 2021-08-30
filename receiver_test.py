import sys, time, json, urllib.request, os, datetime

property = json.loads(sys.argv[1])

cTime = str(datetime.datetime.now().timestamp())
file = open( cTime+"text.txt", "w") 
file.write(json.dumps(property)) 
file.close() 