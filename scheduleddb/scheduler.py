#!/usr/bin/python
import requests
from shodan import Shodan #requires pip install shodan
import re
import datetime
import apilityio #requires pip install apility
import hashlib
import sqlite3
import time
import pytz,sys
    
    
def VirusTotal(ip):
    #scan
    virustotalBool = ""
    num = ""
    virustotalextra = ""
    virustotalurl = ""
    scandate = ""    
    params = {'apikey': '401a01bc185e7a8a1122687fcdafc3ef6f3da0a8d8940f5b4b04dfa643cb352f', 'url':ip}
    response = requests.post('https://www.virustotal.com/vtapi/v2/url/scan', data=params)
    try:
        json_response = response.json()  
    except:
        print("OVERLOAD")
        return virustotalBool,virustotalurl,virustotalextra
    #retrieve

    headers = {
  "Accept-Encoding": "gzip, deflate",
  "User-Agent" : "gzip,  My Python requests library example client or username"
    }
    params = {'apikey': '401a01bc185e7a8a1122687fcdafc3ef6f3da0a8d8940f5b4b04dfa643cb352f', 'resource':ip}
    response = requests.post('https://www.virustotal.com/vtapi/v2/url/report',
                             params=params, headers=headers)
    json_response = response.json()
    keys=json_response.keys()  
    values=json_response.values()
    denom = ""
    for key in json_response.keys():
        if key == "total":
            denom = json_response[key]
            
        if key == "positives":
            num = json_response[key]
            if num > 0:
                virustotalBool = "True"
            else:
                virustotalBool = "False"
        if key == "permalink":
            virustotalurl = json_response[key]
            
    virustotalextra = str(num) + "/" +str(denom)
    return virustotalBool,virustotalurl,virustotalextra
    


def ShodanMethod(ip):
    currentPorts = ""
    api = Shodan('hYOKzljNkOxZI8C2aoJDQX2LdDjhAKEz')
    try:
        ipinfo = api.host(ip)
    except:
        return "None"
    for key in ipinfo.keys():
        if key == "ports":
            currentPorts = ipinfo[key]
    
    return currentPorts
            
    
def abuseIPBD(ip):
    api_key = "aolJtTJWQweApW38phmxjzqOO9yl6SiTG24lvomg"
    confidenceScore = ""
    confidenceBool = ""
    category = ""
    abuseIPBDURL = "https://www.abuseipdb.com/check/"
    abuseIPBDURL = abuseIPBDURL + ip
    days = 30
    response = requests.post('https://www.abuseipdb.com/check/%s/json?key=%s&days=%s' % (ip, api_key, days))
    json_response = response.json()
    if response.status_code != 200:
        print("Unable to import abuse IPBD")
        return confidenceScore,confidenceBool,abuseIPBDURL
    if len(json_response) > 1:
        confidenceBool = "True"
        for x in json_response:
            print(x)
            try:
                for key in x.keys():
                    pass
            except:
                print("n keys")
                fcategory = ""
                return confidenceScore,confidenceBool,abuseIPBDURL, fcategory
            for key in x.keys():
                if key == "abuseConfidenceScore":
                    confidenceBool = "True"
                    confidenceScore = x[key]
                    break
                if key == "category":
                    category = x[key]
                    
            break
                       
    else:
        confidenceScore = "N/A"
        confidenceBool = "False"
    fcategory = categorConvert(category)
    
    
    
    return confidenceScore,confidenceBool,abuseIPBDURL, fcategory
                
def categorConvert(category):
    returnString = ""
    for x in category:
        if x== 3:
            returnString += "Fraud Orders,"
        if x==4:
            returnString += "DDos Attack,"
        if x==5:
            returnString += "FTP Brute Force,"
        if x==6:
            returnString += "Ping of Death,"
        if x==7:
            returnString += "Phishing,"
        if x==8:
            returnString += "Fraud VoIP,"
        if x==9:
            returnString += "Open Proxy,"
        if x==10:
            returnString += "Web Spam,"
        if x==11:
            returnString += "Email Spam,"
        if x==12:
            returnString += "Blog Spam,"
        if x==13:
            returnString += "VPN IP,"
        if x==14:
            returnString += "Port Scan,"
        if x==15:
            returnString += "Hacking,"
        if x==16:
            returnString += "SQL Injection,"
        if x==17:
            returnString += "Spoofing,"
        if x==18:
            returnString += "Brute-Force,"
        if x==19:
            returnString += "Bad Web Bot,"
        if x==20:
            returnString += "Exploited Host,"
        if x== 21:
            returnString += "Web App Attack,"
        if x==23:
            returnString += "IoT targeted,"
        if x==22:
            returnString += "SSH,"
        
    return returnString
    
    #aolJtTJWQweApW38phmxjzqOO9yl6SiTG24lvomg
    #abuseipdb.configure_api_key("aolJtTJWQweApW38phmxjzqOO9yl6SiTG24lvomg")
    #x = abuseip.check_ip(ip=ip)
    #print(x)
    
