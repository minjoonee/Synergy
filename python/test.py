from urllib.request import urlopen
from bs4 import BeautifulSoup
import pymysql
import ssl
import requests
from datetime import datetime

#data = curs.fetchone()
#print ("db version : %s" % data)


#db : synergy_db
#table : notice_tb
#query = update notice_tb set href='blah~' where number=x;
page = "http://www.jeongeup.go.kr/index.jeongeup?menuCd=DOM_000000103009004001"
html = urlopen(page)
#html = urllib.request.urlopen('https://it.jbnu.ac.kr/itjbnu/2016/inner.php?sMenu=G1000'.decode('ASCII')).read()
soup = BeautifulSoup(html, "html.parser")
list = soup.select('td')
for item in list:
    sentence = item.getText()
    sentence = ' '.join(sentence.split())
    #sentence.replace(" ", "")
    print(sentence)
