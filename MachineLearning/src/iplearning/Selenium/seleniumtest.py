from selenium import webdriver #pip install selenium , requires google driver.exe in directory
import time
import sys
import sqlite3
from selenium.webdriver.common.keys import Keys
from IPy import IP #pip install ipy, easier ip checking, can be replaced by regex if nessecary 
import requests
iplistgood = []

iplistbad = []
conn = ""
try:
     conn = sqlite3.connect('_datafeatures.db_')
except:
     print("error with opening db")
     sys.exit()





def goodIpQuery(limit):
     overcount = 0
     driver = webdriver.Chrome()
     driver.set_page_load_timeout(60)
     #good ip list
     driver.get("https://tools.tracemyip.org/search--ip/list")

     i = True
     m = False

     while i == True:
          aTagsInLi = driver.find_elements_by_css_selector('td')
          counter = 0 
          #print("new page")
          for a in aTagsInLi:
               try:
                    d = IP(a.text)
                    d = str(d)
                    counter = counter + 1
                    if overcount > limit:
                         print("end please")
                         return
                    
                    if counter % 2 == 0:
                         #print(d)
                         overcount = overcount + 1
                         iplistgood.append(d)
                         m = True                    

               except:
                    pass
          if m == True:
               m = False
               driver.find_element_by_css_selector("#sbmButton2").click()
               #driver.find_element_by_xpath(".//div/input[@rel='pgBtnNextB']").click()     
               time.sleep(4)
          else:
               i = False
     print("end")
     driver.close()









def badIpQuery(limit):
     overcount = 0
     driver = webdriver.Chrome()
     driver.set_page_load_timeout(60)
     #bad ip list
     driver.get("https://www.abuseipdb.com/sitemap?page=1")

     i = True
     m = False

     while i == True:
          aTagsInLi = driver.find_elements_by_css_selector('p')
          print("new page")
          for a in aTagsInLi:
               try:
                    if overcount > limit:
                         return
                    d = IP(a.text)
                    print(d)
                    iplistbad.append(d)
                    overcount = overcount + 1
                    m = True
                    
               except:
                    pass
          if m == True:
               m = False
               driver.find_element_by_xpath(".//li/a[@rel='next']").click()     
               time.sleep(4)
          else:
               i = False
     print("end")
     driver.close()

def geoIP(thelist, goodorbad):
     c = conn.cursor()
     api_key = "8b5f534b27548ec1400132f24eb30135"
     ip = ""
     city = ""
     zipcode = ""
     region_code = ""
     country_code = ""
     iptype = ""
     latitude = ""
     for x in thelist:
          #print(x)
          ip = x
          response = requests.post('http://api.ipstack.com/%s?access_key=%s' % (ip, api_key))
          json_response = response.json()
          if response.status_code != 200:
               print("Unable to import api")
               sys.exit()
          if len(json_response) > 1:
               print(json_response)
               for key, value in json_response.items():
                    if key == "city":
                         city = value
                    if key == "region_code":
                         region_code = value
                    if key == "country_code":
                         country_code = value
                    if key == "type":
                         iptype = value
                    if key == "zip":
                         zipcode = value
                    if key == "latitude":
                         latitude = value
               #print("city", city)
               #print("region code", region_code)
               #print("country code", country_code)
               #print("iptype", iptype)
               #print("latitude", latitude)
               #print("zip", zipcode)
               good = goodorbad
               ip = str(ip)
               c.execute("INSERT INTO IPS VALUES (NULL,?,?,?,?,?,?,?,?);", (ip,city,region_code,country_code,iptype,latitude,zipcode,good))
               conn.commit()
               
     
     
          
     


goodIpQuery(1000)
iplistgood = set(iplistgood)
iplistgood = list(iplistgood)

geoIP(iplistgood, "good")

badIpQuery(1000)
iplistbad = set(iplistbad)
iplistbad = list(iplistbad)
geoIP(iplistbad, "bad")
conn.close()