def apility(ip):
    apilityBool = ""
    client = apilityio.Client(api_key="03de759f-549b-45c1-a1d9-4de455ed3edf")
    response = client.CheckIP(ip)
    if response.status_code == 404:
        apilityBool = "False"  
    if response.status_code == 200:
        apilityBool = "True"
        print("Ooops! The IP address has been found in one or more blacklist")
        blacklists = response.blacklists
        print('+- Blacklists: %s' % blacklists)
    return apilityBool
    
def myip(ip): #api key "547475427-1883856228-830739119"
    blacklist = ""
    api_key = "181762458-1154862878-1792659408"
    #python 2 version of datetime to utc 
    
    tz = pytz.timezone('Etc/GMT+5')
    m = tz.normalize(tz.localize(datetime.datetime.now())).astimezone(pytz.utc)
 
    
    print("test1")
    
    days = m.strftime("%Y-%m-%d_%H:%M:%S")
    
    

    url = 'https://api.myip.ms/%s/api_id/id53307/api_key/%s/timestamp/%s' % (ip, api_key, days)
    signature = hashlib.md5(url.encode('utf-8')).hexdigest()
    response = requests.post('https://api.myip.ms/%s/api_id/id53307/api_key/%s/signature/%s/timestamp/%s' % (ip, api_key,signature, days))
    json_response = response.json()
    print(json_response)
    myipBool = ""
    for key in json_response.keys():
        if key == "ip_blacklist":
            blacklist = json_response[key]
            print(blacklist)
            print(type(blacklist))
            print(blacklist["blacklist"])
            blacklistKey = blacklist["blacklist"]
            print("my ip here!!!")
            print(type(blacklistKey))
            print(blacklistKey)
            print(len(blacklistKey))
            if len(blacklistKey) == 2:
                myipBool = "False"
                return myipBool
            if len(blacklistKey) == 3:
                myipBool = "True"
                print("it is true!")
                return myipBool
            else:
                myipBool = ""

    return myipBool
    
    
#MAIN
try:
    conn = sqlite3.connect('_main.db_')
except Error as e:
    print(e)


c = conn.cursor()

# Virus Total api key: 401a01bc185e7a8a1122687fcdafc3ef6f3da0a8d8940f5b4b04dfa643cb352f

#129.71.200.66
#129.71.202.12
#129.71.252.10 


# IP 1
def doWork(ip):
    virustotalBool = ""
    virustotalurl = ""
    virustotalnum = ""
    currentPorts = ""
    confidenceScore = ""
    confidenceBool = ""
    abuseurl = ""
    apilityBool = ""
    myipBool = "" 
    checkedbool = "False"
    susbool = "False"
    virustotalBool,virustotalurl,virustotalnum = VirusTotal(ip)
    currentPorts = ShodanMethod(ip)
    currentPorts = str(currentPorts)
    confidenceScore, confidenceBool, abuseurl,category = abuseIPBD(ip)
    apilityBool = apility(ip)
    myipBool = myip(ip)
    currentdate = datetime.datetime.now()
    print("virustotalbool", virustotalBool)
    print("virustotalurl",virustotalurl)
    print("virustotalnum",virustotalnum)
    print("currentports",currentPorts)
    print("confidencescore",confidenceScore)
    print("confidencebool",confidenceBool)
    print("abuseurl",abuseurl)
    print("apilitybool",apilityBool)
    if virustotalBool == "True" or confidenceBool == "True" or apilityBool == "True" or myipBool == "True":
        susbool = "True"
    print("susbool", susbool)
    print("checkedbool", checkedbool)
    
    if ip == "129.71.200.66":
        c.execute("INSERT INTO IP1 VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?);", (currentdate,virustotalurl,virustotalBool,virustotalnum,currentPorts,abuseurl,category,confidenceScore,confidenceBool,apilityBool,myipBool,checkedbool,susbool))
    if ip == "129.71.202.12":
        c.execute("INSERT INTO IP2 VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?);", (currentdate,virustotalurl,virustotalBool,virustotalnum,currentPorts,abuseurl,category,confidenceScore,confidenceBool,apilityBool,myipBool,checkedbool,susbool))
    if ip == "129.71.252.10":   
        c.execute("INSERT INTO IP3 VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?);", (currentdate,virustotalurl,virustotalBool,virustotalnum,currentPorts,abuseurl,category,confidenceScore,confidenceBool,apilityBool,myipBool,checkedbool,susbool))
    
    
    conn.commit()
    c.execute("SELECT * FROM IP1")
    rows = c.fetchall()
    print(rows)
    
    
    
    
    
    
    

doWork("129.71.200.66")
time.sleep(25)

doWork("129.71.202.12")
time.sleep(25)
doWork("129.71.252.10")


conn.close()