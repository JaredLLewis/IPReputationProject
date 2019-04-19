from selenium import webdriver #pip install selenium , requires google driver.exe in directory
import time
import sys
import sqlite3
from selenium.webdriver.common.keys import Keys
from IPy import IP #pip install ipy, easier ip checking, can be replaced by regex if nessecary 


driver = webdriver.Chrome()

#abuseipdb results
driver.set_page_load_timeout(10)
driver.get("http://google.com")
driver.find_element_by_name("q").send_keys("Elizabeth Rickman")
driver.find_element_by_name("q").send_keys(u'\ue007')
time.sleep(3)

print("end")
driver.close()



