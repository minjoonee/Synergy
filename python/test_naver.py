# -*- coding:UTF-8 -*-
from bs4 import BeautifulSoup
import urllib.request
 
# 출력 파일 명
OUTPUT_FILE_NAME = 'output.txt'
 
 # 긁어올 URL
URL = 'http://it.jbnu.ac.kr'
 
 # 크롤링 함수
def get_text(URL) :
    source_code_from_URL = urllib.request.urlopen(URL)
    soup = BeautifulSoup(source_code_from_URL, 'html.parser')
    text = ''
    for item in soup.find_all('div', id = 'articleBodyContents') :
        text = text + str(item.find_all(text = True))
 
    return text
 
# 메인 함수
def main() :
    open_output_file = open('output.txt', 'w')
    result_text = get_text(URL)
    open_output_file.write(result_text)
    open_output_file.close()
 
    print(result_text)
     
if __name__ == '__main__':
    main()
