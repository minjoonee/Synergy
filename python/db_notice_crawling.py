from urllib.request import urlopen
from bs4 import BeautifulSoup
import pymysql
import ssl
import requests
from datetime import datetime
today = datetime.today().strftime("%Y/%m/%d %H:%M:%S ---- excute notice.py")
print(today)
context = ssl._create_unverified_context()
conn = pymysql.connect(host='127.0.0.1', port=3306, user='kwon', password='synergyit',db='synergy_db', charset='utf8')
curs = conn.cursor(pymysql.cursors.DictCursor)
#data = curs.fetchone()
#print ("db version : %s" % data)


#db : synergy_db
#table : notice_tb
#query = update notice_tb set href='blah~' where number=x;
page = "https://it.jbnu.ac.kr/itjbnu/2016/inner.php?sMenu=G1000"
html = urlopen(page, context = context)
number = 1
#html = urllib.request.urlopen('https://it.jbnu.ac.kr/itjbnu/2016/inner.php?sMenu=G1000'.decode('ASCII')).read()
soup = BeautifulSoup(html, "html.parser")
list = soup.select('span > a')
for item in list:
    sentence = item.getText()
    sentence = ' '.join(sentence.split())
    query = "UPDATE notice_tb set notice='%s' where num=%s;" % (sentence, number)
    curs.execute(query)
    conn.commit()
    number = number + 1
number=1
for link in soup.select('span > a'):
    hr = link.get('href')
    query="UPDATE notice_tb set href='%s' where num=%s;" % (hr, number)
    curs.execute(query)
    conn.commit()
    number=number+1
conn.close()
