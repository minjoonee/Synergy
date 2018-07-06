from urllib.request import urlopen
from bs4 import BeautifulSoup
import pymysql
conn = pymysql.connect(host='localhost', user='root', password='771029',db='notice_db', charset='utf8')
curs = conn.cursor(pymysql.cursors.DictCursor)
# db : notice_db
# table : notice_table
# query = update notice_table set href='blah~' where number=x;

number=1
html = urlopen("https://it.jbnu.ac.kr/itjbnu/2016/inner.php?sMenu=G1000")
soup = BeautifulSoup(html, "html.parser")
for link in soup.select('span > a'):
    hr = link.get('href')
    query="UPDATE notice_table set href='%s' where number=%s;" % (hr, number)
    curs.execute(query)
    conn.commit()
    number=number+1
conn.close()


"""
url = "https://it.jbnu.ac.kr/itjbnu/2016/inner.php?sMenu=G1000"
html = urlopen(url).read() # read
soup = BeautifulSoup(html, "html.parser")

type(soup.get_text()) # change string value
a_tag = soup.select('span > a');
print(a_tag)
"""

"""
for i in  range(5,13):
    span = soup.find_all('span')[i].text;
    print(span);
href= soup.find_all('span');

print(href); # <print a tag>

"""
