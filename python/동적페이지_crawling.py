from selenium import webdriver
from bs4 import BeautifulSoup
driver = webdriver.Chrome('D:\Downloads/chromedriver')
driver.get('https://www.virustotal.com/#/file/24f3f99cb5d2bf4405d04cba5560c833566d68d2032cd7573525bbd1e90e37be/details')

html = driver.page_source
soup = BeautifulSoup(html, "html.parser")
list = soup.find_all('ul')

for tag in list:
    print(tag.getText())
